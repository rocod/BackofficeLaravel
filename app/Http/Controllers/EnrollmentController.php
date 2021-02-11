<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;    

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

                $response = Http::withToken($token)->get($consultaM);            
                $mensaje=json_decode($response->getBody()->getContents());
            }
            if($mensaje->codigo!=99){
                $mensaje="Los datos ingresados no pudieron ser verificados";
            }
        }else{
            $mensaje="No pudimos establecer la conexión para verificar sus datos";;
        }

        //si codigo es 99 verificamos si esta en el padrón de promotorxs

       

        dd($mensaje);

    }

    
    public function nonDniForm()
    {
        return view("enrollment.nonDniForm");
    }

   
    public function sendToEMAIL(Request $request)
    {
       //recibitmos los datos del form y los enivamos
        //Mail::to('rominacodarin@gmail.com')->send(new TestMail("Hola"));

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
