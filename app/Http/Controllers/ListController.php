<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\List_;
use App\Models\Shop;
use App\Models\Product;

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

    //dodawanie listy i przechowywanie w bazie
    public function create() {
    
        $list = new List_();
        $list -> name = request('name');
        $list -> user_id = Auth::user()->id;
        $list->save();

        return redirect('dashboard')
        ->with('message', 'Pomyślnie dodano nową listę!');

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
            return redirect('dashboard')
            ->with('message', 'Pomyślnie usunięto listę!');
        }
    }

    //edytuj nazwe
    public function edit($id) {
    
        $list=List_::find($id);
        $list -> name = request('name');
        $list -> shop_id = request('shop_id');
        $list -> save();

        return view('list.show', [
            'list' => $list,
            ]);

    }


    //edytuj nazwe (widok)
    public function editView($id) {
    

        $list=List_::find($id);
        $shops = Shop::all();

        return view('list.edit', [
            'list' => $list,
            'shops' => $shops
            ]);

    }    

    //duplikacja listy
    public function duplicate($id) {

        $list = List_::findOrFail($id);
        $newList = $list->replicate();
        $newList->save();


        $products = $list->products;
        foreach($products as $product)
        {
            $newProduct = $product->replicate();
            $newProduct -> list_id = $newList->id;
            $newProduct -> save();
        }

        return redirect('dashboard')
        ->with('message', 'Pomyślnie zduplikowano listę "'.$newList->name.'"');

    }


    

}
