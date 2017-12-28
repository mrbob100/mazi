<?php

namespace Corp\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Corp\User;
class ActivateAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // User data.
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $activationLink = route('activation', [
            'id' => $this->user->id,
            'token' => bcrypt($this->user->email)
        ]);

        return $this->subject(trans('interface.ActivationAccount'))
            ->view('auth.emails.activate')->with([
                'activationLink' => $activationLink
            ]);
    }
}
