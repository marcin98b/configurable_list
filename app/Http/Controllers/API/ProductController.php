<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\shopCategory;
use App\Models\List_;
use App\Models\Product;
use App\Models\customProduct;
use Auth;

class ProductController extends Controller
{

   //dodanie produktu do listy
   public function create($id){
 
    $product = new Product();
    $product -> name = request('name');
    $product -> shop_category_id = request('shop_category_id');
    if(Auth::user()->customProducts->contains('name', request('name')))
    {
        $customProduct = customProduct::where('name', request('name'))->first();
        $product -> custom_product_id = $customProduct->id;

    }
    $product -> list_id = $id;
    //$product -> user_id = Auth::user()->id;
    return $product->save();

}

//usunięcie produktu
public function delete($id, $product_id) {

    $product= Product::findOrFail($product_id);

    if($product->list_id == $id) {return $product -> delete();}
    else return 0;

}


//pobranie produktow
public function show($id) {

    $list= List_::findOrFail($id);
    $shop_id = $list->shop_id;


    //przypisanie produktow bez kategorii    
    if(count($list->products->where('shop_category_id', null)))
    {
        $uncategorized = new shopCategory();
        $uncategorized -> id = null;
        $uncategorized -> order_position = null;
        $uncategorized -> name = "Nieskategoryzowane";
        $uncategorized -> shop_id = null;
        $uncategorized -> created_at = now();
        $uncategorized -> updated_at = now();
        $uncategorized -> products = [];

        $arr = [];
        foreach($list->products->where('shop_category_id', null) as $product)
        {
            $arr[] = $product;
        }
        $uncategorized-> products = $arr;
    }


    //Lista posiada przypisany sklep wraz z kategoriami
    if($shop_id && count($list->shop->shopCategories))
    {
        $shop = Shop::find($shop_id);
        $categories = $shop->shopCategories()->orderBy('order_position', 'asc')->get();
        $count = count($categories);

        //przypisanie produktow do kategorii
        foreach ($categories as $category)
                $category->products = $category->products;

        //jesli sa produkty nieprzypisane dodaj je do kategorii "Nieprzypisane" bez id
       if(!empty($uncategorized)) 
       {
            $uncategorized->order_position = $count + 1;
            $categories[] = $uncategorized;
       }

       return $categories;

    }
    else
        return $uncategorized;
    

}


    //edytuj (zaznaczenie)
    public function update($id, $product_id, Request $request) {
      
        $product = Product::find($product_id);
        if($product->list_id == $id) 
        {
            $product -> update($request->all());
            return $product;
        }
        else return 0;

    }





}
