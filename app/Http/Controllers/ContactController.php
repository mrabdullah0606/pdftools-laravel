<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function showForm()
    {
        // Return the contact form view
        return view('pages.contact-us'); 
    }
    
    public function submitContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:2000',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaSecret = config('services.recaptcha.secret_key', env('RECAPTCHA_SECRET_KEY'));

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip()
        ]);

        $recaptchaResult = $response->json();

        if (!$recaptchaResult['success']) {
            return redirect()->back()->with('error', 'reCAPTCHA verification failed. Please try again.');
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = config('mail.mailers.smtp.host', env('MAIL_HOST', 'smtp.gmail.com'));
            $mail->SMTPAuth   = true;
            $mail->Username   = config('mail.mailers.smtp.username', env('MAIL_USERNAME', 'compilelogics@gmail.com'));
            $mail->Password   = config('mail.mailers.smtp.password', env('MAIL_PASSWORD', 'ifqqnxkkxbzcziui'));
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption', env('MAIL_ENCRYPTION', 'tls'));
            $mail->Port       = (int) config('mail.mailers.smtp.port', env('MAIL_PORT', 587));

            // Optional: for Gmail it's often better to explicitly set the AuthType
            // $mail->AuthType = 'LOGIN'; 


            // Corrected From / Reply-To
            $mail->setFrom(env('MAIL_USERNAME'), $request->name);
            $mail->addReplyTo($request->email, $request->name);

            // Recipient
            $mail->addAddress('Pdftools15@gmail.com'); // or your receiver

            $mail->isHTML(true);
            $mail->Subject = "New Contact Form Message";
            $mail->Body = "
                <h3>New Message Received:</h3>
                <p><strong>Name:</strong> {$request->name}</p>
                <p><strong>Email:</strong> {$request->email}</p>
                <p><strong>Message:</strong><br>{$request->message}</p>
            ";

            $mail->send();

            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to send message: ' . $mail->ErrorInfo);
        }
    }
}