<div x-data="{tab: $persist('')}">
    <div class="hidden sm:block">
      <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
          <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
          
          <a href="#" x-on:click="tab = 'My Account'" :class="tab=='My Account' ? 'text-main border-main' : ''" class="border-transparent text-gray-700 hover:text-main hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
            
            <svg class=" -ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <span>My Account</span>
          </a>
         @if (auth()->user()->user_type_id == 1)
         
             @else
             <a href="#" x-on:click="tab = 'Barangay Account'" :class="tab=='Barangay Account' ? 'text-main border-main' : ''" class="border-transparent text-gray-700 hover:text-main hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
          
                <svg class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                  </svg>
                  <span>Barangay Accounts</span>
              </a>
         @endif
        </nav>
        
      </div>
    </div>
    <div x-cloak x-show="tab == 'My Account'" class="mt-5">
        <div class="p-5">
            <h1 class="text-xl text-main font-bold">MY ACCOUNT</h1>
            <div class="mt-3">
                <div class="mt-2 w-96">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">New Password</label>
                        <div class="mt-1">
                          <input type="password" wire:model="newpassword" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                        </div>
                      </div>
                </div>
                <div class="mt-2 w-96">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <div class="mt-1">
                          <input type="password" wire:model="confirmpassword" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                        </div>
                      </div>
                </div>
                <div class="mt-2 w-96">
                    <div>
                        <button wire:click="updatepassword({{auth()->user()->id}})" class="bg-main w-full py-2 rounded-md text-white">Save</button>
              
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div x-cloak x-show="tab == 'Barangay Account'" class="mt-5" x-data="{add: @entangle('addmodal'), edit: @entangle('editmodal')}">
        <div class="p-3">
            <div class="flex items-center space-x-3">
                <h1 class="text-xl font-bold text-main">BARANGAY ACCOUNTS</h1>

                <button @click="add = !add" class="bg-main p-2 flex items-center rounded-md justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                      </svg>
                </button>
            </div>

            <ul role="list" class="divide-y mt-2 divide-gray-200" >
                @forelse ($users as $key => $user)
                <li class="py-4 flex items-end">
                    <img class="h-10 w-10 rounded-full" src="{{asset('images/SCPMSLogo.png')}}" alt="">
                    <div class="ml-3">
                      <p class="text-sm font-bold text-main">{{$user->name}}</p>
                      <p class="text-sm text-gray-500">{{$user->email}}</p>
                    </div>
                    <div class="ml-3 flex space-x-2 text-sm">
                      <span wire:click="edit({{$user->id}})" class="text-green-600 cursor-pointer">edit</span>
                      <span wire:click="delete({{$user->id}})" class="text-red-600 cursor-pointer">delete</span>
                    </div>
                  </li>
                @empty
                    
                @endforelse
              

                  <!-- This example requires Tailwind CSS v2.0+ -->
<div x-show="add" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="add" x-cloak class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
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
      <div x-show="add" x-cloak class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
        <div>
        <div class="flex justify-between">
            <h1 class="font-bold text-gray-600">Add Account</h1>
            <button @click="add = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
            </button>
        </div>
        <div class="mt-2">
            <div>
                <label for="email"  class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                  <input type="text" wire:model="name" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
        </div>
        <div class="mt-2">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                  <input type="email" wire:model="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                </div>
              </div>
        </div>
        <div class="mt-2">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                  <input type="password" wire:model="password" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                </div>
              </div>
        </div>
        <div class="mt-2">
            <label for="location" class="block text-sm font-medium text-gray-700">Barangay</label>
            <select id="location" name="location" wire:model="barangay_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option >Select Barangay</option>
              @foreach ($barangays as $item)
              <option value="{{$item->id}}">{{$item->barangay_name}}</option>
              @endforeach
            </select>
          </div>
        <div class="mt-2">
            <div>
                <button wire:click="adduser" class="bg-main w-full py-2 rounded-md text-white">Save</button>
              </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
  
                  <!-- This example requires Tailwind CSS v2.0+ -->
<div x-show="edit" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="edit" x-cloak class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
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
      <div x-show="edit" x-cloak class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
        <div>
        <div class="flex justify-between">
            <h1 class="font-bold text-gray-600">Update Account</h1>
            <button @click="edit = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
            </button>
        </div>
        <div class="mt-2">
            <div>
                <label for="email"  class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                  <input type="text" wire:model="name" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
        </div>
        <div class="mt-2">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                  <input type="email" wire:model="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                </div>
              </div>
        </div>
        <div class="mt-2">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                  <input type="password" wire:model="password" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" >
                </div>
              </div>
        </div>
        <div class="mt-2">
            <label for="location" class="block text-sm font-medium text-gray-700">Barangay</label>
            <select id="location" name="location" wire:model="barangay_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option >Select Barangay</option>
              @foreach ($barangays as $item)
              <option value="{{$item->id}}">{{$item->barangay_name}}</option>
              @endforeach
            </select>
          </div>
        <div class="mt-2">
            <div>
                <button wire:click="updateuser" class="bg-main w-full py-2 rounded-md text-white">Save</button>
              </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
  

              </ul>
        </div>
    </div>
  </div>