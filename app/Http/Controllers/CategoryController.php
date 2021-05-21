<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\List_;
use App\Models\shopCategory;
use App\Models\listCategory;
use Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

//DLA SKLEPÓW    
    public function shop_categoryIndex($id) {

        $shop = Shop::find($id);
        $shopCategories = $shop->shopCategories()->orderBy('order_position', 'desc')->get();

        return view('category.index', [
            'shop' => $shop,
            'shopCategories' => $shopCategories
            ]);
    }


    public function shop_categoryCreate($id) {

        $shop = Shop::find($id);
        $shopCategories = $shop->shopCategories;
        $newCategory = new shopCategory();

        $newCategory -> name = request('name');
        $newCategory -> order_position = $shopCategories->max('order_position')+1;
        $newCategory -> shop_id = $shop->id;
        $newCategory -> save();



        return redirect((route('shop_categoryIndex', $id)))
        ->with('message', 'Pomyślnie dodano nową kategorię!');

    }   

    //usunięcie kategorii
    public function shop_categoryDelete($id, $category_id) {

        $shopCategory = shopCategory::findOrFail($category_id);
        $shopCategory -> delete();

         return redirect(route('shop_categoryIndex', $id))->with('message', 'Pomyślnie usunięto kategorię!');

    }

        //update kategorii
        public function shop_categoryUpdatePosition($id, $arr) {


            $shop = Shop::find($id);
            $array = explode(",", $arr);

            for($i = 0; $i<sizeof($array); $i++)
            {
                $shopCategory = shopCategory::find($array[$i]);
                $shopCategory -> order_position = $i+1;
                $shopCategory -> save();
            }


             return redirect(route('shop_categoryIndex', $id))->with('message', 'Pomyślnie zmieniono kolejność kategorii');
    
        }
//-----------------------------------------------------------------------------------------------------------------------------------------
//DLA LIST

public function list_categoryIndex($id) {

    $list = List_::find($id);
    $listCategories = $list->listCategories()->orderBy('order_position', 'desc')->get();

    return view('category.indexList', [
        'list' => $list,
        'listCategories' => $listCategories
        ]);
}


public function list_categoryCreate($id) {

    $list = List_::find($id);
    $listCategories = $list->listCategories;
    $newCategory = new listCategory();

    $newCategory -> name = request('name');
    $newCategory -> order_position = $listCategories->max('order_position')+1;
    $newCategory -> list_id = $list->id;
    $newCategory -> save();



    return redirect((route('list_categoryIndex', $id)))
    ->with('message', 'Pomyślnie dodano nową kategorię!');

}   

//usunięcie kategorii
public function list_categoryDelete($id, $category_id) {

    $listCategory = listCategory::findOrFail($category_id);
    $listCategory -> delete();

     return redirect(route('list_categoryIndex', $id))->with('message', 'Pomyślnie usunięto kategorię!');

}

    //update kategorii
    public function list_categoryUpdatePosition($id, $arr) {
       
        $list = List_::find($id);
        $array = explode(",", $arr);

        for($i = 0; $i<sizeof($array); $i++)
        {
            $listCategory = listCategory::find($array[$i]);
            $listCategory -> order_position = sizeof($array)-$i;
            $listCategory -> save();
        }


         return redirect(route('list_categoryIndex', $id))->with('message', 'Pomyślnie zmieniono kolejność kategorii');

    }

}
