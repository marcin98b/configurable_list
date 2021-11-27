<?php

namespace App\Http\Controllers\API;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\List_;
use App\Models\Products;
use App\Models\Shop;
use App\Models\shopCategory;

class ListController extends Controller
{


    public function index() {
      
        $lists = auth()->user()->lists()->orderBy('created_at', 'desc')->get();

        foreach($lists as $list)
        {

            $list->productsCounted = count($list->products->where('ticked'));
            $list->productsAvalaible = count($list->products);

        }
        return $lists;

    }

    public function create(Request $request){

        $request->request->add(['user_id' => auth()->user()->id]);
        return List_::create($request->all());

    }


    public function show($id) {

        if(List_::find($id)->user_id == auth()->user()->id)
             return List_::find($id);
        else return 0;
    }


    public function showShared($share_key) {

        $list = List_::firstWhere('share_key', $share_key);
        return $list->products;

    }

    public function createShared($share_key) {


        if(request('shop_id') != '') //dodawanie dla sklepu
        {
            $listToCopy = List_::firstWhere('share_key', $share_key);

            $newList = $listToCopy->replicate();
            $newList -> share_key = null;
            $newList -> name = $listToCopy->name . ' (autorstwa '.User::find($listToCopy->user_id)->name. ')';
            $newList -> shop_id = request('shop_id');
            $newList -> user_id = Auth::user()->id;
            $newList->save();

            //kopiowanie produktow skategoryzowanych
            $categories = $listToCopy->shop->shopCategories;
            foreach($categories as $category)
            {

                //sprawdzenie czy wystepuje kategoria o takie samej nazwie - uniemożliwienie duplikacji kategorii
                $temp = 0;

                foreach(Shop::find(request('shop_id'))->shopCategories as $userCategory)
                {
                    if($userCategory->name == $category->name)
                    {
                        $temp = $userCategory->id;
                        break;
                    }

                }
                //jesli nie wystepuje tworzymy nowa
                if($temp == 0)
                {
                $newCategory = $category -> replicate();
                $newCategory -> shop_id = request('shop_id');
                $newCategory -> save();
                }


                //OK
                foreach($listToCopy->products->where('shop_category_id', $category->id) as $product)
                {
                    $newProduct = $product -> replicate();
                    $newProduct -> list_id = $newList->id;
                    $newProduct ->custom_product_id = null;
                    if($temp) $newProduct -> shop_category_id = $temp;
                    else $newProduct -> shop_category_id = $newCategory->id;
                    $newProduct -> save();
                }

            }

            //nieskategoryzowane produkty
            foreach($listToCopy->products->where('shop_category_id', null) as $product)
            {
                $newProduct = $product -> replicate();
                $newProduct -> list_id = $newList->id;
                $newProduct ->custom_product_id = null;
                $newProduct -> save();

            }

        }
        else //dodawanie bez sklepu
        {
            $listToCopy = List_::firstWhere('share_key', $share_key);
            $newList = $listToCopy->replicate();
            $newList -> share_key = null;
            $newList -> shop_id = null;
            $newList -> user_id = Auth::user()->id;
            $newList->save();

            foreach($listToCopy->products as $product)
            {
                $newProduct=$product->replicate();
                $newList -> name = $listToCopy->name . ' (autorstwa '.User::find($listToCopy->user_id)->name. ')';
                $newProduct->list_id = $newList->id;
                $newProduct->shop_category_id = null;
                $newProduct ->custom_product_id = null;
                $newProduct->save();

            }

        }

        return $newList;

    }




    public function update(Request $request, $id) {

        $list = List_::find($id);
        if($request->input('share')) $list -> share_key = Str::random(16);
        //else $list -> share_key = null;
        $list -> update($request->all());
        return $list;
    }


    public function delete($id) {

        return List_::destroy($id);
    }    


    //duplikacja listy
    public function duplicate($id) {

        $list = List_::findOrFail($id);
        $newList = $list->replicate();
        $newList -> share_key = null;
        $newList->save();


        $products = $list->products;
        foreach($products as $product)
        {
            $newProduct = $product->replicate();
            $newProduct -> list_id = $newList->id;
            $newProduct -> save();
        }
        
        return $newList;

    }


}
