<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Registration;
use App\Field;

class RegistrationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $groupId;
    public $group;
    public $firstname;
    public $email = 'info@trefoil.ee';

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registration, $groupId)
    {
        $this->registration = $registration;
        $this->groupId = $groupId;
        $this->firstname = $registration->parent1->firstname;
        $this->group = Field::find($this->groupId);
        if (in_array($this->groupId, [1, 2, 3])) {
            $this->email = 'kids@trefoil.ee';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registrations.accepted')->subject('Spordikool Trefoil | Ootame proovitrennile');
    }
}
