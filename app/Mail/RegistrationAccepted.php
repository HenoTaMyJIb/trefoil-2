<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Registration;
use App\Group;

class RegistrationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $groupId;
    public $group;
    public $email = 'sktrefoil@gmail.com';

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registration, $groupId)
    {
        $this->registration = $registration;
        $this->groupId = $groupId;
        $this->group = Group::find($this->groupId);
        if (in_array($this->groupId, [1, 2, 3])) {
            $this->email = 'Trefoilkids@gmail.com';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registrations.accepted')->subject('Te olete vastu võetud spordikooli Trefoil');
    }
}
