<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnesignalNotificationController extends Controller
{
    public function oneSignalNotification()
    {        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
        'body' => '{"included_segments":["Subscribed Users"],"contents":{"en":"This is my Demo Notification of Onesignal","es":"Spanish Message"},"name":"INTERNAL_CAMPAIGN_NAME","app_id":"41ec3491-eeb3-43dd-8ec0-1d5181875d58"}',
        'headers' => [
            'Authorization' => 'Basic NThlMTdkNjQtOGNmOC00MTBjLTlkMWMtMzgxMzc2ZDlhY2Yw',
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);
        return $response;
        // echo $response->getBody();
    }
}
