<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Institution\InstitutionInfo;

class Message_request extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject = "Respuesta a la solicitud de inscripcion";

    public $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $institution = InstitutionInfo::orderBy('id','desc')->first();
        return $this->from($institution->email,$institution->name)->view('mail.request_response');
    }
}
