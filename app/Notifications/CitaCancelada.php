<?php

namespace App\Notifications;

use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CitaCancelada extends Notification
{
    use Queueable;

    protected $cita;

    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $cita = $this->cita;
        $usuario = $cita->user;

        return (new MailMessage)
            ->subject('Cita cancelada - Teno Fisioterapia')
            ->greeting('Aviso de cancelación')
            ->line('Un paciente ha cancelado su cita.')
            ->line('**Paciente:** ' . $usuario->name . ' ' . ($usuario->apellidos ?? ''))
            ->line('**Email:** ' . $usuario->email)
            ->line('**Tipo:** ' . ucfirst($cita->tipo))
            ->line('**Fecha:** ' . \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y'))
            ->line('**Hora:** ' . $cita->hora)
            ->action('Ver panel de citas', url('/admin/citas'))
            ->line('Esta franja horaria ha quedado libre.');
    }
}
