<div x-data="{filter: @entangle('filter')}">
    <div>
        <h1 class="font-bold">DATABASE OF SENIOR CITIZENS</h1>
        <h1 class="font-bold">ISULAN, SULTAN KUDARAT</h1>
    </div>
    <div class="mt-2">
        {{-- member --}}
       <table x-show="filter=='member'"  class="w-full divide-y border divide-gray-200">
          
           <thead class="">
            <tr>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA ID
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA DATE ISSUED
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                FULLNAME
              </th>
              <th width="5" scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                Exrt
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                STATUS
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                BIRTHDATE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                SEX
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                AGE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                PSGC BRGY
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                GIVEN ADDRESS
              </th>
              
            </tr>
          </thead>
          <tbody>
            <!-- Odd row -->
            
            @forelse ($members as $social)
                <tr class="bg-white uppercase">
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-500">
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

       <table x-show="filter=='benefits'"  class="w-full divide-y border divide-gray-200">
          
           <thead class="">
            <tr>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA ID
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA DATE ISSUED
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                FULLNAME
              </th>
              <th width="5" scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                Exrt
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                STATUS
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                BIRTHDATE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                SEX
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                AGE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                PSGC BRGY
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                GIVEN ADDRESS
              </th>
              
            </tr>
          </thead>
          <tbody>
            <!-- Odd row -->
            
            @forelse ($benefits as $social)
                <tr class="bg-white uppercase">
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-500">
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

        {{-- social --}}
       <table x-show="filter=='application'"  class="w-full divide-y border divide-gray-200">
          
           <thead class="">
            <tr>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA ID
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                OSCA DATE ISSUED
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                FULLNAME
              </th>
              <th width="5" scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                Exrt
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                STATUS
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                BIRTHDATE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                SEX
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                AGE
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                PSGC BRGY
              </th>
              <th scope="col" class="px-6 py-3  text-left text-xs font-bold tex-gray-900 uppercase tracking-wider">
                GIVEN ADDRESS
              </th>
              
            </tr>
          </thead>
          <tbody>
            <!-- Odd row -->
            
            @forelse ($socials as $social)
                <tr class="bg-white uppercase">
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-500">
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
