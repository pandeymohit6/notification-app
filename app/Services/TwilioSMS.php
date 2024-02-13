<?php

namespace App\Services;

use Exception;
use Twilio\Rest\Client;

class TwilioSMS
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function send()
    {

        try {

            $account_sid = config("services.twilio.TWILIO_SID");
            $auth_token = config("services.twilio.TWILIO_TOKEN");
            $twilio_number = config("services.twilio.TWILIO_FROM");

            $twilio_number = "+16606963433";

            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                // Where to send a text message (your cell phone?)
                '8800704138',
                array(
                    'from' => $twilio_number,
                    'body' => 'I sent this message in under 10 minutes!'
                )
            );
            dd('SMS Sent Successfully.');
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }
}
