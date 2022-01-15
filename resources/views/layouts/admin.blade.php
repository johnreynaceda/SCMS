<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OSCA-Office for Senior Citizen Affairs</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
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

    <div class="min-h-full">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
            <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

            <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "-translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "-translate-x-full"
    -->
            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-main">
                <!--
        Close button, show/hide based on off-canvas menu state.

        Entering: "ease-in-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in-out duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto"
                        src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                        alt="Easywire logo">
                </div>
                <nav class="mt-5 flex-shrink-0 h-full divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                    <div class="px-2 space-y-1">
                        <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                        <a href="#"
                            class="bg-main text-white group flex items-center px-2 py-2 text-base font-medium rounded-md"
                            aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home
                        </a>

                        <a href="#"
                            class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/clock -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            History
                        </a>

                        <a href="#"
                            class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/scale -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            Balances
                        </a>

                        <a href="#"
                            class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/credit-card -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Cards
                        </a>

                        <a href="#"
                            class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/user-group -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Recipients
                        </a>

                        <a href="#"
                            class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/document-report -->
                            <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Reports
                        </a>
                    </div>
                    <div class="mt-6 pt-6">
                        <div class="px-2 space-y-1">
                            <a href="#"
                                class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                <!-- Heroicon name: outline/cog -->
                                <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </a>

                            <a href="#"
                                class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                <!-- Heroicon name: outline/question-mark-circle -->
                                <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Help
                            </a>

                            <a href="#"
                                class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-cyan-100 hover:text-white hover:bg-cyan-600">
                                <!-- Heroicon name: outline/shield-check -->
                                <svg class="mr-4 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Privacy
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow bg-main pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center space-x-2 flex-shrink-0 px-4">
                    <img class="h-8 w-auto" src="{{ asset('images/SCPMSLogo.png') }}" alt="Easywire logo">
                    <h1 class="font-bold text-xl text-white">OSCA-ISULAN</h1>
                </div>
                @if (auth()->user()->user_type_id == 0)
                    <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto"
                        aria-label="Sidebar">
                        <div class="px-2 space-y-1">
                            <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                            <a href="#"
                                class="{{ Request::routeIs('admin-dashboard') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>DASHBOARD</span>
                            </a>
                            <a href="{{ route('admin-applicant') }}"
                            class="{{ Request::routeIs('admin-applicant') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                            aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                            APPLICANTS
                        </a>
                        <a href="{{ route('admin-member') }}"
                        class="{{ Request::routeIs('admin-member') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                        aria-current="page">
                        <!-- Heroicon name: outline/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                        </svg>
                        MEMBERS
                    </a>


                        </div>
                        <div class="mt-6 pt-6">
                            <div class="px-2 space-y-1">
                                <a href="{{ route('admin-announcement') }}"
                                    class="{{ Request::routeIs('admin-announcement') ? 'bg-white bg-opacity-40' : '' }} bg-cyan-800 text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                    aria-current="page">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                      </svg>
                                    ANNOUNCEMENTS
                                </a>
                                <a href="{{ route('admin-report') }}"
                                    class="{{ Request::routeIs('admin-report') ? 'bg-white bg-opacity-40' : '' }} bg-cyan-800 text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                    aria-current="page">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    REPORTS
                                </a>
                              
                                <a href="{{ route('admin-settings') }}"
                        class="{{ Request::routeIs('admin-settings') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                        aria-current="page">
                        <!-- Heroicon name: outline/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd" />
                                    </svg>
                        SETTINGS
                    </a>

                            </div>
                        </div>
                    </nav>
                @else
                    <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto"
                        aria-label="Sidebar">
                        <div class="px-2 space-y-1">
                            <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
                            <a href="{{ route('barangay-dashboard') }}"
                                class="{{ Request::routeIs('barangay-dashboard') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>DASHBOARD</span>
                            </a>
                            <a href="{{ route('barangay-applicant') }}"
                                class="{{ Request::routeIs('barangay-applicant') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-cyan-200"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                APPLICANTS
                            </a>
                            <a href="{{ route('barangay-members') }}"
                                class="{{ Request::routeIs('barangay-members') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                </svg>
                                MEMBERS
                            </a>


                        </div>
                        <div class="mt-6 pt-6">
                            <div class="px-2 space-y-1">
                                <a href="{{ route('barangay-announcement') }}"
                                    class="{{ Request::routeIs('barangay-announcement') ? 'bg-white bg-opacity-40' : '' }} bg-cyan-800 text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                    aria-current="page">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                      </svg>
                                    ANNOUNCEMENTS
                                </a>
                                <a href="{{ route('barangay-report') }}"
                                    class="{{ Request::routeIs('barangay-report') ? 'bg-white bg-opacity-40' : '' }} bg-cyan-800 text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                    aria-current="page">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    REPORTS
                                </a>
                                <a href="{{ route('barangay-settings') }}"
                                class="{{ Request::routeIs('barangay-settings') ? 'bg-white bg-opacity-40' : '' }} text-white hover:bg-white hover:bg-opacity-40 group flex items-end font-bold px-2 py-2 text-sm leading-6  rounded-md"
                                aria-current="page">
                                <!-- Heroicon name: outline/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                SETTINGS
                            </a>

                            </div>
                        </div>
                    </nav>
                @endif
            </div>
        </div>

        <div class="lg:pl-64 flex flex-col flex-1">
            <div class="relative z-10 flex-shrink-0 flex  bg-white border-b border-gray-200 lg:border-none">
                {{-- <button type="button"
                    class="px-4 border-r border-gray-200 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-1 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button> --}}
                <!-- Search bar -->
                {{-- <div class="flex-1 px-4 flex justify-between sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                                    aria-hidden="true">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search-field" name="search-field"
                                    class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm"
                                    placeholder="Search transactions" type="search">
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button"
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button type="button"
                                    class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <span class="hidden ml-3 text-gray-700 text-sm font-medium lg:block"><span
                                            class="sr-only">Open user menu for </span>Emilia Birch</span>
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">Logout</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <main class="flex-1">
                <!-- Page header -->
                <div class="bg-white shadow sticky top-0">
                    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                            <div class="flex-1 min-w-0">
                                <!-- Profile -->
                                <div class="flex items-center">
                                    <img class="hidden h-16 w-16  sm:block" src="{{ asset('images/SCPMSLogo.png') }}"
                                        alt="">
                                    <div>
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 rounded-full sm:hidden"
                                                src="{{ asset('images/SCPMSLogo.png') }}" alt="">
                                            <h1
                                                class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                                @if (auth()->user()->user_type_id == 0)
                                                    OFFICE FOR SENIOR CITIZEN AFFAIRS
                                                @else
                                                    <span class="uppercase text-main">BRGY.
                                                        {{ auth()->user()->barangay->barangay_name }}</span>
                                                @endif
                                            </h1>
                                        </div>
                                        <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                            <dt class="sr-only">Company</dt>
                                            <dd
                                                class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                                <!-- Heroicon name: solid/office-building -->
                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Isulan, Sultan Kudarat, Philippines, 9805
                                            </dd>

                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();"
                                        class="inline-flex items-center px-2 space-x-1 py-2 border border-main  shadow-sm text-sm font-medium rounded-md  bg-main text-white hover:bg-gray-50 hover:text-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>
                                            Logout
                                        </span>
                                    </a>
                                </form>
                                {{-- <button type="button"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    Send money
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h1 class="text-xl text-gray-700 font-bold">@yield('title')</h1>
                        <div class="mt-3">
                            @yield('content')
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
</body>

</html>
