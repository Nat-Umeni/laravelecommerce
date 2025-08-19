<header x-data class="relative z-10">
    <nav id='site-nav' data-testid="site-nav" aria-label="Top">
        <!-- translucent bar meant to sit over the dark hero -->
        <div class="bg-white/10 backdrop-blur-md backdrop-filter">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo (lg+) -->
                    <div class="hidden lg:flex lg:flex-1 lg:items-center">
                        <a href="{{ route('home') }}">
                            <span class="sr-only">Your Company</span>
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=white" alt=""
                                class="h-8 w-auto" />
                        </a>
                    </div>

                    <!-- Simple links (desktop) -->
                    <div class="hidden h-full lg:flex">
                        <div class="inset-x-0 bottom-0 px-4">
                            <div class="flex h-full justify-center space-x-8">
                                <a href="#" class="flex items-center text-sm font-medium text-white">All</a>
                                <a href="#" class="flex items-center text-sm font-medium text-white">Women</a>
                                <a href="#" class="flex items-center text-sm font-medium text-white">Men</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile: burger + search -->
                    <div class="flex flex-1 items-center lg:hidden">
                        <button type="button" data-testid="open-mobile-menu" @click="$dispatch('open-mobile-menu')"
                            class="-ml-2 p-2 text-white hover:cursor-pointer">
                            <span class="sr-only">Open menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                class="size-6" aria-hidden="true">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <a href="#" class="ml-2 p-2 text-white">
                            <span class="sr-only">Search</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                class="size-6" aria-hidden="true">
                                <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <!-- Logo (lg-) -->
                    <a href="{{ route('home') }}" class="lg:hidden">
                        <span class="sr-only">Your Company</span>
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=white" alt=""
                            class="h-8 w-auto" />
                    </a>

                    <!-- Right cluster -->
                    <div class="flex flex-1 items-center justify-end">
                        <a href="#" class="hidden text-sm font-medium text-white lg:block">Search</a>

                        <div class="flex items-center lg:ml-8">
                             <!-- Help -->
                            {{--<a href="#" class="p-2 text-white lg:hidden">
                                <span class="sr-only">Help</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    class="size-6" aria-hidden="true">
                                    <path
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="#" class="hidden text-sm font-medium text-white lg:block">Help</a> --}}

                            <!-- Currency next to Help -->
                            {{-- <div class="ml-3 -ml-1 lg:ml-4">
                                <x-currency-select variant="dark" class="-ml-2" />
                            </div> --}}

                            <!-- Cart -->
                            <div class="ml-4 flow-root lg:ml-8">
                                <a href="#" class="group -m-2 flex items-center p-2">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        class="size-6 shrink-0 text-white" aria-hidden="true">
                                        <path
                                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium text-white">0</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- /row -->

            </div>
        </div>
    </nav>
</header>
