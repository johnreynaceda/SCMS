<div x-data="{view: @entangle('viewmember'), confirm: @entangle('confirmmodal'), uploads: false, attachments: '', oscaid: false}">
    <div wire:loading class="fixed top-0 left-0 cursor-wait w-full h-full bg-main opacity-10 z-50">
    </div>
    <div x-show="view" x-cloak class="fixed inset-0 z-50  overflow-hidden" aria-labelledby="slide-over-title" role="dialog"
        aria-modal="true">
        <div class="absolute inset-0  overflow-hidden">
            <!-- Background overlay, show/hide based on slide-over state. -->
            <div class="absolute bg-main bg-opacity-20 inset-0" aria-hidden="true">
                <div x-show="view" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                    class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
                    <!--
          Slide-over panel, show/hide based on slide-over state.

          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
                    <div class="w-screen max-w-lg z-50">
                        <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                            <div class="px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-bold text-gray-700" id="slide-over-title">
                                        MANAGE
                                    </h2>
                                    <div class="ml-3 h-7 flex items-center">
                                        <button type="button" @click="view = false"
                                            class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Main -->
                            <div class="divide-y divide-gray-200">
                                <div class="pb-6">
                                    <div class="bg-gradient-to-b from-main to-indigo-500 h-24 sm:h-20 lg:h-28"></div>
                                    <div class="-mt-12 flow-root px-4 sm:-mt-8 sm:flex sm:items-end sm:px-6 lg:-mt-15">
                                        <div>
                                            <div class="-m-1 flex">
                                                <div
                                                    class="inline-flex rounded-lg overflow-hidden border-4 border-white">
                                                    <img class="flex-shrink-0 h-24 w-24 sm:h-40 sm:w-40 bg-main lg:w-48 lg:h-48"
                                                        src="{{ asset('images/SCPMSLogo.png') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-6 sm:ml-6 sm:flex-1">
                                            <div>
                                                <div class="flex items-center">
                                                    <h3 class="font-bold text-xl text-gray-900 sm:text-2xl">

                                                        {{ $fullname }}
                                                    </h3>

                                                </div>
                                                <p class="text-sm text-gray-500">{{ $contact }}</p>
                                            </div>
                                            <div class="mt-5 flex justify-end space-y-3 sm:space-y-0 sm:space-x-3">

                                                <span class="ml-3 inline-flex sm:ml-0" x-data="{action:false}">
                                                    <div class="relative inline-block text-left">
                                                        <button type="button" @click="action = !action"
                                                            class="inline-flex items-center p-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-400 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            id="options-menu-button" aria-expanded="false"
                                                            aria-haspopup="true">
                                                            <span class="sr-only">Open options menu</span>
                                                            <!-- Heroicon name: solid/dots-vertical -->
                                                            <svg class="h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path
                                                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                            </svg>
                                                        </button>

                                                        <!--
                            Dropdown panel, show/hide based on dropdown state.

                            Entering: "transition ease-out duration-100"
                              From: "transform opacity-0 scale-95"
                              To: "transform opacity-100 scale-100"
                            Leaving: "transition ease-in duration-75"
                              From: "transform opacity-100 scale-100"
                              To: "transform opacity-0 scale-95"
                          -->
                                                        <div x-show="action" x-cloak x-collapse
                                                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white  ring-opacity-5 focus:outline-none"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="options-menu-button" tabindex="-1">
                                                            <div class="py-1" role="none">

                                                                <a href="#"
                                                                    class="text-gray-700 block px-4 py-2 text-sm"
                                                                    role="menuitem" tabindex="-1"
                                                                    id="options-menu-item-1">Delete</a>
                                                                <a href="#" @click="uploads = true"
                                                                    class="text-gray-700 block px-4 py-2 text-sm"
                                                                    role="menuitem" tabindex="-1"
                                                                    id="options-menu-item-1">View Uploads</a>
                                                                <a href="#" @click="oscaid = true"
                                                                    class="text-gray-700 block px-4 py-2 text-sm"
                                                                    role="menuitem" tabindex="-1"
                                                                    id="options-menu-item-1">OSCA ID</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-5 sm:px-0 sm:py-0" x-data="{pension: false}">
                                    <div class="flex p-2 items-center space-x-2">
                                        <h1>PENSION</h1>
                                        <svg xmlns="http://www.w3.org/2000/svg" @click="pension = !pension"
                                            class="h-5 w-5 text-main cursor-pointer hover:text-green-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <div x-show="pension" x-cloak x-collapse class="border  p-2">
                                        <div class="flex justify-center ">
                                            <input wire:model.lazy="amount"
                                                class="border-gray-400 rounded-l-lg focus:ring-main h-9"
                                                placeholder="Pension Amount" type="text">
                                            {{-- <input wire:model.lazy="issued"
                                                class="border-gray-400 rounded-r-lg focus:ring-main h-9"
                                                placeholder="Date Issued" type="date"> --}}
                                                <input wire:ignore wire:key="datepicker" x-data="{}" x-ref="datepicker" x-init="
                                                flatpickr($refs.datepicker, { 'disable': [
                                                    function(date) {
                                                        
                                                    }
                                                ],});
                                            " type="date" wire:model='issued'
                                            class="border-gray-400 rounded-r-lg focus:ring-main h-9"
