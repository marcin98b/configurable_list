<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\List_;
use App\Models\Product;
use Auth;


class ProductController extends Controller
{

//PROCES DODAWANIA PRODUKTÓW DO LIST (WEB)

    public function __construct()
    {
        $this->middleware('auth');
    }

    //dodanie produktu do listy
    public function create($id){
 
        $product = new Product();
        $product -> name = request('name');
        if(request('shopCategory')) $product->shop_category_id = request('shopCategory');
        $product -> list_id = $id;
       // $product -> user_id = Auth::user()->id;
        $product->save();

        return redirect((route('listShow', $id)))->with('lastCategory', request('shopCategory'));

    }

    //usunięcie produktu
    public function delete($id, $product_id) {

        $product= Product::findOrFail($product_id);

        if($product->list_id == $id) $product -> delete();

        return redirect((route('listShow', $id)));

    }


        //edytuj (zaznaczenie)
        public function update($id, Request $request) {

           $list = List_::findOrFail($id);
           $products = $list -> products;



           foreach($products as $product) {
            
            $name = 'checkbox_'.$product->id;

            if($request[$name]) $product->ticked = 1;
            else $product->ticked = 0;


            $product->save();
           }

    
            return redirect((route('listShow', $id)));
    
        }




 
}
