<div>
    <div>
        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Applicants</a>
                        <p class="text-gray-500">{{$applicants->count()}}</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Members</a>
                        <p class="text-gray-500">{{$members->count()}}</p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            @if (auth()->user()->barangay_id == 0)
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-yellow-400 text-white text-sm font-medium rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                      </svg>
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Barangay</a>
                        <p class="text-gray-500">
                         {{$barangays->count()}}
                        </p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
            @else

            @endif

           
            <li class="col-span-1 flex shadow-sm rounded-md">
                <div
                    class="flex-shrink-0 flex items-center justify-center w-16 bg-green-500 text-white text-sm font-medium rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div
                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">Pension Issued</a>
                        <p class="text-gray-500">
                         {{$pensions->sum('amount')}}
                        </p>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
   
</div>
