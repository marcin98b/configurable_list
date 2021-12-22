<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\List_;
use App\Models\User;
use App\Models\Shop;
use App\Models\Product;
use App\Models\shopCategory;

class ListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //wyświetlenie wszystkich list stworzonych przez użytkownika

    public function index() {

        $lists = Auth::user()->lists()
          ->orderBy('created_at', 'desc')
          ->get();

        return view('dashboard', [

            'lists' => $lists,

        ]);

    }

    //wyświetlenie pojedyńczej listy
    public function show($id) {

        if(!is_null(List_::find($id)))
        {
            $list=List_::find($id);
        }
        else {
            
            return redirect('dashboard');
            
        }
        if($list->user_id != Auth::user()->id) 
        {
            return redirect('dashboard');
        }
        else {

            return view('list.show', [
                'list' => $list,
                ]);
        }

    }

    public function showShared($share_key) {

        $list = List_::firstWhere('share_key', $share_key);

        if($list) {
        return view('list.showShared', [
            'list' => $list,

        ]);
        }
        else return redirect('dashboard');

    }

    public function createShared($share_key) {


        if(request('shop_id') != 'notAssigned') //dodawanie dla sklepu
        {
            $listToCopy = List_::firstWhere('share_key', $share_key);

            $newList = $listToCopy->replicate();
            $newList -> name = $listToCopy->name . ' (autorstwa '.User::find($listToCopy->user_id)->name. ')';
            $newList -> share_key = null;
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
                    $newProduct -> custom_product_id = null;
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
                $newProduct -> custom_product_id = null;
                $newProduct -> save();

            }

        }
        else //dodawanie bez sklepu
        {
            $listToCopy = List_::firstWhere('share_key', $share_key);
            $newList = $listToCopy->replicate();
            $newList -> name = $listToCopy->name . ' (autorstwa '.User::find($listToCopy->user_id)->name. ')';
            $newList -> share_key = null;
            $newList -> shop_id = null;
            $newList -> user_id = Auth::user()->id;
            $newList->save();

            foreach($listToCopy->products as $product)
            {
                $newProduct=$product->replicate();
                $newProduct->list_id = $newList->id;
                $newProduct->shop_category_id = null;
                $newProduct -> custom_product_id = null;
                $newProduct->save();

            }

        }

        return redirect('dashboard')->with('message', 'Pomyślnie skopiowano listę!');

    }

    //dodawanie listy i przechowywanie w bazie
    public function create() {
    
        $list = new List_();
        if(request('shop_id')) $list -> shop_id = request('shop_id');
        $list -> name = request('name');
        $list -> user_id = Auth::user()->id;
        $list->save();

        if(!request('shop_id'))
            return redirect('dashboard')->with('message', 'Pomyślnie dodano nową listę!');
        else
            return redirect(route('shopShow', request('shop_id') ))->with('message', 'Pomyślnie dodano listę do sklepu!');           


    }

    //usunięcie listy
    public function delete($id) {

        $list = List_::findOrFail($id);

        if($list->user_id != Auth::user()->id) 
        {
            return redirect('dashboard');
        }
        else 
        {
            $list -> delete();
            if(request('shop_id'))
                return redirect(route('shopShow', request('shop_id') ))->with('message', 'Pomyślnie usunięto listę!');           
            else
                return redirect('dashboard')->with('message', 'Pomyślnie usunięto listę!');
        }
    }

    //edytuj
    public function edit($id) {
    
        $list=List_::find($id);
        if(request('name')) $list -> name = request('name');
        if(request('shop_id')) $list -> shop_id = request('shop_id');
        else $list -> shop_id = null;
        //share button
        if(request('share')) $list -> share_key = Str::random(16);
        else $list -> share_key = null;

        $list -> save();

        return redirect(route('listEditView', $id))
        ->with('message', 'Pomyślnie edytowano listę');

    }


    //edytuj nazwe (widok)
    public function editView($id) {
    

        $list=List_::find($id);
        $shops = Auth::user()->shops;

        return view('list.edit', [
            'list' => $list,
            'shops' => $shops
            ]);

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

        if(request('shop_id'))
            return redirect(route('shopShow', request('shop_id') ))->with('message', 'Pomyślnie zduplikowano listę "'.$newList->name.'"');           
        else
            return redirect('dashboard')
            ->with('message', 'Pomyślnie zduplikowano listę "'.$newList->name.'"');


    }


    

}
