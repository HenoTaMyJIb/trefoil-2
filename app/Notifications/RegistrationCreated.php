<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Registration;

class RegistrationCreated extends Notification
{
    // use Queueable;

    public $registration;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Uus registreerimine')
                    ->greeting('Tere')
                    ->line('Uus registreerimine rühma: ' . $this->registration->field->name)
                    ->line('Lapse nimi: ' . $this->registration->student->name . " - {$this->registration->student->age} aastat")
                    ->line('Vanema nimi: ' . $this->registration->parent1->name . " (E-post: {$this->registration->parent1->email} | Telefon: {$this->registration->parent1->phone})")
                    ->line('Kommentaar: ' . $this->registration->comment)
                    ->salutation(config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
