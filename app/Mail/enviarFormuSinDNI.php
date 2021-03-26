<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class enviarFormuSinDNI extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $provincia;
    public $organizacion;
    public $email;
   


    public function __construct($nombre, $apellido, $provincia, $organizacion, $email)
    {
       $this->nombre=$nombre;
       $this->apellido=$apellido;
       $this->provincia=$provincia;
       $this->organizacion=$organizacion;
       $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.envioFormSinDNI');
    }
}
