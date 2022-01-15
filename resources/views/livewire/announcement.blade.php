<div class="mt-2" x-data="{add:false}">
    <div wire:loading wire:target="save" class="fixed top-0 left-0 w-full h-full bg-gray-700 z-50 bg-opacity-30"></div>
    <div class="flex space-x-2 items-center mb-3">
        <h1 class="font-bold text-gray-700">Add Announcement</h1>
        <button @click="add = !add" class="bg-main rounded-md shadow-sm text-white p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
              </svg>
        </button>
    </div>
    <ul wire:poll role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @forelse ($announces as $announce)
        <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
            <div class="w-full flex items-center justify-between p-6 space-x-6">
              <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                  <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{$announce->user->usertype->type}}</span>
                </div>
                <p class="mt-1 text-gray-500 text-sm truncate">{{$announce->title}}</p>
              </div>
              <img class="w-10 h-10   flex-shrink-0" src="{{asset('images/SCPMSLogo.png')}}" alt="">
            </div>
            
          </li>
        @empty
            
        @endforelse
      
        <!-- More people... -->
      </ul>
        {{-- add --}}
        <div x-show="add" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
              <!--
                Background overlay, show/hide based on modal state.
          
                Entering: "ease-out duration-300"
                  From: "opacity-0"
                  To: "opacity-100"
                Leaving: "ease-in duration-200"
                  From: "opacity-100"
                  To: "opacity-0"
              -->
              <div x-show="add"
              x-cloak
              x-transition:enter="ease-out duration-300"
              x-transition:enter-start="opacity-0 "
              x-transition:enter-end="opacity-100"
              x-transition:leave="ease-in duration-200"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
          
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
              <div x-show="add" x-cloak 
              x-transition:enter="ease-out duration-300"
              x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
              x-transition:leave="ease-in duration-200"
              x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
              x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                  <button @click="add = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">Close</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
                <div class=" mt-5 p-2">
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700">Title</label>
                        <div class="mt-1">
                          <input type="text" wire:model="title"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter title...">
                        </div>
                      </div>
                    <div class="mt-1 mb-1">
                        <label for="email" class="block text-sm font-bold text-gray-700">Content</label>
                        <div class="mt-1">
                            <textarea rows="4" wire:model="content" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                      </div>
                      <div>
                        <label for="location" class="block text-sm font-bold text-gray-700">Type</label>
                        <select id="location" wire:model="type" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                       
                          <option selected>Select Type</option>
                          <option value="News">News</option>
                          <option value="News">Announcements</option>
                        </select>
                      </div>

                      <div class="flex mt-4">
                        <button wire:click="save" class="bg-main flex-1 p-1 rounded-md shadow-md text-white">Save</button>
                    </div>
                        </div>

                        
                      </div>
                </div>
              
              </div>
            </div>
          </div>
          {{-- endadd --}}
</div>