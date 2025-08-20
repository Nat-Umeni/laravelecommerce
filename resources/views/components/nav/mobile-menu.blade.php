@props(['open' => false])

<div x-data="{ open: @js($open), tab: 'women' }" x-on:keydown.escape.window="open = false" x-on:open-mobile-menu.window="open = true"
    x-on:close-mobile-menu.window="open = false">
    <!-- Backdrop -->
    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/25 lg:hidden" data-testid="mobile-backdrop" aria-hidden="true"
        @click="open=false"></div>

    <!-- Slide-over -->
    <div x-cloak data-testid="mobile-drawer" @click.self="open=false" x-show="open" class="fixed inset-0 z-50 flex lg:hidden" >
        <div class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white pb-12 shadow-xl"
            role="dialog" aria-modal="true" tabindex="-1"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">

            <!-- Close -->
            <div class="flex px-4 pt-5 pb-2">
                <button id="mobile-menu-close" type="button" @click="open=false"
                    class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6"
                        aria-hidden="true">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Common links -->
            <div class="space-y-6 border-t border-gray-200 px-4 py-6" data-testid="mobile-menu-links">
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">All</a></div>
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Women</a></div>
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Men</a></div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Create an account</a>
                </div>
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Sign in</a></div>
            </div>
        </div>
    </div>
</div>
