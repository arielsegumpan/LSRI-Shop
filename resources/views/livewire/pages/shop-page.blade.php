<div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto mb-10 text-center lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">{{ __('Shop') }}</h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">{{ __('Lorem ipsum dolor sit amet consectetur,
                adipisicing elit. Omnis, iste!') }}</p>
        </div>
        <!-- End Title -->

        <!-- Sort Menu -->
        <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex mb-4 md:mb-6">
            <button id="hs-dropdown-hover-event" type="button"
                class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-800 border border-gray-200 rounded-lg shadow-sm bg-neutral-200 hs-dropdown-toggle gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                <svg class="size-4" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                </svg>
                Sort
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
                <div class="p-1 space-y-0.5">
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        Latest
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        Oldest
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        Popular
                    </a>
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        Cheaper
                    </a>
                </div>
            </div>
        </div>
        <!-- End Sort menu -->


        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-5">
            <div class="col-span-5 md:col-span-4">
                <!-- Grid -->
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-8">

                    @forelse ($products as $product )

                    <!-- Card -->
                    <div wire:key="card-product-{{ $product->id . '' . $product->prod_sku }}"
                        class="flex flex-col mb-4 border shadow-sm bg-neutral-200 rounded-xl dark:bg-neutral-900 border-neutral-300 dark:border-neutral-700 dark:shadow-neutral-700/70 col-span-4 md:col-span-2">

                        <a class="px-5 py-5" href="{{ route('page.shop.single', $product->prod_slug) }}">
                            <div class="p-4 md:p-0 mb-4">
                                <small
                                    class="inline-flex items-center gap-x-1.5 py-1 px-3 rounded-full text-xs  bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">
                                    {{ $product->prod_sku }}
                                </small>

                                <h5 class="text-sm font-bold text-gray-800 dark:text-white py-1.5">
                                    {{ $product->prod_name }}

                                    @if ($product->discount_badge_text)
                                    {{-- Show discount badge --}}
                                    <span
                                        class="inline-block bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full ms-2">
                                        {{ $product->discount_badge_text }}
                                    </span>
                                    @endif
                                </h5>

                                <div class="flex flex-row justify-between align-middle items-center">
                                    <p class="text-sm text-gray-500 dark:text-neutral-500">
                                        4k+ sold
                                        {{-- {{ $product->brand->brand_name }}--}}
                                    </p>

                                    <div>

                                    </div>
                                </div>

                                <!-- GROUPS -->
                                <div class="flex flex-row items-center justify-between mt-3 align-middle">

                                    @if ($product->has_discount)

                                    {{-- Show prices --}}
                                    <div>
                                        <span class="text-neutral-400 line-through text-sm mr-2">₱{{
                                            number_format($product->prod_price, 2) }}</span>
                                        <span class="font-bold text-gray-500 dark:text-white">₱{{
                                            number_format($product->discounted_price, 2) }}</span>
                                    </div>
                                    @else
                                    {{-- No discount --}}
                                    <div>
                                        <span class="font-bold text-gray-500 dark:text-white">₱{{
                                            number_format($product->prod_price, 2) }}</span>
                                    </div>
                                    @endif
                                </div>
                                <!-- EBD GROUP -->

                            </div>
                            <div class="aspect-4/4 overflow-hidden rounded-2xl">
                                <img class="size-full object-cover rounded-2xl"
                                    src="{{ asset(Storage::url($product->prod_ft_image)) }}"
                                    alt="{{ $product->prod_slug }}">
                            </div>
                        </a>

                    </div>
                    <!-- End Card -->

                    @empty
                    <div class="container w-full mx-auto text-center col-span-full">

                        <svg class="flex items-center justify-center flex-shrink-0 w-auto mx-auto text-red-500 align-middle h-14"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        <h1 class="mt-4 text-2xl text-gray-800 dark:text-white">{{ __('No Products Created') }}</h1>

                    </div>
                    @endforelse

                </div>
                <!-- End Grid -->
            </div>

            <div class="col-span-5 md:col-span-1">

                <div class="flex flex-col flex-[1_0_0%]">
                    {{-- CATEGORIES --}}
                    <div class="p-4 flex-1 md:p-5 border-b border-gray-200 dark:border-neutral-700">
                        <h3 class="text-sm font-bold text-gray-800 dark:text-white">
                            {{ __('Category') }}
                        </h3>
                        <div class="flex flex-col gap-y-4 mt-5 md:mt-7">
                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-1">
                                <label for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>

                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-1">
                                <label for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>

                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-3">
                                <label for="hs-checkbox-group-3"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>
                        </div>
                    </div>
                    {{-- END CATEGORIES --}}

                    {{-- BRANDS --}}
                    <div class="p-4 flex-1 md:p-5 border-b border-gray-200 dark:border-neutral-700">
                        <h3 class="text-sm font-bold text-gray-800 dark:text-white">
                            {{ __('Brands') }}
                        </h3>

                        <div class="max-w-sm mt-4">
                            <!-- SearchBox -->
                            <div class="relative" data-hs-combo-box='{
                                "groupingType": "default",
                                "isOpenOnFocus": true,
                                "apiUrl": "../assets/data/searchbox.json",
                                "apiGroupField": "category",
                                "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200\"><div class=\"flex items-center w-full\"><div class=\"flex items-center justify-center rounded-full bg-gray-200 size-6 overflow-hidden me-2.5\"><img class=\"shrink-0\" data-hs-combo-box-output-item-attr=&apos;[{\"valueFrom\": \"image\", \"attr\": \"src\"}, {\"valueFrom\": \"name\", \"attr\": \"alt\"}]&apos; /></div><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-value></div><div class=\"hidden\" data-hs-combo-box-output-item-field=&apos;[\"name\", \"category\"]&apos; data-hs-combo-box-search-text></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"shrink-0 size-3.5 text-red-600 dark:text-red-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                                "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1 dark:text-neutral-500\"></div>"
                            }'>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                        <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                    </div>
                                    <input
                                        class="py-2.5 py-3 ps-10 pe-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        type="text" role="combobox" aria-expanded="false" placeholder="Type a name"
                                        value="" data-hs-combo-box-input="">
                                </div>

                                <!-- SearchBox Dropdown -->
                                <div class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700"
                                    style="display: none;" data-hs-combo-box-output="">
                                    <div class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"
                                        data-hs-combo-box-output-items-wrapper=""></div>
                                </div>
                                <!-- End SearchBox Dropdown -->
                            </div>
                            <!-- End SearchBox -->
                        </div>


                        <div class="flex flex-col gap-y-4 mt-5 md:mt-7">
                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-1">
                                <label for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>

                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-1">
                                <label for="hs-checkbox-group-1"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>

                            <div class="flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 p-2 border-gray-200 rounded-sm text-red-600 focus:ring-red-500 checked:border-red-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-red-500 dark:checked:border-red-500 dark:focus:ring-offset-gray-800"
                                    id="hs-checkbox-group-3">
                                <label for="hs-checkbox-group-3"
                                    class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Phone and smart
                                    watches</label>
                            </div>
                        </div>
                    </div>
                    {{-- END BRANDS --}}

                    {{-- PRICE RANGE --}}
                    <div class="flex flex-col gap-y-4 mt-5 md:mt-7">
                        <div class="flex">
                            <label for="steps-range-slider-usage" class="sr-only">Example range</label>
                            <input type="range" class="w-full bg-transparent cursor-pointer appearance-none disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden
                            [&::-webkit-slider-thumb]:w-2.5
                            [&::-webkit-slider-thumb]:h-2.5
                            [&::-webkit-slider-thumb]:-mt-0.5
                            [&::-webkit-slider-thumb]:appearance-none
                            [&::-webkit-slider-thumb]:bg-white
                            [&::-webkit-slider-thumb]:shadow-[0_0_0_4px_rgba(37,99,235,1)]
                            [&::-webkit-slider-thumb]:rounded-full
                            [&::-webkit-slider-thumb]:transition-all
                            [&::-webkit-slider-thumb]:duration-150
                            [&::-webkit-slider-thumb]:ease-in-out
                            dark:[&::-webkit-slider-thumb]:bg-neutral-700

                            [&::-moz-range-thumb]:w-2.5
                            [&::-moz-range-thumb]:h-2.5
                            [&::-moz-range-thumb]:appearance-none
                            [&::-moz-range-thumb]:bg-white
                            [&::-moz-range-thumb]:border-4
                            [&::-moz-range-thumb]:border-red-600
                            [&::-moz-range-thumb]:rounded-full
                            [&::-moz-range-thumb]:transition-all
                            [&::-moz-range-thumb]:duration-150
                            [&::-moz-range-thumb]:ease-in-out

                            [&::-webkit-slider-runnable-track]:w-full
                            [&::-webkit-slider-runnable-track]:h-2
                            [&::-webkit-slider-runnable-track]:bg-gray-100
                            [&::-webkit-slider-runnable-track]:rounded-full
                            dark:[&::-webkit-slider-runnable-track]:bg-neutral-700

                            [&::-moz-range-track]:w-full
                            [&::-moz-range-track]:h-2
                            [&::-moz-range-track]:bg-gray-100
                            [&::-moz-range-track]:rounded-full" id="steps-range-slider-usage"
                                aria-orientation="horizontal" min="0" max="5" step="1">
                        </div>
                    </div>
                    {{-- END PRICE RANGE --}}


                </div>

            </div>

        </div>


    </div>
    <!-- End Card Blog -->

</div>
