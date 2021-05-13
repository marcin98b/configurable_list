<?php

namespace App\Http\Controllers\API;
use App\Models\Shop;
use App\Models\List_;
use Illuminate\Http\Request;

class ShopController extends Controller
{

 
    public function index() {
      
        return auth()->user()->shops;

    }

    public function create(Request $request){

        $request->request->add(['user_id' => auth()->user()->id]);
        return Shop::create($request->all());

    }


    public function show($id) {

        if(Shop::find($id)->user_id == auth()->user()->id)
             return Shop::find($id);
        else return 0;
    }

    public function showAssignedLists($id) {

        if(Shop::find($id)->user_id == auth()->user()->id)
             return Shop::find($id)->lists;
        else return 0;
    }

    public function update(Request $request, $id) {

        $shop = Shop::find($id);
        $shop -> update($request->all());
        return $shop;
    }


    public function delete($id) {

        return Shop::destroy($id);
    }    
   


}
