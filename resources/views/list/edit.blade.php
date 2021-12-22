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

                      @if($shops)
                        @foreach($shops as $shop)
                          <option @if($list->shop_id == $shop->id) {{$temp=1}} selected @endif value="{{$shop->id}}">{{$shop->name}}</option>
                        @endforeach 
                      @endif

                        @if(!$shops)
                         <option value="">Brak dodanych sklepów</option>
                    
                         <script>
                            document.getElementById('select_shops').disabled="true";
                         </script>   
                    
                         @else

                         <option class="text-red-500" value="" @if(!isset($temp)) selected @endif>[Brak przypisania]</option>

                         @endif
                      </select>


              <!--share -->
                </div>
              </div>
              <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Udostępnij: &nbsp; <input id="share" name="share" @if($list->share_key) checked @endif type="checkbox"/>
                  </label>
                </div>
                <div class="md:w-2/3">
                  @if($list->share_key)
                  <input id="shareUrl" class="inline" type="text" value="{{route('listSharedView', $list->share_key)}}" readonly="readonly"  class="appearance-none inline rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" />
                  <button type="button" id="getShareUrl"  onclick="getURL()" class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded inline">Kopiuj</button>
                  @endif
                </div>
              </div>


              <div class="flex items-center justify-center mt-4">
                 

                <x-button type="submit" class="flex text-center mt-4 bg-yellow-500 hover:bg-yellow-600">
                    {{ __('Edytuj') }}
                </x-button>

              </form>

            <form action="{{route('listShow', $list->id)}}">    
              <button onclick="window.location='{{ URL::previous() }}'"> 
              <x-button class="ml-2 flex text-center mt-4">
                  {{ __('Powrót') }}
              </x-button>
            </button>
            </form>

</div>


{{-- 


              <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                  <button type="submit" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Edytuj listę
                  </button>

                    <button class="shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    <a href="{{route('listShow',$list->id)}}">Powrót</a>
                    </button>

                </div>
              </div> --}}
        {{-- </form> --}}

      </div>


    
</x-app-layout>


<script>

document.getElementById('message').style.visibility="hidden";

function getURL() {
  /* Get the text field */
  var copyText = document.getElementById("shareUrl");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  document.getElementById('getShareUrl').style.backgroundColor="darkgreen";

  setTimeout(function(){  document.getElementById('getShareUrl').style.backgroundColor="";}, 500);


}


</script>