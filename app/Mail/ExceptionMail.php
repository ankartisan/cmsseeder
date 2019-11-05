<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExceptionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $exception;

    public $backtrace;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($exception, $backtrace)
    {
        $this->exception = $exception;
        $this->backtrace = $backtrace;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to("alen.ankajcan@gmail.com")
            ->subject('New exception')
            ->view('emails.exception')
            ->with([
                'exception' => $this->exception,
                'backtrace' => $this->backtrace
            ]);
    }
}
