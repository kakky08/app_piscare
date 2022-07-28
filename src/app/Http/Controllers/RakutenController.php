<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeMaterial;
use App\Category;
use App\SubCategory;
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
        define("RAKUTEN_APPLICATION_ID", config('rakuten.api_key'));
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        /* ==============================
        |
        | 中カテゴリのレシピを取得
        |
        ============================== */

        $categories = Category::select('id', 'parentCategoryId', 'search_recipe')->get();

        foreach ($categories as $category)
        {
            sleep(1);
            $response = $client->execute('RecipeCategoryRanking', array(
                'categoryId' => $category->search_recipe,
            ));

            if (!$response->isOk())
            {
                return 'Error:' . $response->getMessage();
            }
            else
            {
                $results = $response['result'];
                foreach ($results as $result)
                {
                    $recipe = Recipe::find($result['recipeId']);/* where('id', $result['recipeId'])->first(); */
                    if (empty($recipe))
                    {
                        $recipeId = $result['recipeId'];
                        Recipe::create([
                            'id' => $recipeId,
                            'categoryId' =>  $category->parentCategoryId . $category->id,
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

                        foreach ($result['recipeMaterial'] as $key => $material) {
                            RecipeMaterial::create([
                                'recipe_id' => $result['recipeId'],
                                'order' => $key,
                                'name' => $material,
                            ]);
                        }
                    }
                    sleep(1);
                }
            }
            sleep(1);
        }

        /* ==============================
        |
        | 小カテゴリのレシピを取得
        |
        ============================== */

        $subCategories = SubCategory::select('id', 'category_id',  'search_recipe')->get();
        foreach ($subCategories as $subCategory) {
            sleep(10);
            $parent = Category::where('id', $subCategory->category_id)->select('parentCategoryId')->first();
            $response = $client->execute('RecipeCategoryRanking', array(
                'categoryId' => $subCategory->search_recipe,
            ));

            if (!$response->isOk()) {
                return 'Error:' . $response->getMessage();
            } else {
                $results = $response['result'];
                foreach ($results as $result) {
                    $recipeId = Recipe::where('id', $result['recipeId'])->first();

                    if (empty($recipeId)) {
                        $recipeId = $result['recipeId'];
                        Recipe::create(['id' => $result['recipeId'],
                            'categoryId' =>  $parent->parentCategoryId . $subCategory->category_id . $subCategory->id,
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

                        foreach ($result['recipeMaterial'] as $key => $material) {
                            RecipeMaterial::create([
                                'recipe_id' => $result['recipeId'],
                                'order' => $key,
                                'name' => $material,
                            ]);
                        }
                    }
                }
            }
            sleep(1);
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました');
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
                            'search_recipe' => $result['parentCategoryId'] . '-' . $result['categoryId']
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
                $category = Category::where('id', $result['parentCategoryId'])->first();
                // 中カテゴリにあれば実行
                if (isset($category)) {
                    $is_subcategory = SubCategory::where('id', $result['categoryId'])->first();
                    // 小カテゴリになければ実行
                    if (empty($$is_subcategory)) {
                        SubCategory::create([
                            'id' => $result['categoryId'],
                            'category_id' => $result['parentCategoryId'],
                            'categoryName' => $result['categoryName'],
                            'search_recipe' => $category->parentCategoryId . '-' .  $result['parentCategoryId'] . '-' .$result['categoryId']
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.home')->with('successMessage', '登録に成功しました。');
    }
}
