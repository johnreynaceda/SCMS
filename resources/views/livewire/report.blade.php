<div x-data="{filter: @entangle('filter')}">
    <div class="mt-2">
        <div class="flex space-x-2 items-center">
      <label for="location" class="block text-sm font-bold text-gray-700">Filter</label>
      <select id="location" name="location" x-model="filter" class="mt-1  block  pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
        
        @if (auth()->user()->user_type_id == 0)
        <option selected>Select report</option>
        <option value="application">Social Pension Applicants</option>
        <option value="member">Members</option>
        <option value="benefits">Pension Beneficiaries</option>
        @else
        <option selected>Select report</option>
        <option value="application">Social Pension Applicants</option>
        <option value="member">Members</option>
        @endif
      </select>
    </div>
    </div>
    
    <div x-show="filter=='application'" x-cloak class="mt-4 border p-2 rounded-lg border-gray-500 shadow">
       <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-700">Social Pension Applicants</h1>
        <button wire:click="printsocial" class="bg-main p-1 px-2 rounded-lg text-white flex space-x-1 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
              </svg>
            <span>Print</span>
            </button>
       </div>
        <div class="mt-3">
            <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-auto divide-y divide-gray-200">
              <thead class="bg-main">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA DATE ISSUED
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    FULLNAME
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Exrt
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    STATUS
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    BIRTHDATE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    SEX
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    AGE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    PSGC BRGY
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    GIVEN ADDRESS
                  </th>
                  
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- Odd row -->
               @forelse ($socials as $social)
               <tr class="bg-white">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{$social->senior->osca_id}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                 {{$social->senior->created_at->format('m-d-Y')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$social->senior->lastname}}, {{$social->senior->firstname}} {{$social->senior->middlename[0]}}.
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$social->senior->extension}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$social->senior->marital_status}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$social->senior->date_of_birth}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$social->senior->sex}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$social->senior->age}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$social->senior->barangay->barangay_name}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{$social->senior->address}}
                </td>
                
              </tr>    
               @empty
                   
               @endforelse
    
    
                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        </div>
    </div>
    <div x-show="filter=='member'" x-cloak class="mt-4 border p-2 rounded-lg border-gray-500 shadow">
       <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-700">Members Lists</h1>
       <div class="flex space-x-2 items-end">
        <select id="location" name="location" wire:model="brgy_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option selected>select barangay</option>
           @forelse ($barangays as $item)
           <option value="{{$item->id}}">{{$item->barangay_name}}</option>
           @empty
               
           @endforelse
          </select>
        <button wire:click="printmember" class="bg-main h-9 p-1 px-2 rounded-lg text-white flex space-x-1 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
              </svg>
            <span>Print</span>
            </button>
       </div>
       </div>
        <div class="mt-3">
            <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-auto divide-y divide-gray-200">
              <thead class="bg-main">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA DATE ISSUED
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    FULLNAME
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Exrt
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    STATUS
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    BIRTHDATE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    SEX
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    AGE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    PSGC BRGY
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    GIVEN ADDRESS
                  </th>
                  
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- Odd row -->
                @forelse ($members as $social)
                <tr class="bg-white">
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                   {{$social->senior->osca_id}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$social->senior->created_at->format('m-d-Y')}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->lastname}}, {{$social->senior->firstname}} {{$social->senior->middlename[0]}}.
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->extension}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->marital_status}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->date_of_birth}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->sex}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->age}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->barangay->barangay_name}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->address}}
                 </td>
                 
               </tr>    
                @empty
                    
                @endforelse
    
                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        </div>
    </div>
    <div x-show="filter=='benefits'" x-cloak class="mt-4 border p-2 rounded-lg border-gray-500 shadow">
       <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold text-gray-700">Person Beneficiaries</h1>
        <button wire:click="printbenefits" class="bg-main p-1 px-2 rounded-lg text-white flex space-x-1 shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
              </svg>
            <span>Print</span>
            </button>
       </div>
        <div class="mt-3">
            <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-auto divide-y divide-gray-200">
              <thead class="bg-main">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA ID
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    OSCA DATE ISSUED
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    FULLNAME
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Exrt
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    STATUS
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    BIRTHDATE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    SEX
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    AGE
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    PSGC BRGY
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    GIVEN ADDRESS
                  </th>
                  
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- Odd row -->
                @forelse ($benefits as $social)
                <tr class="bg-white">
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                   {{$social->senior->osca_id}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{$social->senior->created_at->format('m-d-Y')}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->lastname}}, {{$social->senior->firstname}} {{$social->senior->middlename[0]}}.
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->extension}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                   {{$social->senior->marital_status}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->date_of_birth}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->sex}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->age}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->barangay->barangay_name}}
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                     {{$social->senior->address}}
                 </td>
                 
               </tr>    
                @empty
                    
                @endforelse
    
                <!-- More people... -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        </div>
    </div>
</div>
