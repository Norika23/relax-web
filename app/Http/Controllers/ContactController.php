<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactInquiryMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $inquiry = $request->safe()->except('website');

        try {
            Mail::to(config('relax_web.email'))->send(new ContactInquiryMail($inquiry));
        } catch (Throwable $exception) {
            try {
                Log::error('Contact form mail failed', [
                    'email' => $inquiry['email'],
                    'error' => $exception->getMessage(),
                ]);
            } catch (Throwable) {
                // The visitor should still receive a useful response if server logging is unavailable.
            }

            return back()
                ->withInput()
                ->with('contact_error', '送信できませんでした。お手数ですが、LINEまたはメールからご相談ください。')
                ->withFragment('contact');
        }

        return back()
            ->with('contact_success', 'ご相談を受け付けました。内容を確認してご連絡します。')
            ->withFragment('contact');
    }
}
