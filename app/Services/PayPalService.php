<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class PayPalService
{
    protected $client;
    protected $baseUri;
    protected $clientId;
    protected $secret;
    public function __construct()
    {
        $this->clientId = config('paypal.client_id');
        $this->secret = config('paypal.secret');
        $mode = config('paypal.mode');
        $this->baseUri = $mode === 'live' ? 'https://api-m.paypal.com' : 'https://api-m.sandbox.paypal.com';

        $this->client = new Client();
    }
    public function getAccessToken()
    {
        $response = $this->client->post("{$this->baseUri}/v1/oauth2/token", [
            'auth' => [$this->clientId, $this->secret],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        return json_decode($response->getBody()->getContents())->access_token;
    }

    public function createOrder($amount)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post("{$this->baseUri}/v2/checkout/orders", [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $amount,
                        ],
                    ]
                ],
                'application_context' => [
                    'return_url' => route('paypal.success'),
                    'cancel_url' => route('paypal.cancel'),
                ]
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function captureOrder($orderId)
    {
        $accessToken = $this->getAccessToken();

        $response = $this->client->post("{$this->baseUri}/v2/checkout/orders/{$orderId}/capture", [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody()->getContents());
    }


    public function getAccessTokenPayout()
    {
        $clientId = env('PAYPAL_CLIENT_ID');
        $clientSecret = env('PAYPAL_SECRET');

        $response = Http::withBasicAuth($clientId, $clientSecret)
            ->asForm()
            ->post("{$this->baseUri}/v1/oauth2/token", [
                'grant_type' => 'client_credentials',
            ]);

        if ($response->successful()) {
            return $response['access_token'];
        }

        \Log::error('PayPal Token Error: ' . $response->body());
        return null;
    }

    public function sendPayout($email, $amount)
    {
        try {
            $accessToken = $this->getAccessTokenPayout();
            if (!$accessToken) {
                return ['error' => 'Unable to generate access token'];
            }

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$accessToken}",
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUri}/v1/payments/payouts", [
                        'sender_batch_header' => [
                            'sender_batch_id' => uniqid('batch_'),
                            'email_subject' => 'You have received a payment!',
                            'email_message' => 'You have received a payout from Laravel App.',
                        ],
                        'items' => [
                            [
                                'recipient_type' => 'EMAIL',
                                'receiver' => $email,
                                'amount' => [
                                    'value' => $amount,
                                    'currency' => 'USD',
                                ],
                                'note' => 'Thank you for using our service!',
                                'sender_item_id' => uniqid('item_'),
                            ]
                        ]
                    ]);
            return $response->json();

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

}

