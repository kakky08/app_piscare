<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop;
use App\ShopArea;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HotpepperController extends Controller
{
    // HTTPリクエストを送るURL


    // private const REQUEST_URL = config('hotpepper.request_url');

    // private const REQUEST_URL_AREA = config('hotpepper.request_area');


    public function updateShop()
    {

        $request_url = config('hotpepper.request_url');

        $client = new Client();

        $method = 'GET';

        $this->api_key = config('hotpepper.api_key');


        /**
         * お店の数を取得
         */
        $options = [
            'query' => [
                'key' => config('hotpepper.api_key'),
                'keyword' => '魚',
                'large_service_area' => 'SS10',
                'large_area' => 'Z011',
                'format' => 'json',
                'order' => 4
            ],
        ];

        $response = $client->request($method, $request_url, $options);

        $results = json_decode($response->getBody(), true)['results'];

        /**
         * ページ分ループを回す
         */
        for ($i = 1; $i <  165 /* (int)($results_available / 10) */; $i++) {

            $options = [
                'query' => [
                    'key' => config('hotpepper.api_key'),
                    'keyword' => '魚',
                    'large_service_area' => 'SS10',
                    'large_area' => 'Z011',
                    'start' => (10 * ($i - 1)) + 1,
                    'format' => 'json',
                    'order' => 4
                ],
            ];


            $response = $client->request($method, $request_url, $options);

            $results = json_decode($response->getBody(), true)['results'];

            for ($j = 0; $j < $results['results_returned']; $j++) {

                $categoryId = Shop::where('id', $results['shop'][$j]['id'])->first();
                if (empty($categoryId)) {
                    Shop::create([
                        'id' => $results['shop'][$j]['id'],
                        'name' => $results['shop'][$j]['name'],
                        'catch' => $results['shop'][$j]['catch'],
                        'photo' => $results['shop'][$j]['photo']['pc']['m'],
                        'area' => $results['shop'][$j]['middle_area']['code'],
                        'url' => $results['shop'][$j]['urls']['pc'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }





}