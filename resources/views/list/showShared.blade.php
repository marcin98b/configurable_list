<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(is_null($list->name))
            Udostępniona Lista: &lt;nienazwana&gt;
            <p class="text-gray-400 text-base">
                autor: {{$list->user->name}}
            </p>
            @else
            Udostępniona Lista: "{{$list->name}}"
            <p class="text-gray-400 text-base">
            autor: {{$list->user->name}}
            </p>
            @endif
        </h2>
        

    </x-slot>


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
                <form method="POST" action="{{route('listCreateShared', $list->share_key)}}">
                  @csrf      
                  
                  @if(Auth::user()->shops->count())
                  <label for="shop_id">Sklep:</label>
                  <select class="select py-1 mx-1 border border-transparent focus:outline-none focus:ring-2 " style="height:20" name="shop_id">
                     
                    @foreach (Auth::user()->shops as $shop)
                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach    
                    <option value="notAssigned">[Brak sklepu]</option>    
                        </select>
                  @else
                  <input type="hidden" name="shop_id" value="notAssigned"/>

                        
                 @endif                 
                
                  <input value="Dodaj do swojego konta" type="submit" class="py-1 px-3 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                </form>       
            </div>

            <div class="container max-w-7xl mx-auto ">



                     
                    <div id="products" >

                    @if(!$list->shop_id || $list->shop->shopCategories->isEmpty())    
                   

                    @if(count($list->products)) <div class="pb-1 text-center bg-blue-200">Nieskategoryzowane</div> @endif

                        @foreach($list->products as $product)

                        <div class="product clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                            <div class="float-left">
                                

                                <h1 class="text-lg">
                                  <p class="inline">{{$product->name}}</p>
                                    
                                </h1>

                        </div>
                                

                        </div>

                        @endforeach
                
                    @else

    
                        @foreach($list->shop->shopCategories->sortBy('order_position') as $shopCategory)

                        @if(count($list->products->where('shop_category_id', $shopCategory->id))) <div class="pb-1 text-center bg-blue-200">  {{$shopCategory->name}} </div> @endif 

                            @foreach($shopCategory->products as $product)

                                @if($list->id == $product->list_id)

                                <div class="product clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                                    <div class="float-left">
                                        

                                        <h1 class="text-lg">
                                          
                                        <p class="inline">{{$product->name}}</p>
                                            
                                        </h1>

                                </div>
                                        

                                </div>

                                @endif

                            @endforeach



                        @endforeach                    

                
                        <!-- nieskategoryzowane -->
                        @if(count($list->products->where('shop_category_id', null))) <div class="pb-1 text-center bg-blue-200">Nieskategoryzowane</div> @endif    

                        @foreach($list->products->where('shop_category_id', null) as $product)
                
                            <div class="product clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                                <div class="float-left">
                                    

                                    <h1 class="text-lg">
                                      
                                    <p class="inline">{{$product->name}}</p>
                                        
                                    </h1>

                            </div>
                                    


                            </div>
                        @endforeach


                    @endif
                       </form>
                    </div>

          </div>




         

 
    <br/>

     

            
            <div class="grid justify-items-center">
                    <div>
                        <form action="{{route('dashboard')}}">    
                            <x-button class="flex text-center mt-4">
                                {{ __('Powrót') }}
                            </x-button>
                       </form>
                   </div>       
           </div>

     </div>
        
    </div>



    
</x-app-layout>

