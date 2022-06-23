<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeMaterial;
use App\Subcatergory;
use App\Subsubcatergory;
use RakutenRws_Client;

class RakutenController extends Controller
{
    /**
     *
     *  楽天APIからカテゴリとレシピを取得し、DBに保存する処理
     *
     */
    public function register()
    {
        $client = new RakutenRws_Client();

        // define('RAKUTEN_APPLICATION_ID', config('app.rakuten_id'));
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        $client->setApplicationId('1012872856628443358');
        // RecipeCategoryListをレスポンス
        $response = $client->execute('RecipeCategoryList');
        $response = $client->execute('RecipeCategoryRanking');


        $results = $response['result'];
        foreach ($results as $result) {
                Recipe::create([
                    'id' => $result['recipeId'],
                    'categoryId' => $result['recipeId'],
                    'recipeTitle' => $result['recipeTitle'],
                    'recipeUrl' => $result['recipeUrl'],
                    'foodImageUrl' => $result['foodImageUrl'],
                    'mediumImageUrl' => $result['mediumImageUrl'],
                    'smallImageUrl' => $result['smallImageUrl'],
                    'nickname' => $result['nickname'],
                    'recipeDescription' => $result['recipeDescription'],
                    'recipeIndication' => $result['recipeIndication'],
                    'recipeCost' => $result['recipeCost'],
                ]);
        }
        sleep(1);

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }
}
