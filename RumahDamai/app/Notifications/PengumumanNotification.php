<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PengumumanNotification extends Notification
{
    use Queueable;

    protected $pengumuman;

    public function __construct($pengumuman)
    {
        $this->pengumuman = $pengumuman;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->pengumuman->judul,
            'description' => $this->pengumuman->deskripsi,
        ];
    }
}

