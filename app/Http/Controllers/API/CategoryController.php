<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\List_;
use App\Models\shopCategory;
use App\Models\listCategory;
use Auth;

class CategoryController extends Controller
{


 //Kategorie - dla sklepów  
 //------------------------------------------------------------------------------------------ 
    public function shop_categoryIndex($id) {

        $shop = Shop::find($id);
        return $shop->shopCategories()->orderBy('order_position', 'desc')->get();

    }

    public function shop_categoryCreate($id, Request $request) {

        $shop = Shop::find($id);
        $shopCategories = $shop -> shopCategories;

        $request->request->add([
            //request('name')
            'order_position' => $shopCategories->max('order_position')+1,
            'shop_id' => $shop->id
    
            ]);
       
       
        return shopCategory::create($request->all());

    }

    public function shop_categoryUpdate($id, $category_id, Request $request) {

        $shop = Shop::find($id);
        $shopCategory = $shop->shopCategories()->find($category_id);
        $shopCategory -> update($request->all());
        return $shopCategory;

    }

    public function shop_categoryDelete($id, $category_id) {

        $shop = Shop::find($id);
        $shopCategory = $shop->shopCategories()->find($category_id);
        return $shopCategory->delete();

    }


    public function shop_categoryUpdatePosition($id, $arr) {

        $shop = Shop::find($id);
        $array = explode(",", $arr);

        for($i = 0; $i<sizeof($array); $i++)
        {
            $shopCategory = shopCategory::find($array[$i]);
            $shopCategory -> order_position = $i;
            $shopCategory -> save();
        }

        return $shop->shopCategories()->orderBy('order_position', 'desc')->get();
        
    }




}
