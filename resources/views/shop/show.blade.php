<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sklep: "{{$shop->name}}"
        </h2>
    </x-slot>

    <div class="py-8">
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



               
            <!-- Dodawanie listy -->
            <div class="flex justify-end">
                <form method="POST" action="{{route('listCreate')}}">
                @csrf 
                    <input type="hidden" name="shop_id" value="{{$shop->id}}"/>
                    <input id="name" autofocus name="name" placeholder="Dodaj listę ..." class="py-1 border border-transparent focus:outline-none focus:ring-2 ">
                    <input value="+" type="submit" class="mr-1 py-1 px-3 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">

                </form>
            </div>

                <div class="pl-2 pt-3"> Przypisane listy do sklepu:</div>

                @if ($shop->lists->isEmpty())
                
                <div class="p-6 width-100 bg-white border-b border-gray-200">
                    Brak list!
                </div>
                @endif

                @foreach ($shop->lists->sortByDesc('created_at') as $list)
                    <div class="clearfix h-36 sm:h-24 p-4 width-100 bg-white border-b border-gray-200">
                        <div class="float-left">
                            <h1 class="text-lg">
                                <form action="{{route('listShow', $list->id)}}" method="GET">
                                    <input type="hidden" name="shopView" value="true"/>
                                    <button type="submit" class="focus:outline-none hover:text-blue-700">
                                        @if (is_null($list->name))
                                        {{ __('<brak nazwy>') }}
                                        @else
                                            {{$list->name}}
                                        @endif
                                        </button>
                                </form>
                            </h1>
                            <p class="text-xs text-gray-400	">Data utworzenia: {{$list->created_at}}</p>
                            <p class="text-xs text-gray-400	">Zaznaczone produkty: 
                                @if(count($list->products)) 
                                    {{count($list->products->where('ticked'))}}/{{count($list->products)}} 
                                @else
                                    - / -
                                @endif
                            </p>
                     </div>

                      <div class="py-3 float-right">
                        

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listDuplicate', $list->id)}}" method="POST">
                            @csrf
                            @method('POST')
                                <input type="hidden" name="shop_id" value="{{$shop->id}}"/>
                                <button 
                                class="py-1 px-3 rounded bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Duplikuj
                                </button>
                        </form>

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listEditView', $list->id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="shop_id" value="{{$shop->id}}"/>
                                <button 
                                class="py-1 px-3 rounded bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Edytuj
                                </button>
                        </form>  

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listDelete', $list->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <input type="hidden" name="shop_id" value="{{$shop->id}}"/>
                                <button onclick="return confirm('Potwierdź usunięcie listy')" 
                                class="py-1 px-3 rounded bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Usuń
                                </button>
                        </form>
                     </div>
                    </div>

                @endforeach
             

            </div>


            <div class="flex items-center justify-center mt-4">
                 
              <form action="{{route('shop_categoryIndex', $shop->id)}}" method="GET"> 
                <x-button type="submit" class="flex text-center mt-4 bg-yellow-500 hover:bg-yellow-600">
                    {{ __('Konfiguruj kategorie') }}
                </x-button>

              </form>

              <form action="{{route('shopsIndex')}}">    
              <x-button class="ml-2 flex text-center mt-4">
                  {{ __('Powrót') }}
              </x-button>
            </form>
        </div>



        
        
    </div>

    
</x-app-layout>
