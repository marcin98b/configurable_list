<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\List_;
use Auth;

class ShopController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {

        $shops = Auth::user()->shops()
          ->orderBy('created_at', 'desc')
          ->get();

        return view('shop.index', [

            'shops' => $shops,

        ]);

    }

    //wyświetlenie sklepu
    public function show($id) {

        if(!is_null(Shop::find($id)))
        {
            $shop=Shop::find($id);
        }
        else {
            
            return redirect('shops');
            
        }
        if($shop->user_id != Auth::user()->id) 
        {
            return redirect('shops');
        }
        else {

            return view('shop.show', [
                'shop' => $shop,
                ]);
        }

    }

    //dodawanie sklepu
    public function create() {
    
        $shop = new Shop();
        $shop -> name = request('name');
        $shop -> user_id = Auth::user()->id;
        $shop->save();

        return redirect('shops')
        ->with('message', 'Pomyślnie dodano sklep!');

    }
    //edytuj nazwe
    public function edit($id) {
    
        $shop=Shop::find($id);
        $shop -> name = request('name');
        $shop -> shop_id = request('shop_id');
        $shop -> save();

        return view('shop.show', [
            'shop' => $shop,
            ]);

    }


    //usunięcie sklepu
    public function delete($id) {

        $shop = Shop::findOrFail($id);


        if($shop->user_id != Auth::user()->id) 
        {
            return redirect('shops');
        }
        else 
        {
            $shop->delete();
            return redirect('shops')
            ->with('message', 'Pomyślnie usunięto sklep!');
        }
    }




}
