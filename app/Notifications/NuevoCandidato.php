<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    // public $id_vacante;
    // public $nombre_vacante;
    // public $usuario_id;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        //
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url =url('/notificaciones/' .$this->id_vacante);
        return (new MailMessage)
                    ->line('Hay un nuevo candidato para tu vacante de '.$this->nombre_vacante)
                    ->line($this->nombre_vacante)
                    ->action('Ver notificaciones', $url)
                    ->line('Gracias por utilizar ' .env('APP_NAME'));
    }

    // Almacena las notificaciones en la bd
    public function toDatabase($notifiable)
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' =>$this->nombre_vacante,
            'usuario_id' => $this->usuario_id
        ];
    }
}
