<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;
use App\order;


class PdfReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'PDF Recibido';

    public $msg;

    public $description;

    public $date;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg,$description,$date)
    {
        $this->msg = $msg;
        $this->description = $description;
        $this->date = $date;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = order::orderby('id','DESC')
            ->description($this->description)
            ->date($this->date)
            ->get();
        //dd($orders);

        $pdf = PDF::loadView('pdf.query',[
            'orders' => $orders,
        ]);

        return $this->view('emails.pdfReceived')
            ->attachData($pdf->output(),'results.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
