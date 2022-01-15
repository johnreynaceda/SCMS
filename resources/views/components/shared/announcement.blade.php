<div>
    <ul role="list" class="divide-y divide-gray-200">
       @forelse ($announces as $announce)
       <li class="p-2 rounded-xl mb-1 bg-white">
        <div class="flex space-x-3">
          <img class="h-6 w-6 rounded-full" src="{{asset('images/SCPMSLogo.png')}}" alt="">
          <div class="flex-1 space-y-1">
            <div class="flex items-center justify-between">
              <h3 class="text-sm font-medium">{{$announce->title}}</h3>
              <p class="text-sm text-gray-500">{{$announce->created_at->format('m-d-Y')}}</p>
            </div>
            <p class="text-sm text-gray-500">{{$announce->content}}</p>
          </div>
        </div>
      </li>
       @empty
           
       @endforelse
       
    
        <!-- More items... -->
      </ul>
</div>