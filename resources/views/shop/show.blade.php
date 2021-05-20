<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sklep: "{{$shop->name}}"
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">
   

              <form class="float-right" style="margin:0px; padding:0px; display:inline;" action="{{route('shop_categoryIndex', $shop->id)}}" method="GET">
                    @csrf
                    @method('GET')
                        <button 
                        class="py-1 px-3 rounded bg-gray-300 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                            Ustawienia sklepu
                        </button>
                </form>  

                <br/>
               


                <div class="pt-3"> Przypisane listy do sklepu:</div>

                @if ($shop->lists->isEmpty())
                
                <div class="p-6 width-100 bg-white border-b border-gray-200">
                    Brak list!
                </div>
                @endif

                @foreach ($shop->lists as $list)
                    <div class="clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                        <div class="float-left">
                            <h1 class="text-lg">
                                <a class="hover:text-blue-700" href = "{{route('listShow', $list->id)}}">
                                    @if (is_null($list->name))
                                    {{ __('<brak nazwy>') }}
                                    @else
                                        {{$list->name}}
                                    @endif
                                </a>
                                
                            </h1>
                            <p class="text-xs text-gray-400	">{{$list->created_at}}</p>
                     </div>

                      <div class="float-right">
                        

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listDuplicate', $list->id)}}" method="POST">
                            @csrf
                            @method('POST')
                                <button 
                                class="py-1 px-3 rounded bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Duplikuj
                                </button>
                        </form>

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listEditView', $list->id)}}" method="POST">
                            @csrf
                            @method('GET')
                                <button 
                                class="py-1 px-3 rounded bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Edytuj
                                </button>
                        </form>  

                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('listDelete', $list->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button onclick="return confirm('Potwierdź usunięcie listy')" 
                                class="py-1 px-3 rounded bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    Usuń
                                </button>
                        </form>
                     </div>
                    </div>

                @endforeach
             

            </div>

            <div class="grid justify-items-center">
                    <div>
                        <form action="{{route('shopsIndex')}}">    
                            <x-button class="flex text-center mt-4">
                                {{ __('Powrót') }}
                            </x-button>
                       </form>
                   </div>       
           </div>

        
        
    </div>

    
</x-app-layout>
