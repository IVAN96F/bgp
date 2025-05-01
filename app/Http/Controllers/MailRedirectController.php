<?php

// app/Http/Controllers/MailRedirectController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailRedirectController extends Controller
{
    public function redirectToGmail()
    {
        $email = 'andang1503@gmail.com';
        return redirect()->away("https://mail.google.com/mail/?view=cm&fs=1&to={$email}");
    }
}
