<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Konfiguracja kategorii (dla sklepu: "{{$shop->name}}")
 
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



              <form action="" method="POST" name="form1" style="display:none">
                 @csrf
                <input type=hidden/>
                </form>
            
            <!-- Dodawanie kategorii -->
            <div class="pb-5 flex justify-end">
                <form method="POST" action="{{route('shop_categoryCreate', $shop->id)}}">
                @csrf 

                    <input id="name" autofocus required name="name" placeholder="Dodaj kategorię ..." class="py-1 border border-transparent focus:outline-none focus:ring-2 ">
                    <input value="+" type="submit" class="py-1 px-3 bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                    
                </form>
                <button class="py-1 ml-1 px-2 bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer" onclick="getOrder()">Zapisz kolejność</button>

            </div>

            <div class="container max-w-7xl mx-auto ">

                @foreach ($shopCategories->sortBy('order_position') as $shopCategory)
                     
                    <div id="{{$shopCategory->id}}" class="draggable" draggable="true">
                        <div class="clearfix h-24 p-6 width-100 bg-white border-b border-gray-200">
                            <div class="float-left">
                                <h1 class="text-lg">
                                   {{$shopCategory->name}}
                                    
                                </h1>

                        </div>
                
                        <div class="float-right">
                         
                            <form style="margin:0px; padding:0px; display:inline;" action="{{route('shop_categoryDelete', [$shop->id, $shopCategory->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button onclick="return confirm('Potwierdź usunięcie kategorii')" 
                                    class="py-1 px-3 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 cursor-pointer">
                                        X
                                    </button>
                            </form>

                        </div>
                        </div>

                    </div>

                @endforeach
          </div>






    </div>
        
</div>


</x-app-layout>


<script>
    const draggables = document.querySelectorAll('.draggable')
    const containers = document.querySelectorAll('.container')
    
    draggables.forEach(draggable => {
      draggable.addEventListener('dragstart', () => {
        draggable.classList.add('dragging')
      })
    
      draggable.addEventListener('dragend', () => {
        draggable.classList.remove('dragging')
      })
    })
    
    containers.forEach(container => {
      container.addEventListener('dragover', e => {
        e.preventDefault()
        const afterElement = getDragAfterElement(container, e.clientY)
        const draggable = document.querySelector('.dragging')
        if (afterElement == null) {
          container.appendChild(draggable)
        } else {
          container.insertBefore(draggable, afterElement)
        }
      })
    })
    
    function getDragAfterElement(container, y) {
      const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')]
    
      return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect()
        const offset = y - box.top - box.height / 2
        if (offset < 0 && offset > closest.offset) {
          return { offset: offset, element: child }
        } else {
          return closest
        }
      }, { offset: Number.NEGATIVE_INFINITY }).element
    }
    

    
function getOrder() {
    var elements = document.getElementsByClassName('draggable');
    var arr = [];

    for(var i = 0; i< elements.length; i++) {
        arr[i] = elements[i].id;
    }


//axios w przyszlosci

    if(!arr.length) window.location("/shops/"+{{$shop->id}}+"/categories/");

    var url = "/shops/"+{{$shop->id}}+"/categories/updatePosition/"+arr.toString();
    document.form1.action=url;
    document.form1.submit();  
   
}

</script>

<style>
  
.draggable.dragging {
  opacity: .3;

}
</style>
