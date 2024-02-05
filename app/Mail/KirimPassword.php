<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$password)
    {
        $this->passwordUser = $password;
        $this->user = User::find($id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("SNI AWARD")->from('sniaward@bsn.go.id')->view('templateemail')->with([
            'email' => $this->user->email,
            'password' =>$this->passwordUser,
        ]);
    }
}
