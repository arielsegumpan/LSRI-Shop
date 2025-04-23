<div>
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap  md:justify-start md:flex-nowrap z-50 w-full bg-transparent">
        <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:justify-between md:gap-3 py-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center gap-x-1">
            <a class="flex-none text-xl font-semibold text-black focus:outline-hidden focus:opacity-80 dark:text-white me-4" href="#" aria-label="Brand">
                <img src="{{ asset('imgs/logo-01.png') }}" alt="" class="size-12 h-12 w-auto object-top drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)]">
            </a>

            <!-- Collapse Button -->
            <button type="button" class="hs-collapse-toggle md:hidden relative size-9 flex justify-center items-center font-medium text-sm rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-header-base-collapse"  aria-expanded="false" aria-controls="hs-header-base" aria-label="Toggle navigation"  data-hs-collapse="#hs-header-base" >
            <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
            <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            <span class="sr-only">Toggle navigation</span>
            </button>
            <!-- End Collapse Button -->
        </div>

        <!-- Collapse -->
        <div id="hs-header-base" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block "  aria-labelledby="hs-header-base-collapse" >
            <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <div class="py-2 md:py-0  flex flex-col md:flex-row md:items-center gap-0.5 md:gap-1">
                <div class="grow">
                    <div class="flex flex-col md:flex-row  md:items-center gap-0.5 md:gap-2 lg:gap-4">
                        <a class="p-2 flex items-center text-sm rounded-lg focus:outline-hidden dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700
                            {{ request()->routeIs('page.home') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700' : 'text-gray-800 hover:bg-gray-100' }}"
                            href="{{ route('page.home') }}" aria-current="page">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            </svg>
                            Home
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg focus:outline-hidden dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700
                            {{ request()->routeIs('page.shop') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700' : 'text-gray-800 hover:bg-gray-100' }}"
                            href="{{ route('page.shop') }}">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Shop
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg focus:outline-hidden dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700
                            {{ request()->routeIs('page.about') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700' : 'text-gray-800 hover:bg-gray-100' }}"
                            href="{{ route('page.about') }}">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12h.01"/>
                                <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                                <path d="M22 13a18.15 18.15 0 0 1-20 0"/>
                                <rect width="20" height="14" x="2" y="6" rx="2"/>
                            </svg>
                            About
                        </a>

                        <a class="p-2 flex items-center text-sm rounded-lg focus:outline-hidden dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700
                            {{ request()->routeIs('page.contact') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700' : 'text-gray-800 hover:bg-gray-100' }}"
                            href="{{ route('page.contact') }}">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
                                <path d="M18 14h-8"/>
                                <path d="M15 18h-5"/>
                                <path d="M10 6h8v4h-8V6Z"/>
                            </svg>
                            Contact
                        </a>

                    </div>
                </div>


                <button type="button" class="hs-dark-mode-active:hidden block hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="dark">
                    <span class="group inline-flex shrink-0 justify-center items-center size-9">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                      </svg>
                    </span>
                  </button>
                  <button type="button" class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="light">
                    <span class="group inline-flex shrink-0 justify-center items-center size-9">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2"></path>
                        <path d="M12 20v2"></path>
                        <path d="m4.93 4.93 1.41 1.41"></path>
                        <path d="m17.66 17.66 1.41 1.41"></path>
                        <path d="M2 12h2"></path>
                        <path d="M20 12h2"></path>
                        <path d="m6.34 17.66-1.41 1.41"></path>
                        <path d="m19.07 4.93-1.41 1.41"></path>
                      </svg>
                    </span>
                </button>

                <!-- Button Group -->
                <div class="md:ms-auto mt-2 md:mt-0 flex flex-wrap items-center gap-x-1.5">
                    <a class="py-[7px] px-2.5 inline-flex items-center font-medium text-sm rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 focus:outline-hidden focus:bg-gray-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="{{ route('filament.dashboard.auth.login') }}">
                        {{ __('Sign in') }}
                    </a>
                    <a class="py-2 px-2.5 inline-flex items-center font-medium text-sm rounded-lg bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-red-500 dark:hover:bg-red-600 dark:focus:bg-red-600" href="{{ route('filament.dashboard.auth.register') }}">
                        {{ __('Get started') }}
                    </a>
                </div>
                <!-- End Button Group -->
            </div>
            </div>
        </div>
        <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->
</div>
