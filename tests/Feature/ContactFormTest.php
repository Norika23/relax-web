<?php

namespace Tests\Feature;

use App\Mail\ContactInquiryMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_a_contact_inquiry_is_sent_to_relax_web(): void
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => '山田 太郎',
            'email' => 'customer@example.com',
            'business_type' => 'リラクゼーションサロン',
            'message' => 'ホームページについて相談したいです。',
        ]);

        $response->assertRedirect(route('home').'#contact');
        $response->assertSessionHas('contact_success');

        Mail::assertSent(ContactInquiryMail::class, function (ContactInquiryMail $mail): bool {
            return $mail->hasTo('relax.web.support@gmail.com')
                && $mail->envelope()->replyTo[0]->address === 'customer@example.com';
        });
    }

    public function test_contact_form_validates_required_fields(): void
    {
        Mail::fake();

        $response = $this->from(route('home').'#contact')->post(route('contact.store'), [
            'name' => '',
            'email' => 'not-an-email',
        ]);

        $response->assertSessionHasErrors(['name', 'email']);
        Mail::assertNothingSent();
    }
}
