<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(is_null($list->name))
            Edycja listy: &lt;nienawana&gt; (z dnia: {{$list->created_at}})
            @else
            Edycja listy: "{{$list->name}}"
            @endif
        </h2>
    </x-slot>


    <div class="mx-auto w-full pt-5 max-w-lg">

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action ="{{route('listEdit', $list->id)}}" class="w-full w-100">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-name">
                    Nazwa listy:
                  </label>
                </div>
                <div class="md:w-2/3">
                  <input class="appearance-none rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" value="{{$list->name}}" placeholder="Lista nienazwana" id="inline-name" name="name" type="text">
                </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Przypisany sklep:
                  </label>
                </div>
                <div class="md:w-2/3">
                    <select id="select_shops" name="shop_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                      @foreach($shops as $shop)
                        <option @if($list->shop_id == $shop->id) selected @endif value="{{$shop->id}}">{{$shop->name}}</option>
                      @endforeach 


                        @if($shops->isEmpty())
                         <option value="">Brak dodanych sklepów</option>
                    
                         <script>
                            document.getElementById('select_shops').disabled="true";
                         </script>   
                    
                         @else

                         <option class="text-red-500" value="">[Brak przypisania]</option>

                         @endif
                      </select>


                </div>
              </div>

              <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                  <button type="submit" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Edytuj listę
                  </button>
                </div>
              </div>
        </form>

      </div>
    
    
    
</x-app-layout>
