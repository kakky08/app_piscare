<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeMaterial;
use App\Category;
use App\SubCategory;
use App\Subsubcatergory;
use RakutenRws_Client;

class RakutenController extends Controller
{

    /**
     *
     *  楽天APIからカテゴリとレシピを取得し、DBに保存する処理
     *
     */
    public function updateRecipe()
    {
        $client = new RakutenRws_Client();
        $client->setApplicationId(config('app.rakuten'));




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

    public function updateCategory()
    {
        $client = new RakutenRws_Client();
        $client->setApplicationId(config('app.rakuten'));

        // RecipeCategoryListをレスポンス
        $response = $client->execute('RecipeCategoryList');

        /* ==============================
         * レシピカテゴリ(中カテゴリ)
        ============================== */

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $results = $response['result'];
            foreach ($results['medium'] as $key => $result)
            {
                if ($result['parentCategoryId'] === '11' || $result['parentCategoryId'] === '32')
                {
                    $categoryId = Category::where('id', $result['categoryId'])->first();
                    if (empty($categoryId))
                    {
                        Category::create([
                            'id' => $result['categoryId'],
                            'categoryName' => $result['categoryName'],
                            'parentCategoryId' => $result['parentCategoryId'],
                        ]);
                    }
                }
            }
            sleep(1);
        }

        /* ==============================
         * レシピカテゴリ(小カテゴリ)
        ============================== */

        if (!$response->isOk()) {
            return 'Error:' . $response->getMessage();
        } else {
            $results = $response['result'];
            foreach ($results['small'] as $key => $result) {
                $is_category = Category::where('id', $result['parentCategoryId'])->first();
                // 中カテゴリにあれば実行
                if (isset($is_category)) {
                    $is_subcategory = SubCategory::where('id', $result['categoryId'])->first();
                    // 小カテゴリになければ実行
                    if (empty($$is_subcategory)) {
                        SubCategory::create([
                            'id' => $result['categoryId'],
                            'categoryId' => $result['parentCategoryId'],
                            'categoryName' => $result['categoryName'],
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }
}
