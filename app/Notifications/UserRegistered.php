<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification
{
    use Queueable;

    protected $user;

    // Konstruktor untuk menerima data user
    public function __construct($user)
    {
        $this->user = $user;
    }

    // Saluran notifikasi (via email)
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Email yang dikirim
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Akun Berhasil Didaftarkan')
            ->view('emails.user_registered', [
                'user' => $this->user,
            ]);
    }
}
