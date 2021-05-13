<?php

namespace App\Http\Controllers\API;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\List_;
use App\Models\Products;

class ListController extends Controller
{


    public function index() {
      
        return auth()->user()->lists;

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

    public function update(Request $request, $id) {

        $list = List_::find($id);
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
        $newList->save();


        $products = $list->products;
        foreach($products as $product)
        {
            $newProduct = $product->replicate();
            $newProduct -> list_id = $newList->id;
            $newProduct -> save();
        }
        //DOPISAĆ
        //przeniesienie produktow jesli sa
        
        return $newList;

    }


}
