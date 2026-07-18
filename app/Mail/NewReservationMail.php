<?php
namespace App\Mail;
use App\Models\Reservation; use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Mail\Mailables\Content; use Illuminate\Mail\Mailables\Envelope; use Illuminate\Queue\SerializesModels;
class NewReservationMail extends Mailable { use Queueable,SerializesModels; public function __construct(public Reservation$reservation){} public function envelope():Envelope{return new Envelope(subject:'【新規予約】'.$this->reservation->customer_name.'さま');} public function content():Content{return new Content(view:'mail.new-reservation');} }
