<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customProduct;
use Auth;

class CustomProductController extends Controller
{

    public function index() {

        $customProducts = Auth::user()->customProducts()
          ->orderBy('created_at', 'desc')
          ->get();

        return view('customproduct.index', [

            'customProducts' => $customProducts,

        ]);

    }

    public function create(){
 
        $customProduct = new customProduct();
        $customProduct -> name = request('name');
        $customProduct -> user_id = Auth::user()->id;
        $customProduct -> save();
        return redirect(route('customProductsIndex'))->with('message', 'Pomyślnie dodano nowy produkt!');
    }

    public function delete($id){

        $customProduct = customProduct::FindOrFail($id);
        $name = $customProduct -> name;
        $customProduct -> delete();
        return redirect(route('customProductsIndex'))->with('message', 'Usunięto produkt "'.$name.'".');


    }


    
    public function show($id){

        $customProduct = customProduct::FindOrFail($id);


        return view('customproduct.show', [

            'customProduct' => $customProduct,

        ]);

    }


}
