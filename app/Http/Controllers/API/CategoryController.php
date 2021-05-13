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
            $shopCategory -> order_position = sizeof($array)-$i;
            $shopCategory -> save();
        }

        return $shop->shopCategories()->orderBy('order_position', 'desc')->get();
        
    }

 //Kategorie - dla list  
 //------------------------------------------------------------------------------------------ 

 public function list_categoryIndex($id) {

    $list = List_::find($id);
    return $list->listCategories()->orderBy('order_position', 'desc')->get();

}

public function list_categoryCreate($id, Request $request) {

    $list = List_::find($id);
    $listCategories = $list -> listCategories;

    $request->request->add([
        //request('name')
        'order_position' => $listCategories->max('order_position')+1,
        'list_id' => $list->id

        ]);
   
   
    return listCategory::create($request->all());

}

public function list_categoryUpdate($id, $category_id, Request $request) {

    $list = List_::find($id);
    $listCategory = $list->listCategories()->find($category_id);
    $listCategory -> update($request->all());
    return $listCategory;

}

public function list_categoryDelete($id, $category_id) {

    $list = List_::find($id);
    $listCategory = $list->listCategories()->find($category_id);
    return $listCategory->delete();

}


public function list_categoryUpdatePosition($id, $arr) {

    $list = List_::find($id);
    $array = explode(",", $arr);

    for($i = 0; $i<sizeof($array); $i++)
    {
        $listCategory = listCategory::find($array[$i]);
        $listCategory -> order_position = sizeof($array)-$i;
        $listCategory -> save();
    }

    return $list->listCategories()->orderBy('order_position', 'desc')->get();
    
}




}
