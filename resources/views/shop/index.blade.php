<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Twoje sklepy') }}
        </h2>
    </x-slot>



    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

            <!-- Dodawanie sklepu -->
            <div class="pb-5 flex justify-end">
                <form method="POST" action="{{route('shopCreate')}}">
                @csrf 

                    <input id="name" autofocus required name="name" placeholder="Dodaj sklep ..." class="py-1 border border-transparent focus:outline-none focus:ring-2 ">
                    <input value="+" type="submit" class="py-1 px-3 bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">

                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    
         <!-- Generowanie dostępnych sklepów użytkownika  -->
                @if ($shops->isEmpty())
                
                <div class="p-6 width-100 bg-white border-b border-gray-200">
                    Brak zdefiniowanych sklepów
                </div>
                @endif

                @foreach ($shops as $shop)
                    
                    <div class="clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                        <div class="float-left">
                            <h1 class="text-lg">
                                <a class="hover:text-blue-700" href = "{{route('shopShow', $shop->id)}}">
                                      {{$shop->name}}
                                </a>
                                
                            </h1>
                            <p class="text-xs text-gray-400	">Ilość podpiętych list: {{$shop->lists->count()}}</p>
                     </div>

                      <div class="float-right">
                        <form style="margin:0px; padding:0px; display:inline;" action="{{route('shopDelete', $shop->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button onclick="return confirm('Potwierdź usunięcie sklepu')" 
                                class="py-1 px-3 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                    X
                                </button>
                        </form>
                     </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
