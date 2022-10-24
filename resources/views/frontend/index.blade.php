@extends('layouts.frontend')

@section('page')
<header>
    <div class="bg-gray-50 dark:bg-gray-900" x-data="{ menuOpen: false }">
        <div class="relative overflow-hidden">
            <div class="absolute inset-y-0 h-full w-full" aria-hidden="true">
                <div class="relative h-full">
                    <svg class="absolute right-full transform translate-y-1/3 translate-x-1/4 md:translate-y-1/2 sm:translate-x-1/2 lg:translate-x-full" width="404" height="784" fill="none" viewBox="0 0 404 784">
                        <defs>
                            <pattern id="e229dbec-10e9-49ee-8ec3-0286ca089edf" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-gray-800" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="784" fill="url(#e229dbec-10e9-49ee-8ec3-0286ca089edf)" />
                    </svg>
                    <svg class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 sm:-translate-x-1/2 md:-translate-y-1/2 lg:-translate-x-3/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
                        <defs>
                            <pattern id="d2a68204-c383-44b1-b99f-42ccff4e5365" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200 dark:text-gray-800" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="784" fill="url(#d2a68204-c383-44b1-b99f-42ccff4e5365)" />
                    </svg>
                </div>
            </div>
            <div class="relative pt-6 pb-16 sm:pb-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                            <div class="fixed top-0 left-0 md:relative py-2 flex items-center justify-between w-full md:w-auto bg-gray-50 dark:bg-gray-900 shadow md:shadow-none z-50">
                                    <img class="h-8 w-auto sm:h-10 ml-4 hidden dark:block" src="{{ asset('svg/cosu_plain_white.svg') }}" alt="">
                                    <img class="h-8 w-auto sm:h-10 ml-4 dark:hidden" src="{{ asset('svg/cosu_plain.svg') }}" alt="">
                                <div class="mr-4 flex items-center md:hidden">
                                    <button @click="menuOpen = !menuOpen" type="button" class="bg-gray-50 dark:bg-gray-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:text-gray-600 dark:hover:text-gray-500 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="main-menu"
                                            aria-haspopup="true">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-10">
                            <a href="#" class="font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900">Product</a>

                            <a href="#features" class="font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900">Features</a>

                            <a href="#pricing" class="font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900">Pricing</a>

                        </div>
                        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0 space-x-2 mr-4">
                            <div onclick="localStorage.theme = 'dark'; document.documentElement.classList.add('dark')" class="dark:hidden cursor-pointer">
                                <i class="ri-contrast-2-fill dark:text-white ri-2x"></i>
                            </div>
                            <div onclick="localStorage.theme = 'light'; document.documentElement.classList.remove('dark')" class="hidden dark:block cursor-pointer">
                                <i class="ri-contrast-2-line dark:text-white ri-2x"></i>
                            </div>
                            <a href="https://discord.gg/ZDRk3YG4kY" target="_blank">
                                <i class="ri-discord-fill dark:text-white ri-2x"></i>
                            </a>
                            <a href="https://github.com/cosu-io/timetracking" target="_blank">
                                <i class="ri-github-fill dark:text-white ri-2x"></i>
                            </a>
                        </div>
                    </nav>
                </div>

                <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                    <div class="fixed top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50" x-show="menuOpen" x-transition.duration.500ms>
                        <div class="rounded-lg shadow-md bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto sm:h-10 hidden dark:block" src="{{ asset('svg/cosu_plain_white.svg') }}" alt="">
                                    <img class="h-8 w-auto sm:h-10 dark:hidden" src="{{ asset('svg/cosu_plain.svg') }}" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button @click="menuOpen = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:text-gray-600 dark:hover:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                        <span class="sr-only">Close main menu</span>
                                        <!-- Heroicon name: x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                                <div class="px-2 pt-2 pb-3 space-y-1" role="none">
                                    <a href="#" @click="menuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-gray-100 dark:hover:bg-gray-900" role="menuitem">Product</a>

                                    <a href="#features" @click="menuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-gray-100 dark:hover:bg-gray-900" role="menuitem">Features</a>

                                    <a href="#pricing" @click="menuOpen = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-300 dark:hover:text-gray-100 dark:hover:bg-gray-900" role="menuitem">Pricing</a>

                                    <div class="w-full text-center">
                                        <a href="https://discord.gg/ZDRk3YG4kY" target="_blank">
                                            <i class="ri-discord-fill dark:text-white ri-2x"></i>
                                        </a>
                                        <a href="https://github.com/cosu-io/timetracking" target="_blank">
                                            <i class="ri-github-fill dark:text-white ri-2x"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </transition>

                <div class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl dark:text-gray-100">
                            <span class="block">Time tracking was never that easy!</span>
                        </h1>
                        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            We provide an easy to use and data protection free time tracking tool for everyone. Have fun & try!
                        </p>
                        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                            <div class="rounded-md shadow">
                                <a href="{{ route('create') }}" onclick="fathom.trackGoal('TODB6QOV', 0);" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium dark:hover:bg-cosu-700 rounded-md text-white dark:text-gray-200 bg-cosu-600 dark:bg-cosu-800 hover:bg-cosu-700 md:py-4 md:text-lg md:px-10 cursor-pointer">
                                    Start tracking
                                </a>
                            </div>
                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-cosu-600 dark:text-cosu-700 bg-white dark:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                    Features
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 flex flex-col" aria-hidden="true">
                    <div class="flex-1"></div>
                    <div class="flex-1 w-full bg-cosu-700 dark:bg-cosu-900"></div>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-20">
                    <img class="relative rounded-lg shadow-lg hidden dark:block" src="{{ asset('assets/images/hero-preview-dark.png') }}" alt="App screenshot">
                    <img class="relative rounded-lg shadow-lg block dark:hidden" src="{{ asset('assets/images/hero-preview.png') }}" alt="App screenshot">
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 id="features" class="text-base text-cosu-600 dark:text-cosu-800 font-semibold tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl">
                    The best way for time tracking
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Create a free tracker and you're ready to go. Use it for your own or share it with your team.
                </p>
            </div>

            <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <!-- Heroicon name: globe-alt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                URL based
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Create your personal tracker without any kind of registration and open it from anywhere.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <!-- Heroicon name: scale -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                No limit
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Create as much trackers and timers as you like.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <!-- Heroicon name: lightning-bolt -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                History
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Every change is saved, no information will be lost.
                            </dd>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <!-- Heroicon name: annotation -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                Data protection
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                No personal data is required at any time.
                            </dd>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <i class="ri-file-paper-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                Exports
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                CSV, XLS or JSON exports right to your hands.
                            </dd>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-cosu-500 dark:bg-cosu-700 text-white">
                                <i class="ri-search-line ri-lg"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                Filters / Search
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                Ultra fast search and filters.
                            </dd>
                        </div>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="bg-white-200">
        <div class="bg-cosu-900">
            <div class="pt-12 px-4 sm:px-6 lg:px-8 lg:pt-20">
                <div class="text-center">
                    <h2 id="pricing" class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
                        Pricing
                    </h2>
                    <p class="mt- text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">
                        Free forever!
                    </p>
                    <p class="mt-3 max-w-4xl mx-auto text-xl text-gray-300 sm:mt-5 sm:text-2xl">
                        We like to share our tool and will never charge you for any features*.
                    </p>
                </div>
            </div>
            <div class="mt-16 bg-white dark:bg-gray-800 pb-12 lg:mt-20 lg:pb-20">
                <div class="relative z-0">
                    <div class="absolute inset-0 h-5/6 bg-cosu-900 lg:h-2/3"></div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="relative lg:grid lg:grid-cols-7">
                            <div class="mx-auto max-w-md lg:mx-0 lg:max-w-none lg:col-start-1 lg:col-end-3 lg:row-start-2 lg:row-end-3">
                                <div class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-l-lg">
                                    <div class="flex-1 flex flex-col">
                                        <div class="bg-white dark:bg-cosu-700 px-6 py-10">
                                            <div>
                                                <h3 class="text-center dark:text-white text-2xl font-medium text-gray-900" id="tier-hobby">
                                                    Companies
                                                </h3>
                                                <div class="mt-4 flex items-center justify-center">
                                                <span class="px-3 flex items-start text-6xl tracking-tight text-gray-900 dark:text-white">
                                                <span class="mt-2 mr-2 text-4xl font-medium ">
                                                    $
                                                </span>
                                                <span class="font-extrabold">
                                                    0
                                                </span>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 dark:border-cosu-400 p-6 bg-gray-50 dark:bg-gray-900 sm:p-10 lg:p-6 xl:p-10">
                                            <ul class="space-y-4">
                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Unlimited trackers and timers
                                                    </p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Share with your team and freelancers
                                                    </p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Track projects, tasks, ...
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="mt-8">
                                                <div class="rounded-lg shadow-md">
                                                    <a href="{{ route('create') }}" onclick="fathom.trackGoal('TODB6QOV', 0);" class="block w-full text-center rounded-lg border border-transparent bg-white dark:bg-gray-800 dark:hover:bg-gray-700 px-6 py-3 text-base font-medium text-cosu-600 hover:bg-gray-50 cursor-pointer" aria-describedby="tier-hobby">
                                                        Start now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 max-w-lg mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-start-3 lg:col-end-6 lg:row-start-1 lg:row-end-4">
                                <div class="relative z-10 rounded-lg shadow-xl">
                                    <div class="pointer-events-none absolute inset-0 rounded-lg border-2 border-cosu-600 dark:border-cosu-300" aria-hidden="true"></div>
                                    <div class="absolute inset-x-0 top-0 transform translate-y-px">
                                        <div class="flex justify-center transform -translate-y-1/2">
                                        <span class="inline-flex rounded-full bg-cosu-600 dark:bg-cosu-300 px-4 py-1 text-sm font-semibold tracking-wider uppercase text-white dark:text-cosu-800">
                                  Most popular
                              </span>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-t-lg px-6 pt-12 pb-10 dark:bg-cosu-700">
                                        <div>
                                            <h3 class="text-center text-3xl font-semibold text-gray-900 dark:text-gray-100 sm:-mx-6" id="tier-growth">
                                                Developers
                                            </h3>
                                            <div class="mt-4 flex items-center justify-center">
                                            <span class="px-3 flex items-start text-6xl tracking-tight text-gray-900 dark:text-gray-100 sm:text-6xl">
                                      <span class="mt-2 mr-2 text-4xl font-medium">
                                          $
                                      </span>
                                            <span class="font-extrabold">
                                          0
                                      </span>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-t-2 border-gray-100 dark:border-cosu-400 rounded-b-lg pt-10 pb-8 px-6 bg-gray-50 dark:bg-gray-900 sm:px-10 sm:py-10">
                                        <ul class="space-y-4">
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                    Unlimited trackers and timers                                                    </p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                    Share via URL
                                                </p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                    Track projects and collaborate with other developers and your customer
                                                </p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                    Use in your team or for your individual projects
                                                </p>
                                            </li>

                                        </ul>
                                        <div class="mt-10">
                                            <div class="rounded-lg shadow-md">
                                                <a href="{{ route('create') }}" onclick="fathom.trackGoal('TODB6QOV', 0);" class="block w-full text-center rounded-lg border border-transparent bg-cosu-600 dark:bg-cosu-800 dark:text-gray-100 dark:hover:bg-cosu-700 px-6 py-4 text-xl leading-6 font-medium text-white hover:bg-cosu-700 cursor-pointer" aria-describedby="tier-growth">
                                                    Start now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 mx-auto max-w-md lg:m-0 lg:max-w-none lg:col-start-6 lg:col-end-8 lg:row-start-2 lg:row-end-3">
                                <div class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-r-lg">
                                    <div class="flex-1 flex flex-col">
                                        <div class="bg-white px-6 py-10 dark:bg-cosu-700">
                                            <div>
                                                <h3 class="text-center text-2xl font-medium text-gray-900 dark:text-gray-100" id="tier-scale">
                                                    Personal
                                                </h3>
                                                <div class="mt-4 flex items-center justify-center">
                                                <span class="px-3 flex items-start text-6xl tracking-tight text-gray-900 dark:text-gray-100">
                                          <span class="mt-2 mr-2 text-4xl font-medium">
                                              $
                                          </span>
                                                <span class="font-extrabold">
                                              0
                                          </span>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 dark:border-cosu-400 p-6 bg-gray-50 dark:bg-gray-900 sm:p-10 lg:p-6 xl:p-10">
                                            <ul class="space-y-4">
                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Unlimited trackers and timers
                                                    </p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Track projects of any kind
                                                    </p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: check -->
                                                        <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base font-medium text-gray-500 dark:text-gray-400">
                                                        Keep an eye on your times
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="mt-8">
                                                <div class="rounded-lg shadow-md">
                                                    <a href="{{ route('create') }}" onclick="fathom.trackGoal('TODB6QOV', 0);" class="block w-full text-center rounded-lg border border-transparent bg-white px-6 py-3 text-base font-medium text-cosu-600 dark:text-cosu-600 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer" aria-describedby="tier-scale">
                                                        Start now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 text-center text-gray-500 text-sm">
                            * Like to read the negative stuff? Nope, all upcoming stuff will be free forever too.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<x-footer></x-footer>

@endsection