"
                                            placeholder="{{ Carbon\Carbon::today()->format('m-d-y') }}">
                                        </div>
                                        <div class="flex mt-1 justify-center">
                                            <button wire:click="apply"
                                                class="bg-green-500 rounded-full hover:text-gray-700 px-8 text-white">Apply</button>
                                        </div>
                                    </div>

                                    <div class="mt-2 px-2">
                                        <div class="flex flex-col">
                                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                    <div
                                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead class="bg-main text-white">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                                                                        Amount
                                                                    </th>
                                                                    <th scope="col"
                                                                        class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                                                                        Date Issued
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Odd row -->
                                                                @forelse ($pensions as $item)
                                                                    <tr class="bg-white">
                                                                        <td
                                                                            class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                            &#8369;{{ $item->amount }}
                                                                        </td>
                                                                        <td
                                                                            class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                                                                            {{ $item->date_issued }}
                                                                        </td>

                                                                    </tr>

                                                                @empty
                                                                    <tr class="bg-white">
                                                                        <td colspan="2"
                                                                            class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                            No pension
                                                                        </td>


                                                                    </tr>
                                                                @endforelse


                                                                <!-- More people... -->
                                                            </tbody>

                                                        </table>

                                                    </div>
                                                    <div class="mt-2 mb-5">
                                                        {{ $pensions->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <div class="mt-3 flex justify-end mb-2">
      <div class="flex justify-end">
        <div class="border rounded-md flex items-center">
          <div class="bg-main text-white rounded-l-md flex items-center h-full px-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
            </svg>
          </div>
          <select name="" wire:model="filter" id="" class="h-9 focus:outline-none focus:ring-0 border-0">
            <option value="0">Not Applied for Pension</option>
            <option value="1">Applied for Pension</option>
          </select>
        </div>
      </div>
       
    </div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
            @forelse ($members as $item)
                <li>
                    <a href="#" wire:click="manage({{ $item->senior_citizen_id }})" class="block hover:bg-gray-50">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="min-w-0 flex-1 flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <p class="text-sm  text-gray-700 font-bold truncate">
                                            {{ $item->senior->lastname }}, {{ $item->senior->firstname }}
                                            {{ $item->senior->middlename[0] }}.
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                            <!-- Heroicon name: solid/mail -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                            </svg>
                                            <span class="truncate">{{ $item->senior->contact }}</span>
                                        </p>
                                    </div>
                                    <div class="hidden md:block">
                                        <div>
                                            <p class="text-sm text-gray-900">
                                                @if ($item->applyStatus == 0)
                                                    <span class="bg-gray-300 px-2 rounded-full shadow text-red-500">Not Applied for Pension</span>

                                                 @else 
                                                 <span class="bg-green-600 text-white px-2 rounded-full"> Applied for Pension</span>
                                                @endif  
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                <!-- Heroicon name: solid/check-circle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                {{ $item->senior->barangay->barangay_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li>
                    <a href="#" wire:click="manage" class="block hover:bg-gray-50">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <span>No member available...</span>
                        </div>
                    </a>
                </li>
            @endforelse


        </ul>

    </div>
    <div class="mt-3 text-main">
        {{-- {{ $members->links() }} --}}
    </div>

     {{-- upload --}}
     <div x-show="uploads" x-cloak class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
          <div x-show="uploads"
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
          <div x-show="uploads" x-cloak 
          x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
              <button @click="uploads = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class=" mt-5 p-4">
                <h1 class="font-bold text-lg text-gray-700">Uploaded Requirements </h1>
             <div class="mt-2">
                <div class="bg-white shadow overflow-hidden sm:rounded-md" >
                    <ul role="list" class="divide-y divide-gray-200">
                      <li @click="attachments = 'member'" class="cursor-pointer">
                        <div class="block hover:bg-gray-50">
                          <div class="flex justify-between px-4 py-4 sm:px-6">
                            <div>Membership Requirements</div>
                            <div>
                              <!-- Heroicon name: solid/chevron-right -->
                              <svg x-bind:class="attachments == 'member' ? 'rotate-90' : ''" class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                            </div>
                          </div>
                        </div>
                        <div x-show="attachments=='member'" x-cloak x-collapse  class="mt-2 border-t ">
                            <ul role="list" class="px-2 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                              @forelse (\App\Models\Attachment::where('senior_citizen_id', $this->memberid)->where('type', 'member')->get() as $item)
                 
                              <iframe src="https://drive.google.com/file/d/{{$item->file_id}}/preview?embedded=true" frameborder="0" class="h-20 w-40 bg-blue-400"></iframe>
                              @empty
                                  
                              @endforelse
                                <!-- More people... -->
                              </ul>
                        </div>
                      </li>
                      <li @click="attachments = 'pension'" class="cursor-pointer">
                        <div class="block hover:bg-gray-50">
                          <div class="flex justify-between px-4 py-4 sm:px-6">
                            <div>Pension Requirements</div>
                            <div>
                              <!-- Heroicon name: solid/chevron-right -->
                              <svg x-bind:class="attachments == 'pension' ? 'rotate-90' : ''" class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                            </div>
                          </div>
                        </div>
                        <div x-show="attachments=='pension'" x-cloak x-collapse  class="mt-2 border-t ">
                            <ul role="list" class="px-2 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                                
                                @forelse (\App\Models\Attachment::where('senior_citizen_id', $this->memberid)->where('type', 'pension')->get() as $item)
                 
                 <iframe src="https://drive.google.com/file/d/{{$item->file_id}}/preview?embedded=true" frameborder="0" class="h-20 w-40 bg-blue-400"></iframe>
                 @empty
                     
                 @endforelse
                                <!-- More people... -->
                              </ul>
                        </div>
                      </li>
                      
                  
                    </ul>
                  </div>
             </div>

             
            </div>
          
          </div>
        </div>
      </div>
      {{-- endupload --}}
     {{-- upload --}}
     <div x-show="oscaid" x-cloak class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
          <div x-show="oscaid"
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
          <div x-show="oscaid" x-cloak 
          x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
              <button @click="oscaid = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class=" mt-2 p-4">
              <div class=" relative h-96 rounded-lg bg-main">
                <div class="flex rounded-lg  relative justify-between items-center px-8 z-50 p-4">

                  <img src="{{asset('images/SCPMSLogo.png')}}" class="h-16 rounded-lg" alt="">
                  <div class="flex flex-col text-center text-gray-100">
                    <span class="leading-4">Republic of the Philippines</span>
                    <span class="uppercase font-bold leading-4">Office for Senior Citizens Affairs</span>
                    <span class="leading-4">Isulan, Sultan Kudarat</span>
                  </div>
                  
                  <img src="{{asset('images/isulan.png')}}" class="h-16" alt="">

                </div>
                <div class="flex flex-col relative  z-50 px-4 mt-4">
                  <div class="flex space-x-5">
                    <div class="">
                      <div class="w-36 h-36 shadow bg-white"></div>
                      <div class="w-36 h-7 text-white text-center mt-1 shadow border border-white">{{$oscaid}}</div>
                    </div>
                    <div class="w-full ">
                      <div class="flex w-full mb-2 space-x-3">
                        <div class="bg-white w-6/12 flex items-center px-2 h-10">{{$lastname}}</div>
                        <div class="bg-white w-6/12 flex items-center px-2 h-10">{{$firstname}}</div>
                      </div>
                      <div class="flex w-full mb-2 space-x-3">
                        <div class="bg-white w-6/12 flex items-center px-2 h-10">{{$middlename}}</div>
                        <div class="bg-white w-6/12 flex items-center px-2 h-10">{{$dob}}</div>
                      </div>
                      <div class="flex w-full mb-2 space-x-3">
                        <div class=" flex space-x-2 w-6/12 h-10">
                        <div class="bg-white w-6/12 flex items-center px-2">{{$sex}}</div>
                        <div class="bg-white w-6/12 flex items-center px-2">{{$status}}</div>
                        </div>
                        <div class="bg-white w-6/12 h-10 flex items-center px-2">{{$contact}}</div>
                      </div>
                      <div class="flex w-full mb-2 space-x-3">
                        <div class="bg-white w-full h-10 flex items-center px-2">{{$address}} brgy. {{$barangay}}, Isulan, Sultan Kudarat</div>
                      </div>
                    </div>
                  </div>

                  <div class="mt-3 flex justify-between">
                    <div class="flex flex-col ">
                      <div class="bg-white w-64 h-10"></div>
                      <span class="text-sm text-white text-center">Printed Name & Signature/Thumbmark</span>
                    </div>
                    <div class="flex flex-col ">
                      <div class="bg-white w-64 h-10 flex items-center justify-center">{{date('d-m-Y', strtotime($date))}}</div>
                      <span class="text-sm text-white text-center">Date Issued</span>
                    </div>
                  </div>
                </div>
                <img src="{{asset('images/Overlay.svg')}}" class="absolute top-0 left-0 h-full w-full rounded-lg" alt="">
              </div>
              <div class="mt-2 flex justify-end">
                <button wire:click="print" class="bg-green-700 p-1 px-4 text-white rounded-md">Print</button>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      {{-- endupload --}}
</div>
