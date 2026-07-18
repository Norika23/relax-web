<?php
namespace App\Mail;
use App\Models\Reservation; use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Mail\Mailables\Content; use Illuminate\Mail\Mailables\Envelope; use Illuminate\Queue\SerializesModels;
class ReservationConfirmedMail extends Mailable { use Queueable,SerializesModels; public function __construct(public Reservation$reservation){} public function envelope():Envelope{return new Envelope(subject:'【テスト整体院】ご予約を承りました');} public function content():Content{return new Content(view:'mail.reservation-confirmed');} }
