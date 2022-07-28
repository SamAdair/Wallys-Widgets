<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PublicContact extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $file)
    {
        $this->data = $data;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $data = $this->data;
        $data->showWarning = false; // if true will show the "has attachment" warning message

        $data->department = strtoupper($data->department);

        if($this->file == "null") {
            //no attachment to send
            return $this->markdown('emails.publiccontact')->subject('Website Message: '.$data->department);
        } else {

            //warning
            $data->showWarning = true;

            //attachment to send
            return $this->markdown('emails.publiccontact')->subject('Website Message: '.$data->department)->attach($this->file->path(), [
                'as' => $this->file->getClientOriginalName(),
                'mime' => 'application/pdf',
           ]);
        }


    }
}
