<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Tracker;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PaccoConsegnato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Tracker $tracker)
    {
        $this->user = $user;
        $this->tracker = $tracker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('reception@mds.com')->view('mail');
    }
}
