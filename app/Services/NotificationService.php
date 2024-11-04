<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class NotificationService
{
    public function notify($message, $redirecTo)
    {
        Session::flash('notification', $message);

        return redirect($redirecTo);
    }
}