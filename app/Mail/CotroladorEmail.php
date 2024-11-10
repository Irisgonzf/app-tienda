<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CotroladorEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;
    public $mensaje;

    public function __construct($nombre, $correo,$mensaje)
    {
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
        $this->correo=$correo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'usuario.correo', 
            with: [
                'nombre' => $this->nombre,  
                'mensaje' => $this->mensaje,
                'correo'=> $this->correo,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
