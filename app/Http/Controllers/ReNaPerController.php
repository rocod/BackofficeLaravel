<?php

namespace App\Http\Controllers;

use App\Models\ReNaPer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ReNaPerController extends Controller
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
/*
    public function verificarEnRenaper(){

        //Obtner token
        $response = Http::asForm()->post('https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php', [
    'username' => 'MMGDDATOS',
    'password' => 'H8ZRu6nC1Apaqwj',
]);
        $responseBody = json_decode($response->getBody());
        dd($responseBody);

    }
    */

    public function generarToken(){

      //  $response = Http::withDigestAuth('MMGDDATOS', 'H8ZRu6nC1Apaqwj')->post('https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php');
        $response = Http::post('https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php', [
        'username' => 'MMGDDATOS',
        'password' => 'H8ZRu6nC1Apaqwj',
    ]);

        $response = Http::asForm()->post('https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php', [
    'username' => 'MMGDDATOS',
    'password' => 'H8ZRu6nC1Apaqwj',
]);
        $responseBody = json_decode($response->getBody());


        dd($responseBody);
    }

     public function apiWithKey()
    {
        $client = new Client();
        $url = "https://apirenaper.idear.gov.ar/CHUTROFINAL/API_ABIS/Autorizacion/token.php";


        $params = [
            'auth'=>['type'=>'bearer',
            'bearer'=>['key'=>'token', 'value'=>'', 'type'=>'string',],
                ],
            'mode'=>'urlencoded',
            'urlencoded'=>[
                ['key'=>'username', 'value'=>'MMGDDATOS', 'type'=>'text',],
                ['key'=>'password', 'value'=>'H8ZRu6nC1Apaqwj', 'type'=>'text',],

            ],

            //'username'=> 'MMGDDATOS',
           // 'password'=> 'H8ZRu6nC1Apaqwj',
        ];
        
        $headers = [
       //     'api-key' => 'k3Hy5qr73QhXrmHLXhpEh6CQ',
           //'Content-type'=>'application/x-www-form-urlencoded\r\n',

        ];
        
        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => $headers,        
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());


        dd($responseBody);
        //return view('welcome', compact('responseBody'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReNaPer  $reNaPer
     * @return \Illuminate\Http\Response
     */
    public function show(ReNaPer $reNaPer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReNaPer  $reNaPer
     * @return \Illuminate\Http\Response
     */
    public function edit(ReNaPer $reNaPer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReNaPer  $reNaPer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReNaPer $reNaPer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReNaPer  $reNaPer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReNaPer $reNaPer)
    {
        //
    }
}
