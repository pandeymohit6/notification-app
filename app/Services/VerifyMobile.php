<?php

namespace App\Services;

use Twilio\Rest\Client;

class VerifyMobile
{

    public function sendSms()
    {
        $token = config("services.twilio.TWILIO_TOKEN");
        $twilio_sid = config("services.twilio.TWILIO_SID");
        $twilio_verify_sid = config("services.twilio.TWILIO_VERIFY_SID");
        $client = new Client($twilio_sid, $token);
        $message = $client->messages->create(
            '7053158852', // Text this number
            [
                'from' => '+16606963433', // From a valid Twilio number
                'body' => 'Hello from Twilio!'
            ]
        );
    }
}
