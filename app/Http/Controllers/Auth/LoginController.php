<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function ingresar(){


         $usu=DB::table('users')        
        ->where('name',request()->input('usuario'))->first();


        
         $password=Hash::check(request()->input('password'),  $usu->password);

          
         if($password){


            
            session(['usuario' => $usu ]);

           Log::channel('slack')->info('Something happened!');



            if($usu->fecha_pass_usuario==null){

                $hora_registro = Carbon::createFromDate($usu->updated_at);

                $hora_registro->addDay();


                if($hora_registro < Carbon::now()){
                   
                    
                    session()->forget('usuario');

                session()->flash('mensaje', 'La contraseña fue enviada hace más de 24hs y caducó. Hacé click en Crear Usuario');
              
                 return redirect('/login2');

                }else{
                    $vista="login.primerIngreso";
                }
                

            }else{ // fin del if no tiene fecha pass usuario
                //si ya tiene la fecha, no es la primera vez

                $vista="dashboard.index";

            }
                    return view($vista)->with([
                        'usuario'=>$usu,
                    ]);


         }else{
            session()->flash('mensaje', 'Se produjo un error por favor iniciá el proceso nuevamente');
              
                 return redirect('/login2');

         }
        
    }

    public function primerIngreso($id_usuarix){


         $rules=[
        'clave'=>['required','between:8, 10','alpha_num'],
        'clave2'=>['required','between:8, 10', 'alpha_num', 'same:clave'],
        
        ];
        $messages = [
            'same'    => 'El campo contraseña  y reingrese contraseña deben coincidir',
            'required'    => 'El campo es obligatorio',
            'between' => 'La contraseña debe tener entre :min y :max caracteres.',
          
        ];
        request()->validate($rules);

         $usu=User::find($id_usuarix);

         if($usu){

            $usu->password=Hash::make(request()->input('clave'));           
            $usu->fecha_pass_usuario=Carbon::now()->toDateTimeString(); 
            //dd($usu);                    
            $usu->save();

            return view('login.mensajeCambio');



         }else{// si no pudimos consultar el usuario de la base de datos

              session()->flash('mensaje', 'Se produjo un error por favor ingrese nuevamente');
              
                return view("login");


         }

    }

}
