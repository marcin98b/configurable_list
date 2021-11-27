<?php

namespace App\Http\Controllers\API;

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

        return $customProducts;

    }

    public function create(){
 
        $customProduct = new customProduct();
        $customProduct -> name = request('name');
        $customProduct -> user_id = Auth::user()->id;
        return $customProduct -> save();
    }

    public function delete($id){

        $customProduct = customProduct::FindOrFail($id);
        $name = $customProduct -> name;
        $customProduct -> delete();
        if(Auth::user()->id == $customProduct -> user_id) return $customProduct -> delete();
        else return 0;


    }


    
    public function show($id){

        $customProduct = customProduct::FindOrFail($id);
        return $customProduct;

    }
 
    public function update(Request $request, $id) {

        $customProduct = customProduct::find($id);
        if($request->input('share')) $customProduct -> share_key = Str::random(16);
        //else $customProduct -> share_key = null;
        $customProduct -> update($request->all());
        return $customProduct;

        
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

    public function showShared($share_key) {

        $customProduct = customProduct::firstWhere('share_key', $share_key);
        return $customProduct;

    }

    public function createShared($share_key) {

        $customProduct = customProduct::firstWhere('share_key', $share_key);
        $newCustomProduct = $customProduct -> replicate();
        $newCustomProduct -> user_id = Auth::user()->id;
        $newCustomProduct -> share_key = null;
        $newCustomProduct -> save();
      
        return $newCustomProduct;

    }


}
