<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OSCA-Office for Senior Citizens Affairs</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-overlay.min.css"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <style>
        .filepond--item {
            width: calc(50% - 0.5em);
        }

        @media (min-width: 30em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }

        [x-cloak] {
            display: none !important;
        }

    </style>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class=" bg-gray-50 ">
        <div class="relative bg-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start items-center space-x-3 lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Workflow</span>
                            <img class="h-10 w-auto sm:h-10" src="{{ asset('images/SCPMSLogo.png') }}" alt="">
                        </a>
                        <nav class="hidden md:flex space-x-10">
                            <div class="relative">
                                <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                                <button type="button"
                                    class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    aria-expanded="false">
                                    <span>Home</span>
                            </div>
                            <div class="relative">
                                <button type="button"
                                    class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    aria-expanded="false">
                                    <span>About Us</span>
                                </button>
                            </div>
                            <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                                Services
                            </a>
                            <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                                Contact Us
                            </a>
                        </nav>
                    </div>

                    <div class="-mr-2 -my-2 md:hidden">
                        <button type="button"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-expanded="false">
                            <span class="sr-only">Open menu</span>
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
        </div>
    </div>
    @yield('content')

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
                                        src="https://fiftyforward.org/wp-content/uploads/2019/03/Portrait-Of-Senior-Friends-Hiking-In-Countryside-e1605224224494.jpg"
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>
