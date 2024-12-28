<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationTyC extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre, $apellido, $correo, $telefono, $documento, $nameJuego, $tipoJuego, $fecha, $codigo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $apellido, $correo, $telefono, $documento, $nameJuego, $tipoJuego, $fecha, $codigo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->documento = $documento;
        $this->nameJuego = $nameJuego;
        $this->tipoJuego = $tipoJuego;
        $this->fecha = $fecha;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.emailT&C')->subject('Notificación T&C');
    }
}
