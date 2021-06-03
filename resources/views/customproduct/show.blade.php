<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            Produkt: "{{$customProduct->name}}"
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



              
                <div class="p-6 width-100 bg-white border-b border-gray-200">
                    @if(!$customProduct->filepath) dupa @endif
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
