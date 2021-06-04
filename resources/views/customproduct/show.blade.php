<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Produkt: "{{$customProduct->name}}" 
        </h2>

    </x-slot>

    <div class="py-4">

    <div class="max-w-7xl mx-auto sm:px-8 lg:px-8">


        <form style="margin:0px; padding:0px; display:inline;" action="{{route('customProductsEditView', $customProduct->id)}}" method="POST">
            @csrf
            @method('GET')
                <button 
                class="py-1 px-3 rounded bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                    Edytuj
                </button>
        </form>  

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


            <div class="grid justify-items-center">

                <div class="overflow-hidden border w-full lg:w-8/12 md:w-11/12 bg-white mx-3 md:mx-0 lg:mx-0">
                    @if($customProduct->img_filepath)
                    <img class="w-full h-50 bg-cover" src="/storage/{{$customProduct->img_filepath}}">
                    @else
                      <img class="w-full h-50 bg-cover" src="https://via.placeholder.com/1024x768.png?text=Brak+zdjecia">
                    @endif
                    
                    <div class="px-3 pb-2">
                     <div class="text-center pt-2">
                            <span class="text-lg font-medium">{{$customProduct->name}}</span>
                     </div>
                    <div class="pt-1">
                        <span class="text-sm text-gray-400 font-medium">Opis:</span>
                    </div>
                    
                    <div class="pt-1">
                        <div class="mb-2 text-sm text-justify	">
                        {{$customProduct->description ?? 'brak' }}
                        </div>
                    </div>

                    </div>
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
