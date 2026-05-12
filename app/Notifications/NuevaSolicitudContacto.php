<?php

namespace App\Notifications;

use App\Models\Solicitud;
use App\Models\Tratamiento;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaSolicitudContacto extends Notification
{
    use Queueable;

    protected $solicitud;

    public function __construct(Solicitud $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $solicitud = $this->solicitud;

        $mail = (new MailMessage)
            ->subject('Nueva solicitud de contacto - Teno Fisioterapia')
            ->greeting('¡Nueva solicitud!')
            ->line('Has recibido un mensaje a través del formulario de contacto.')
            ->line('**Nombre:** ' . $solicitud->nombre)
            ->line('**Email:** ' . $solicitud->email)
            ->line('**Teléfono:** ' . ($solicitud->telefono ?? 'No proporcionado'));

        // Si la solicitud está relacionada con un tratamiento, añadirlo
        if ($solicitud->tratamiento_id) {
            $tratamiento = Tratamiento::find($solicitud->tratamiento_id);
            if ($tratamiento) {
                $mail->line('**Tratamiento de interés:** ' . $tratamiento->titulo);
            }
        }

        $mail->line('**Mensaje:**')
            ->line($solicitud->mensaje)
            ->action('Ver solicitudes', url('/admin/solicitudes'))
            ->line('Responde lo antes posible al cliente.');

        return $mail;
    }
}