  <div class="mt-3 flex space-x-4 h-100 " x-data="{addsenior:false,editsenior:false,upload:false}">
      <div wire:loading wire:target="savemember,saveedit" class="fixed top-0 left-0 cursor-wait w-full h-full bg-main opacity-10 z-50">
      </div>
      @if (auth()->user()->user_type_id == 1)
      <div class="w-80 h-full">
        <div class="flex flex-col h-full">
            <div class="SEARCH mt-2 flex justify-between space-x-2" >
                <div class="flex flex-1 border p-1 px-2 rounded-lg shadow items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 text-gray-600 w-7" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input wire:model.debounce.200ms="search" type="text"
                        class="flex-1 h-9 focus:outline-none  focus:border-0 focus:ring-0 border-0"
                        placeholder="Search applicant....">
                </div>
                <button @click="addsenior = !addsenior" class="p-2 px-4 bg-main rounded-lg hover:text-gray-500 text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>


                

            </div>
            <div class="mt-2 flex-1 overflow-y-auto h-full">
                <div class="flow-root mt-6 ">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                        @forelse ($seniors as $senior)
                            <li class="py-4 px-1">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $senior->lastname }}, {{ $senior->firstname }}
                                            {{ $senior->middlename[0] }}.
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ $senior->contact }}
                                        </p>
                                    </div>
                                    <div>
                                        <a href="#" wire:click="selectapplicant({{ $senior->id }})"
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 px-1 border-b">
                                <div class="flex items-center space-x-4">
                                    <span>No Applicants..</span>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>


        </div>
    </div>
    <div class="border-l-2 p-2 flex flex-1">
        <div class=" flex-1">
            <div class="flex space-x-2 items-center">
                <h1 class="font-bold text-gray-700 ">
                    APPLICANT'S INFORMATION
                </h1>
                @if ($isMember == null)
                @else
                    <span class="text-xs  bg-green-500 px-2 rounded-full shadow text-white">Member</span>
                @endif

            </div>
            <div class="mt-2  flex flex-col space-y-2 divide-y divide-dashed divide-main  text-gray-700">
                <span>Lastname: {{ $lastname }}</span>
                <span>Firstname: {{ $firstname }}</span>
                <span>Middlename: {{ $middlename }}</span>
                <span>Extension: {{ $extension }}</span>
                <span>Birthdate: {{ $birthdate }}</span>
                <span>Marital Status: {{ $status }}</span>
                <span>Sex: {{ $sex }}</span>
                <span>Phone Number: {{ $contact }}</span>
                <span>Barangay: {{ $barangay }}</span>
                <span>Address: {{ $address }}</span>
            </div>

            <div class="flex mt-3 justify-between items-center space-x-2 mr-2">
                @if ($applicantid == null)
                @else
                <div>
                  <button wire:click="approve"
                  class="py-1 px-2 bg-main text-white rounded hover:text-gray-300 hover:shadow">Approve</button>
              {{-- <button wire:click="reject"
                  class="py-1 px-2 bg-red-600 text-white rounded hover:text-gray-300 hover:shadow">Reject</button>
                --}}
              </div>   
              <div class="action">
                  <button @click="editsenior = !editsenior" class="p-1 text-green-600 hover:underline flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg> <span>Edit</span></button>
                  <button @click="upload = !upload" class="p-1 flex text-main hover:underline">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg> <span>Upload</span>
                  </button>
              </div>
                @endif
            </div>
        </div>
        <div class=" border-l w-64 ">
            <h1 class="bg-main text-white shadow rounded-r pl-2">Uploaded Attachments</h1>
            <div class="body  h-100 mt-2 mb-10 overflow-y-auto p-2">
               @forelse (\App\Models\Attachment::where('senior_citizen_id', $this->applicantid)->get() as $item)
               <iframe src="https://drive.google.com/file/d/{{$item->file_id}}/preview?embedded=true" class="w-full h-20  mb-2" frameborder="0"></iframe>
               @empty
                   
               @endforelse
            </div>
        </div>
    </div>
    @else
    <div class=" w-full">
       @livewire('osca-application')
    </div>
      @endif
   

      {{-- addsenior --}}
      <div x-show="addsenior" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
          <div x-show="addsenior"
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
          <div x-show="addsenior" x-cloak 
          x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
              <button @click="addsenior = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class=" mt-5">
                <div class="mt-2">
                    <div wire:loading wire:target="savemember" class="fixed bg-gray-700 z-50 bg-opacity-30 flex justify-center items-center overflow-y-hidden top-0 w-full h-screen left-0 inset-1 overflo">
                        
                    </div>
                    <div class="border border-main rounded-lg shadow p-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Note:</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Use your real phone number where you can receive sms notification
                                </p>
                
                                <div class="mt-5">
                                    <span>Upload Requirements</span>
                                    <div class="mt-1 text-sm flex flex-col">
                                        <span>*1x1 ID Photo/Picture (2pcs)</span>
                                        {{-- <x-input.filepond wire:key="member" wire:model="attachments" multiple />
                                    @error('attachments') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror --}}
                                    <input type="file" multiple wire:model="attach_id">
                                    @error('attach_id') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        <span class="mt-1">*Photocopy of Birth Certificate/Birth Cert. of Children </span>
                                        <input type="file" multiple wire:model="attach_birthcert">
                                        @error('attach_birthcert') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        <span class="mt-1">*Voter's Certification from COMELEC</span>
                                        <input type="file" multiple wire:model="attach_voter">
                                        @error('attach_voter') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        <span class="mt-1" >*Barangay Certification (Residency)</span>
                                        <input type="file" multiple wire:model="attach_barangaycert">
                                        @error('attach_barangaycert') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        <span class="mt-1">*Registration/Membership Fee Offical Receipt (Proof of Payment)</span>
                                        <input type="file" multiple wire:model="attach_membership">
                                        @error('attach_membership') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#" method="POST">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                            <input type="text" wire:model.lazy="lastname" name="first-name" id="first-name"
                                                autocomplete="given-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('lastname') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        </div>
                
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">First name</label>
                                            <input type="text" wire:model.lazy="firstname" name="last-name" id="last-name"
                                                autocomplete="family-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('firstname') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">Middle name</label>
                                            <input type="text" wire:model.lazy="middlename" name="last-name" id="last-name"
                                                autocomplete="family-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('middlename') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Extension</label>
                                            <select wire:model.lazy="extension" autocomplete="country-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option selected hidden value="null">Select Extension</option>
                                                <option value="JR">JR</option>
                                                <option value="SR">SR</option>
                                            </select>
                                            @error('extension') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">Birthdate</label>
                                            {{-- <input type="date" wire:model.lazy="birthdate" autocomplete="family-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                                                <input wire:ignore wire:key="datepicker" x-data="{}" x-ref="datepicker" x-init="
                                                flatpickr($refs.datepicker, { 'disable': [
                                                    function(date) {
                                                        
                                                    }
                                                ],});
                                            " type="date" wire:model='birthdate'
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                
                                            placeholder="{{ Carbon\Carbon::today()->format('m-d-y') }}">
                                            @error('birthdate') <span
                                                class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                            <select wire:model.lazy="status" autocomplete="country-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option selected hidden value="null">Select Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divored">Divorced</option>
                                            </select>
                                            @error('status') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">Sex</label>
                                            <select wire:model.lazy="sex" autocomplete="country-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option selected hidden value="null">Select Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('sex') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">Phone number</label>
                                            <input type="text" wire:model.lazy="contact" id="last-name" autocomplete="family-name"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('contact') <span
                                                    class="error text-xs text-red-500 italic">{{ 'The Phone number field is required.' }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <div>
                                                <label for="country" class="block text-sm font-medium text-gray-700">Barangay</label>
                                                <select wire:model="barangay_id" autocomplete="country-name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected hidden value="null">Select Barangay</option>
                                                    @foreach ($barangays as $barangay)
                                                        <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
                                                    @endforeach
                                            
                                                </select>
                                            </div>
                                            
                                            @error('address') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-span-3">
                                            <label for="street-address" class="block text-sm font-medium text-gray-700">Given
                                                address</label>
                                            <input type="text" wire:model.lazy="address" autocomplete="street-address"
                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            @error('address') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                            @enderror
                                        </div>
                
                
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-3 justify-end">
                      
                        <button @click="addsenior = false" wire:click="savemember"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
                
            </div>
          
          </div>
        </div>
      </div>
      {{-- endaddsenior --}}

      {{-- editsenior --}}
      <div x-show="editsenior" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
          <div x-show="editsenior"
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
          <div x-show="editsenior" x-cloak 
          x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
              <button @click="editsenior = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class=" mt-5">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input type="text" wire:model.lazy="lastname" name="first-name" id="first-name"
                                    autocomplete="given-name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('lastname') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                            </div>
    
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">First name</label>
                                <input type="text" wire:model.lazy="firstname" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('firstname') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Middle name</label>
                                <input type="text" wire:model.lazy="middlename" name="last-name" id="last-name"
                                    autocomplete="family-name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('middlename') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Extension</label>
                                <select wire:model.lazy="extension" autocomplete="country-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option selected hidden value="null">Select Extension</option>
                                    <option value="JR">JR</option>
                                    <option value="SR">SR</option>
                                </select>
                                @error('extension') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Birthdate</label>
                                {{-- <input type="date" wire:model.lazy="birthdate" autocomplete="family-name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> --}}
                                    <input wire:ignore wire:key="datepicker" x-data="{}" x-ref="datepicker" x-init="
                                    flatpickr($refs.datepicker, { 'disable': [
                                        function(date) {
                                            
                                        }
                                    ],});
                                " type="date" wire:model='birthdate'
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
    
                                placeholder="{{ Carbon\Carbon::today()->format('m-d-y') }}">
                                @error('birthdate') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Marital Status</label>
                                <select wire:model.lazy="status" autocomplete="country-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option selected hidden value="null">Select Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divored">Divorced</option>
                                </select>
                                @error('status') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Sex</label>
                                <select wire:model.lazy="sex" autocomplete="country-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option selected hidden value="null">Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('sex') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Phone number</label>
                                <input type="text" wire:model.lazy="contact" id="last-name" autocomplete="family-name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('contact') <span
                                        class="error text-xs text-red-500 italic">{{ 'The Phone number field is required.' }}</span>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-700">Barangay</label>
                                    <select wire:model="barangay_id" autocomplete="country-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected hidden value="null">Select Barangay</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay->id }}">{{ $barangay->barangay_name }}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                
                                @error('address') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-3">
                                <label for="street-address" class="block text-sm font-medium text-gray-700">Given
                                    address</label>
                                <input type="text" wire:model.lazy="address" autocomplete="street-address"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('address') <span class="error text-xs text-red-500 italic">{{ $message }}</span>
                                @enderror
                            </div>
    
    
                        </div>
                    </form>
                    <div class="mt-2 flex justify-end">
                        <button wire:click="saveedit" @click="editsenior = false" class="p-1 px-4 text-white rounded-md bg-main">Save</button>
                    </div>
                </div>
                
            </div>
          
          </div>
        </div>
      </div>
      {{-- endeditsenior --}}

      {{-- upload --}}
      <div x-show="upload" x-cloak class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
          <div x-show="upload"
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
          <div x-show="upload" x-cloak 
          x-transition:enter="ease-out duration-300"
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave="ease-in duration-200"
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
              <button @click="upload = false" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class=" mt-5 p-4">
                <h1 class="font-bold text-lg text-gray-700">Upload Requirements for {{$lastname}}, {{$firstname}}</h1>
              <x-input.filepond multiple wire:model="attachments" />

              <div class="flex justify-end mt-4">
                <button @click="upload = false" wire:click="upload" class="p-1 bg-main rounded-md text-white px-4">Upload</button>
              </div>
            </div>
          
          </div>
        </div>
      </div>
      {{-- endupload --}}
  </div>
