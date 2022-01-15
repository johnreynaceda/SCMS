<div>
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y divide-gray-200">
          @forelse ($seniors as $key => $senior)
          <li>
            <div href="#" class="block ">
              <div class="px-4 py-4 flex items-center sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                  <div class="truncate">
                    <div class="flex text-md">
                      <p class="font-bold text-indigo-600 truncate">{{$senior->lastname}}, {{$senior->firstname}} {{$senior->middlename[0]}}. </p>
                      
                    </div>
                    <div class="mt-2 flex space-x-3">
                      <div class="flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/calendar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                          </svg>
                        <p>
                         {{$senior->barangay->barangay_name}}
                        </p>
                      </div>
                      <div class="flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/calendar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                          </svg>
                        <p>
                         Approve
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
                    <button wire:click="addmember({{$senior->id}})" class="bg-main py-1 px-2 rounded-md text-white ">Add to Member</button>
                  </div>
                </div>
              
              </div>
            </div>
          </li>
          @empty
          <li>
            <div href="#" class="block ">
              <div class="px-4 py-4 flex items-center sm:px-6">
              
                <span>No Approved Applicants Available.</span>
              
              </div>
            </div>
          </li>
          @endforelse
      
        </ul>
      </div>
</div>
