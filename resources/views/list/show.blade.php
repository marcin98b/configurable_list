<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(is_null($list->name))
            Lista: &lt;nienazwana&gt; (z dnia: {{$list->created_at}})
            @else
            Lista: "{{$list->name}}"
            @endif
        </h2>
        
        <p class="text-gray-400">Przypisana do sklepu:
                    
        @if($list->shop_id)

        <a class="text-blue-400 no-underline hover:underline" href = "{{route('shopShow', $list->shop_id)}}"> {{$list->shop->name ?? '#'}} </a> <br/>
        
        @else
        <a class="text-blue-400 no-underline hover:underline" href = "{{route('listEditView', $list->id)}}">Brak [dodaj] </a> <br/>
        
        @endif

        </p>
    </x-slot>


    {{-- <div class="py-3 max-w-7xl mx-auto sm:px-8 lg:px-8">              
    <form class="float-right" style="margin:0px; padding:0px; display:inline;" action="{{route('list_categoryIndex', $list->id)}}" method="GET">
        @csrf
        @method('GET')
            <button 
            class="py-1 px-3 rounded bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                Ustawienia listy
            </button>
    </form>  
</div> --}}

    <div class="py-4">

    <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">



            <!-- wiadomosc -->
            @if(session('message'))
            <div class="mb-3 bg-teal-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div>
                    <p class="font-bold">{{session('message')}}</p>

                  </div>
                </div>
              </div>
            @endif



            <div class="pb-5 flex justify-end">
                <form method="POST" action="{{route('productCreate', $list->id)}}">
                @csrf 

                @if($list->shop_id && !$list->shop->shopCategories->isEmpty())
                    <select class="select py-1 mx-1 w-32 border border-transparent focus:outline-none focus:ring-2 " style="height:20" name="shopCategory">
                       
                @foreach ($list->shop->shopCategories->sortBy('order_position') as $shopCategory)
                    <option @if(session('lastCategory') == $shopCategory->id) selected @endif value="{{$shopCategory->id}}">{{$shopCategory->name}}</option>
                @endforeach    
                    <option class="text-red-500" value="">[Brak kategorii]</option>
                    </select>

                @endif

                    <input list="nameList" autocomplete="off" id="name" autofocus required name="name" placeholder="Dodaj produkt ..." class="py-1 w-36 border border-transparent focus:outline-none focus:ring-2 ">
               
                    @if(Auth::user()->customProducts)
                    <datalist id="nameList">
                        @foreach(Auth::user()->customProducts as $customProduct)
                        <option value="{{$customProduct->name}}">
                        @endforeach

                      </datalist>
                    @endif
                    <input value="+" type="submit" class="mr-1 py-1 px-3 bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                    
                </form>
                <form class="pl-1" style="padding-top:1px;" id="form_update" method="POST" action="{{route('productUpdate', $list->id )}}">
                    @csrf 

        
            </div>

            <div class="container max-w-7xl mx-auto ">


                @if ($list->products->isEmpty())
                
                <div class="p-6 width-100 bg-white border-b border-gray-200">
                    Brak zdefiniowanych produktów w liście
                </div>
                @endif
                     
                    <div id="products" >

                    @if(!$list->shop_id || $list->shop->shopCategories->isEmpty())    
                   

                    @if(count($list->products)) <div class="p-1 text-center bg-blue-200">Nieskategoryzowane</div> @endif

                        @foreach($list->products as $product)

                        <div class="product clearfix  h-14 p-3 width-100 bg-white border-b border-gray-200">
                            <div class="float-left">
                                

                                <h1 class="text-lg">
                                    <input  onchange='handleChange(this, {{$loop->index}});' name="checkbox_{{$product->id}}" value="1" class="product_checkbox w-5 h-5 mr-2" @if($product->ticked) checked @endif type="checkbox"/>
                                  <p class="inline">
                                  
                                    @if(!$product->custom_product_id)
                                       {{$product->name}}
                                      @else
                                       <a class="text-blue-500 underline hover:text-blue-600" href="{{route('customProductsShow', $product->custom_product_id)}}"> {{$product->name}} </a>
                                      @endif
                                
                                  </p>
                                    
                                </h1>

                        </div>
                                

                        <div class="float-right">
                         
                                    <button form="form_delete" onclick="form_delete({{$list->id}},{{$product->id}})" class="py-1 px-3 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                        X
                                    </button>


                        </div>
                        </div>

                        @endforeach
                
                    @else

    
                        @foreach($list->shop->shopCategories->sortBy('order_position') as $shopCategory)

                        @if(count($list->products->where('shop_category_id', $shopCategory->id))) <div class="p-1 text-center bg-green-200">  {{$shopCategory->name}} </div> @endif 

                            @foreach($shopCategory->products as $product)

                                @if($list->id == $product->list_id)

                                <div class="product clearfix  h-14 p-3 width-100 bg-white border-b border-gray-200">
                                    <div class="float-left">
                                        

                                        <h1 class="text-lg">
                                            <input  onchange='handleChange(this, {{$loop->index}});' name="checkbox_{{$product->id}}" value="1" class="product_checkbox w-5 h-5 mr-2" @if($product->ticked) checked @endif type="checkbox"/>
                                        <p class="inline">
                                       
                                            @if(!$product->custom_product_id)
                                            {{$product->name}}
                                           @else
                                            <a class="text-blue-500 underline hover:text-blue-600" href="{{route('customProductsShow', $product->custom_product_id)}}"> {{$product->name}} </a>
                                           @endif
                                        
                                        </p>
                                            
                                        </h1>

                                </div>
                                        

                                <div class="float-right">
                                
                                            <input form="form_delete" name="shopCategory" value="{{$shopCategory->id}}" type="hidden"/>
                                            <button form="form_delete" onclick="form_delete({{$list->id}},{{$product->id}})" class="py-1 px-3 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                                X
                                            </button>


                                </div>
                                </div>

                                    @if($loop->last)
                                        <div class="p-5"></div>
                                    @endif

                                @endif


                            @endforeach



                        @endforeach                    

                
                        <!-- nieskategoryzowane -->
                        @if(count($list->products->where('shop_category_id', null))) <div class="p-1 text-center bg-blue-200">Nieskategoryzowane</div> @endif    

                        @foreach($list->products->where('shop_category_id', null) as $product)
                
                            <div class="product clearfix h-14 p-3 width-100 bg-white border-b border-gray-200">
                                <div class="float-left">
                                    

                                    <h1 class="text-lg">
                                        <input  onchange='handleChange(this, {{$loop->index}});' name="checkbox_{{$product->id}}" value="1" class="product_checkbox w-5 h-5 mr-2" @if($product->ticked) checked @endif type="checkbox"/>
                                    <p class="inline">
                                        
                                        @if(!$product->custom_product_id)
                                        {{$product->name}}
                                       @else
                                        <a class="text-blue-500 underline hover:text-blue-600" href="{{route('customProductsShow', $product->custom_product_id)}}"> {{$product->name}} </a>
                                       @endif
                                    
                                    </p>
                                        
                                    </h1>

                            </div>
                                    

                            <div class="float-right">
                            
                                        <input form="form_delete" name="shopCategory" value="{{$shopCategory->id}}" type="hidden"/>
                                        <button form="form_delete" onclick="form_delete({{$list->id}},{{$product->id}})" class="py-1 px-3 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                            X
                                        </button>


                            </div>
                            </div>
                        @endforeach


                    @endif

                    </div>

          </div>




         

 
    <br/>

    <div class="flex items-center justify-center mt-4">

    

