<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;   
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         return view("login");
    }

    public function tieneDni(){
        return view("enrollment.tieneDni");
    }

    public function FormValidaRenaper(){
       return view("enrollment.FormValidaRenaper");
    }

    public function derivar(Request $request){
       //$datos=$request->all();
        if($request->input('tieneDni')=='si'){
          
            return view("enrollment.FormValidaRenaper");
        }else{
            return view("enrollment.StartForm");

        }
    }

    public function verificarEnRenaper(Request $request){

        $dni=$request->input('dni');
        $nroTramite=$request->input('nroTramite');
        //obtenter token
        $response = Http::asForm()->post('https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php', [
        'username' => 'MMGDDATOS',
        'password' => 'H8ZRu6nC1Apaqwj',
        ]);
        $responseBody = json_decode($response->getBody());
        if($responseBody->data->codigo==0){

            $token=$responseBody->data->token;
            $consultaF='https://apirenaper.idear.gov.ar/apidatos/porDniSexoTramite.php?dni='.$dni.'&sexo=F&idtramite='.$nroTramite;
            $consultaM='https://apirenaper.idear.gov.ar/apidatos/porDniSexoTramite.php?dni='.$dni.'&sexo=M&idtramite='.$nroTramite;
            $response = Http::withToken($token)->get($consultaF);            
            $mensaje=json_decode($response->getBody()->getContents());
           
             if($mensaje->codigo!=99){
                 session()->flash('mensaje', 'Los datos ingresados no existen en el Registro Nacional de las Personas');
                 return view("enrollment.FormValidaRenaper");

            }
            //dd($mensaje);
            //$nombre=$mensaje->cuil;
            //Aquí debemos consultar si existe la promotora con el servicio de
            //planificacion, si exite nos retorna un id_promotorx
            $id_promotorx=2;// 

            $usuario=DB::table('users')
            ->where('id_promotorx',$id_promotorx)->first();

            if($id_promotorx){               


                //Si el usuario existe, vemos si ya tiene usuario crezdo
                if($usuario){



                    session()->flash('mensaje', 'La persona consultada ya tiene un usuario creado,
                    por favor haga click en olvide mi usuario y contraseña');
                   
                    return view("login");

                }else{
                    // cambiar el email por el que venga de la 
                    //consulta a la base de datos

                 $usuario=new User;
                 $usuario->nombre=$mensaje->nombres;
                 $usuario->apellido=$mensaje->apellido;
                 $usuario->email="rominacodarin@gmail.com";
                 $usuario->dni=$dni;
                 $usuario->cuil=$mensaje->cuil;
                 $usuario->fecha_nacimiento=$mensaje->fecha_nacimiento;
                 $usuario->id_promotorx=$id_promotorx;
                 session(['usuario' => $usuario ]);
                    return view("enrollment.AltaUsuario0")->with([
                        'usuario'=>$usuario,
                    ]);




                }


            }else{
               
                 session()->flash('mensaje', 'La persona no está registrada en la base de datos de promotores');
              
                return view("login");
            }



            
           
        }else{
            session()->flash('mensaje', 'No pudimos establecer la conexión para verificar sus datos');         
            return view("enrollment.FormValidaRenaper");

        }

    }

    public function altaUsuario($usuario){

        if(session('usuario')!=null){
         $usu= session('usuario');
        
        return view("enrollment.AltaUsuario1")->with([
                        'usuario'=>$usu,
                    ]);
        }else{

            return view("enrollment.FormValidaRenaper");

        }

    }

    
    public function nonDniForm()
    {
        return view("enrollment.nonDniForm");
    }

    public function grabarUsuario($id_promotorx)
    {

        if(request()->input('usuario')==request()->input('usuario2')){

           $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
           $password = "";
       
           for($i=0;$i<10;$i++) {
              //obtenemos un caracter aleatorio escogido de la cadena de caracteres
              $password .= substr($str,rand(0,62),1);
           }

            $usuario=session('usuario');

            $usu=DB::table('users')
            ->where('email',$usuario->email)->first();

               
                $usuario->name=request()->input('usuario');
                $usuario->password=$password;
                $usuario->save();

                //enviar email
            Mail::to("rominacodarin@gmail.com")->send(new TestMail("Hola"));

            return view("enrollment.ConfirmacionAltaUsuario")->with([
                                'email'=>$usuario->email,
                            ]);

               

            }else{
            session()->flash('mensaje', 'Los campos de Usuario y Repetir Usuario no coinciden');
             return view("enrollment.AltaUsuario1")->with(['usuario'=>session('usuario')]); 

            }

    }

   
    public function sendToEMAIL(Request $request)
    {
       //recibimos los datos del form y los enivamos
    //    Mail::to('rominacodarin@gmail.com')->send(new TestMail("Hola"));
        Mail::to('rominacodarin@gmail.com')->send(new OrderShipped("hola"));

      return view("enrollment.nonDniForm");
    }




   
}
