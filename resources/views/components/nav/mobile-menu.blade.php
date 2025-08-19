@props(['open' => false])

<div x-data="{ open: @js($open), tab: 'women' }" x-on:keydown.escape.window="open = false" x-on:open-mobile-menu.window="open = true"
    x-on:close-mobile-menu.window="open = false">
    <!-- Backdrop -->
    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-black/25 lg:hidden" aria-hidden="true"
        @click="open=false"></div>

    <!-- Slide-over -->
    <div x-cloak data-testid="mobile-drawer" x-show="open" class="fixed inset-0 z-50 flex lg:hidden">
        <div class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white pb-12 shadow-xl"
            role="dialog" aria-modal="true" tabindex="-1"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <!-- Close -->
            <div class="flex px-4 pt-5 pb-2">
                <button type="button" @click="open=false"
                    class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6"
                        aria-hidden="true">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Tabs -->
            <div class="mt-2 block">
                <div class="border-b border-gray-200">
                    <div class="-mb-px flex space-x-8 px-4" role="tablist">
                        <button @click="tab='women'" :aria-selected="tab === 'women'"
                            :class="tab === 'women' ? 'border-indigo-600 text-indigo-600' :
                                'border-transparent text-gray-900'"
                            class="flex-1 border-b-2 px-1 py-4 text-base font-medium whitespace-nowrap">Women</button>
                        <button @click="tab='men'" :aria-selected="tab === 'men'"
                            :class="tab === 'men' ? 'border-indigo-600 text-indigo-600' :
                                'border-transparent text-gray-900'"
                            class="flex-1 border-b-2 px-1 py-4 text-base font-medium whitespace-nowrap">Men</button>
                    </div>
                </div>

                <!-- Women panel -->
                <div class="px-4 py-6" x-show="tab==='women'" x-transition.opacity>
                    <nav class="space-y-1">
                        <a href=" '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">New
                            Arrivals</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Basic
                            Tees</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Accessories</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Carry</a>
                    </nav>
                </div>

                <!-- Men panel -->
                <div class="px-4 py-6" x-show="tab==='men'" x-transition.opacity>
                    <nav class="space-y-1">
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">New
                            Arrivals</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Basic
                            Tees</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Accessories</a>
                        <a href="{{ '#' }}"
                            class="block rounded px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50">Carry</a>
                    </nav>
                </div>
            </div>

            <!-- Common links -->
            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Company</a></div>
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Stores</a></div>
            </div>

            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Create an account</a>
                </div>
                <div class="flow-root"><a href="{{ '#' }}"
                        class="-m-2 block rounded p-2 font-medium text-gray-900 hover:bg-gray-50">Sign in</a></div>
            </div>

            <!-- Currency selector -->
            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                <form>
                    <label for="mobile-currency" class="sr-only">Currency</label>
                    <div class="-ml-2 inline-grid grid-cols-1">
                        <select id="mobile-currency" name="currency" aria-label="Currency"
                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-7 pl-2 text-sm font-medium text-gray-700 focus:outline-2">
                            <option>CAD</option>
                            <option>USD</option>
                            <option>AUD</option>
                            <option>EUR</option>
                            <option>GBP</option>
                        </select>
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            class="pointer-events-none col-start-1 row-start-1 mr-1 size-5 self-center justify-self-end fill-gray-500">
                            <path
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>