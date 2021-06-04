<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customProduct;
use Illuminate\Support\Str;
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
    public function editView($id) {
    
        $customProduct = customProduct::FindOrFail($id);

        return view('customproduct.edit', [
            'customProduct' => $customProduct,
            ]);

    }   

    public function edit($id) {

        $customProduct=customProduct::FindOrFail($id);
        if(request('name')) $customProduct -> name = request('name');
        if(request('description')) $customProduct -> description = request('description');
        //share button
        if(request('share')) $customProduct -> share_key = Str::random(16);
        else $customProduct -> share_key = null;

        //Upload zrobic


        $customProduct -> save();

        return redirect(route('customProductsEditView', $id))
        ->with('message', 'Pomyślnie edytowano produkt');
        

    }



    public function store($id, Request $request) {

        if($request->hasFile('image')) 
        {
            $request->validate([

                'image' => 'required|mimes:jpg,jpeg,png,bmp|max:60000'

            ]);

            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('products', $fileName, 'public');

            $customProduct = customProduct::FindOrFail($id);
            $customProduct -> img_filepath = $filePath;
            $customProduct -> save();

            return $fileName;
        }
    
        return '';


    }


}