<x-button class="bg-green-500 ">
   <a form="form_update" type="submit" onclick="alert('Zaktualizowano listę!');" > {{ __('Zapisz') }} </a>
</x-button>

</form>

<form 
    @if(!$shopView)
        action="{{route('dashboard')}}"
    @else
        action="{{route('shopShow', $list->shop_id )}}"
    @endif
>   
<x-button class="ml-2">
    {{ __('Powrót') }}
</x-button>

</form>
      </div>


            {{-- <div class="grid justify-items-center">
                    <div>

                       <input form="form_update" value="Zapisz" type="submit" class="mr-1 py-1 px-3 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
              


                    </div>
                    <div>
                    </form>
                        <form action="{{route('dashboard')}}">    
                            <x-button class="flex text-center mt-4">
                                {{ __('Powrót') }}
                            </x-button>
                       </form>
                   </div>       
           </div> --}}

     </div>
        
    </div>

    <form action="" method="POST" id="form_delete" style="display:none">
        @csrf
        @method('DELETE')
       <input type=hidden/>
       </form>


    
</x-app-layout>


<script>


// var products = document.getElementsByClassName('product_checkbox');
// for (var i = 0; i < products.length; i++) {
//     if(products[i].checked == true) 
//     {
//         document.getElementsByClassName('product')[i].style.backgroundColor="#edffee";
//         document.getElementsByClassName('product')[i].style.opacity="0.7";

//     }
//     else 
//     {
//         document.getElementsByClassName('product')[i].style.opacity="1";
//         document.getElementsByClassName('product')[i].style.backgroundColor="white";
    
//     }

// }


function form_delete($id, $product_id) {

    var url = '/lists/'+$id+'/products/'+$product_id;
    document.getElementById("form_delete").action = url;
    document.getElementById("form_delete").submit();



}




</script>
