<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Models\User;
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
    return $list->products;


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
