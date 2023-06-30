<?php

use Illuminate\Support\Facades\Mail;

function sendMail($template, $mailTo, $subject, $data) : void {
    Mail::send($template, $data, function($msg) use ($mailTo, $subject){
        $msg->subject($subject);
        $msg->to($mailTo);
    });
}
