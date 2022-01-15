<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OSCA-Office for Senior Citizen Affairs</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-overlay.min.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        [x-cloak] { display: none !important; }
        @media (min-width: 15em) {
            .filepond--item {
                width: calc(35% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }

    </style>
</head>

<body class="font-sans antialiased">

    
        <div  class="fixed left-0 z-50 top-32 " x-data="{announcement: false}">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
              </svg> --}}
            <button @click="announcement = true" class="bg-yellow-400 text-main cursor-pointer rounded-r-xl p-2 lg:p-4 shadow ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
              </svg>
            </button>
            <div x-show="announcement" x-cloak class=" absolute top-0 left-0 rounded-r-xl shadow-lg bg-yellow-400 w-72 lg:w-96 h-96 p-2">
              <div class="flex justify-between items-center">
                <h1 class="font-bold text-gray-700">Announcements</h1>
                <button @click="announcement= false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd" />
                      </svg>
                </button>
              </div>
              <div class="mt-1">
                <div>
                    <x-shared.announcement />
                  </div>
              </div>
            </div>
             
        </div>



    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <div>
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start"
                            aria-label="Global">
                            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="#">
                                        <span class="sr-only">Workflow</span>
                                        <img class="h-8 w-auto sm:h-10" src="{{ asset('images/SCPMSLogo.png') }}">
                                    </a>
                                    <div class="-mr-2 flex items-center md:hidden">
                                        <button type="button"
                                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                            aria-expanded="false">
                                            <span class="sr-only">Open main menu</span>
                                            <!-- Heroicon name: outline/menu -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Home</a>

                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">About Us</a>

                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Services</a>

                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Contact Us</a>


                            </div>
                        </nav>
                    </div>

                    <!--
                    Mobile menu, show/hide based on menu open state.
          
                    Entering: "duration-150 ease-out"
                      From: "opacity-0 scale-95"
                      To: "opacity-100 scale-100"
                    Leaving: "duration-100 ease-in"
                      From: "opacity-100 scale-100"
                      To: "opacity-0 scale-95"
                  -->
                    {{-- <div class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                        <span class="sr-only">Close main menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-2 pt-2 pb-3 space-y-1">
                                <a href="#"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Product</a>

                                <a href="#"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>

                                <a href="#"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Marketplace</a>

                                <a href="#"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Company</a>
                            </div>
                            <a href="#"
                                class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                                Log in
                            </a>
                        </div>
                    </div> --}}
                </div>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-main sm:text-5xl md:text-6xl">
                            OFFICE FOR SENIOR CITIZENS AFFAIRS
                        </h1>
                        <p
                            class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                            Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                        </p>

                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-main">
            <img class="h-56 w-full object-cover opacity-50 sm:h-72 md:h-96 lg:w-full lg:h-full"
                src="https://static7.depositphotos.com/1003098/740/i/600/depositphotos_7404958-stock-photo-senior-friends-sitting-together-in.jpg"
                alt="">
        </div>
    </div>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 border-t sm:px-6 md:py-16 lg:px-8 lg:py-20">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">We’re here to help.</span>
                <p class="mt-3 text-lg text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam sed. Quam a
                    scelerisque amet ullamcorper eu enim et fermentum, augue. Aliquet amet volutpat quisque ut interdum
                    tincidunt duis.
                </p>
            </h2>
            <div class="mt-8 flex space-x-3">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('member') }}"
                        class="inline-flex items-center justify-center px-5 py-3 border border-main text-base font-medium rounded-md text-main bg-white hover:bg-main hover:text-white">
                        Get Membership
                    </a>
                </div>
                <div class="inline-flex rounded-md shadow">
                    <a href="{{route('pension')}}"
                        class="inline-flex items-center justify-center px-5 py-3 border border-main text-base font-medium rounded-md text-white bg-main hover:bg-white hover:text-main">
                        Get Pension
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    From the blog
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus
                    sed.
                </p>
            </div>
            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    Article
                                </a>
                            </p>
                            <a href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    Boost your conversion rate
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium
                                    praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Roel Aufderehar</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        Roel Aufderehar
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        Mar 16, 2020
                                    </time>
                                    <span aria-hidden="true">
                                        &middot;
                                    </span>
                                    <span>
                                        6 min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    Video
                                </a>
                            </p>
                            <a href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    How to use search engine optimization to drive sales
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores
                                    porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio
                                    animi., tempore temporibus quo laudantium.
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Brenna Goyette</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        Brenna Goyette
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-10">
                                        Mar 10, 2020
                                    </time>
                                    <span aria-hidden="true">
                                        &middot;
                                    </span>
                                    <span>
                                        4 min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    Case Study
                                </a>
                            </p>
                            <a href="#" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    Improve your customer experience
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum voluptatem
                                    quo recusandae magni placeat saepe molestiae, sed excepturi cumque corporis
                                    perferendis hic.
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">Daniela Metz</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        Daniela Metz
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-02-12">
                                        Feb 12, 2020
                                    </time>
                                    <span aria-hidden="true">
                                        &middot;
                                    </span>
                                    <span>
                                        11 min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="flex border p-2">
        @livewire('s-m-s')
    </div>


    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <a href="{{ route('login') }}" class="flex space-x-2 items-center text-gray-400 hover:text-main">
                    <span>login as Administrator</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="mt-8 md:mt-0 md:order-1">
                <p class="text-center text-base text-gray-400">
                    &copy; 2020 Workflow, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    @livewireScripts
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    </script>
</body>

</html>
