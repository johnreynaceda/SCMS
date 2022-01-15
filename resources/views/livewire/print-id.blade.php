<div>
    <div class="bg-main w-100 relative">
        <div class="flex rounded-lg  relative justify-between items-center px-4 z-50 p-4">

                  <img src="{{asset('images/SCPMSLogo.png')}}" class="h-14 rounded-lg" alt="">
                  <div  class="flex flex-col text-center text-gray-100">
                    <span style="color:white;" class="w leading-4">Republic of the Philippines</span>
                    <span style="color:white;" class="w uppercase font-bold leading-4">Office for Senior Citizens Affairs</span>
                    <span style="color:white;" class="w leading-4">Isulan, Sultan Kudarat</span>
                  </div>
                  
                  <img src="{{asset('images/isulan.png')}}" class="h-14" alt="">

                </div>
                <div class="flex flex-col relative  z-50 px-4 mt-4">
                    <div class="flex space-x-3">
                      <div class="">
                        <div class="w-28 h-28 shadow bg-white"></div>
                        <div class="w-28 h-7 text-white text-center mt-1 shadow border text-sm border-white">{{$member->osca_id}}</div>
                      </div>
                      <div class="w-full ">
                        <div class="flex w-full mb-2 space-x-2">
                          <div class="bg-white flex items-center text-sm px-2 w-6/12 h-8">
                          {{$member->lastname}}
                          </div>
                          <div class="bg-white flex items-center px-2 w-6/12 h-8 text-sm"> {{$member->firstname}}</div>
                        </div>
                        <div class="flex w-full mb-2 space-x-2">
                          <div class="bg-white w-6/12 flex items-center px-2 h-8 text-sm"> {{$member->middlename}}</div>
                          <div class="bg-white w-6/12 flex items-center px-2 h-8 text-sm"> {{$member->date_of_birth}}</div>
                        </div>
                        <div class="flex w-full mb-2 space-x-2">
                          <div class=" flex space-x-2 w-6/12 h-8">
                          <div class="bg-white w-6/12 flex items-center px-2 text-sm"> {{$member->sex}}</div>
                          <div class="bg-white w-6/12 flex items-center px-2 text-sm"> {{$member->marital_status}}</div>
                          </div>
                          <div class="bg-white w-6/12 flex items-center px-2 h-8 text-sm"> {{$member->contact}}</div>
                        </div>
                        <div class="flex w-full mb-2 space-x2">
                          <div class="bg-white w-full h-8 flex items-center px-2 text-sm"> {{$member->address}} brgy. {{$member->barangay->barangay_name}}, Isulan, Sultan Kudarat</div>
                        </div>
                      </div>
                    </div>
  
                    <div class="mt-2 flex justify-between">
                      <div class="flex flex-col ">
                        <div class="bg-white w-52 h-8 flex items-center px-2"></div>
                        <span class="text-xs text-white text-center">Printed Name & Signature/Thumbmark</span>
                      </div>
                      <div class="flex flex-col ">
                        <div class="bg-white w-52 h-8 flex items-center px-2 text-sm justify-center">{{date('d-m-Y', strtotime($member->created_at))}}</div>
                        <span class="text-xs text-white text-center">Date Issued</span>
                      </div>
                    </div>
                  </div>

        <img src="{{asset('images/Overlay.svg')}}" class="absolute top-0 left-0 h-full w-full " alt="">
    </div>
</div>
