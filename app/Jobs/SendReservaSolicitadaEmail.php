<?php

namespace App\Jobs;

use App\Mail\ReservaSolicitada;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReservaSolicitadaEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reserva;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('herbethlucas0@gmail.com')->send(new ReservaSolicitada($this->reserva));
    }
}
