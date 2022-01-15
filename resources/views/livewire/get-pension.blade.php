<div x-data="{search:false, open:@entangle('applymodal'), confirm:@entangle('confirmmodal')}" @click.away="search= false">
   <div class=" mt-5">
       <div class="flex">
       <div class="flex border px-2 items-center border-gray-400 rounded-l-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
            <input wire:model="search" type="text" class="focus:outline-none focus:ring-0 border-0" placeholder="Search your name...">
       </div>
       <button @click="search = !search"   class="bg-main px-2 text-white rounded-r-lg hover:text-gray-200">Search</button>
       </div>
       <div x-show="search" x-cloak x-collapse @click.away="search = false" class="absolute  z-50 w-80 ml-2 mt-1 bg-white rounded-md shadow">
        <ul role="list"  class="divide-y relative inset-0 z-50 divide-gray-200">
            @forelse ($members as $item)
            <li wire:click="select('{{$item->id}}')" @click="search = false" class="py-4 flex px-1 hover:font-bold z-50 hover:text-main cursor-pointer text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 " viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                  </svg>
              <div class="ml-3">
                <p class="text-sm  ">{{$item->senior->firstname}} {{$item->senior->lastname}}</p>
                <p class="text-sm items-center flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                    <span>{{$item->senior->barangay->barangay_name}}</span></p>
              </div>
            </li>
            @empty
            <li class="py-4 flex px-1 hover:font-bold  cursor-pointer text-red-400">
               No {{$search}} found...
            </li>
            @endforelse
          </ul>
       </div>
   </div>

   <div class="mt-5  z-0 relative ">
    
        <div class="flex items-center justify-center">
            <img wire:loading wire:target="select" src="{{asset('images/SCPMSLogo.png')}}" class="animate animate-bounce" alt="">
        </div>
       
    </div>
      

  <div x-show="open" x-cloak  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div x-show="open"
      x-cloak
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 "
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
      <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div x-show="open"
      x-cloak 
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
        <div>
          
          <div class="mt-3 sm:mt-5">
            <h3 class="text-lg leading-6 font-bold text-gray-700" id="modal-title">
                Upload Requirements for {{$fullname}}
            </h3>
            <div class="flex flex-col space-x-1 text-sm">
                <span>*1x1 ID Photo/Picture -4pcs</span>
                <input type="file" multiple wire:model="pension_id" name="" id="">
                @error('pension_id') <span
                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                <span>*OSCA ID</span>
                <input type="file" multiple wire:model="pension_oscaid" name="" id="">
                @error('pension_oscaid') <span
                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                <span>*Voter's Certification from COMELEC</span>
                <input type="file" multiple wire:model="pension_voter" name="" id="">
                @error('pension_voter') <span
                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                <span>*Birth Certificate  or Birth Certificate of Children</span>
                <input type="file" multiple wire:model="pension_birthcert" name="" id="">
                @error('pension_birthcert') <span
                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                <span>*Barangay Certificate for Indigency</span>
                <input type="file" multiple wire:model="pension_barangaycert" name="" id="">
                @error('pension_barangaycert') <span
                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                
            </div>
           
          </div>
        </div>
        <div class="mt-3 flex justify-end space-x-2 sm:mt-6">
          <button @click="open = false" type="button" class=" rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
            Cancel
          </button>
          <button wire:click="upload" type="button" class=" rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
            Upload and Apply
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- endupload --}}


  <div x-show="confirm" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="confirm" x-cloak class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div  class="fixed inset-0 bg-main bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
      <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div x-show="confirm" x-cloak class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
        <div>
        <div class="flex justify-between">
            <h1 class="font-bold text-gray-600">Confirmation Code</h1>
            <button @click="confirm = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
            </button>
        </div>
        <div class="mt-2">
            <div>
                <label for="email"  class="block text-sm font-medium text-gray-700">Enter Code</label>
                <div class="mt-1">
                  <input type="text" wire:model="confirmcode" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
        </div>
     
        <div class="mt-2">
            <div>
                <button wire:click="confirm" class="bg-main w-full py-2 rounded-md text-white">Confirm</button>
              </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>


   </div>

