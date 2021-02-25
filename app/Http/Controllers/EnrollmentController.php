<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;   
use Illuminate\Support\Facades\DB; 

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
                 return view("login");

            }
            //$nombre=$mensaje->cuil;
            //Consultamos en la base de datos local si existe la promotora
            $usuario=DB::table('users') 
            ->where('dni',$dni)->first();

            if($usuario){
               


                //Si el usuario existe, vemos si ya tiene usuario crezdo
                if($usuario->name!="" && $usuario->password!=""){

                    session()->flash('mensaje', 'La persona consultada ya tiene un usuario creado,
                    por favor haga click en olvide mi usuario y contraseña');
                   
                    return view("login");

                }else{

                  //  dd($usuario);

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
            return view("login");

        }

    }

    public function altaUsuario($usuario){

         $usu= User::findOrFail($usuario);
        return view("enrollment.AltaUsuario1")->with([
                        'usuario'=>$usu,
                    ]);

    }

    
    public function nonDniForm()
    {
        return view("enrollment.nonDniForm");
    }

   
    public function sendToEMAIL(Request $request)
    {
       //recibimos los datos del form y los enivamos
        Mail::to('rominacodarin@gmail.com')->send(new TestMail("Hola"));

      return view("enrollment.nonDniForm");
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
