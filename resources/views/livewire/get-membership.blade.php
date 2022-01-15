<div class="mt-2">
    <div wire:loading wire:target="savemember" class="fixed bg-gray-700 z-50 bg-opacity-40 flex justify-center items-center overflow-y-hidden top-0 w-full h-full left-0 inset-1 overflo">
        <div class="flex w-full  h-full flex-col items-center justify-center" >
            <img src="{{asset('images/SCPMSLogo.png')}}" class="h-20 animate-bounce" alt="">
            <span class="font-bold text-main animate-bounce">Please wait...</span>
        </div>
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
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                  +63
                                </span>
                                <input type="text" wire:model="contact" name="company-website" id="company-website" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" >
                              </div>
                            @error('contact') <span
                                    class="error text-xs text-red-500 italic">{{ $message }}</span>
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
    {{-- <button wire:click="test">adasd</button> --}}
    <div class="flex mt-3 justify-end">
        <a href="{{ route('home') }}" type="button"
            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
        </a>
        <button wire:click="savemember"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
        </button>
    </div>
</div>
