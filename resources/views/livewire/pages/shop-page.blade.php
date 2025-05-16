<div>

    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto mb-10 text-center lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">{{ __('Shop') }}</h2>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">{{ __('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, iste!') }}</p>
        </div>
        <!-- End Title -->

        <!-- Sort Menu -->
        <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex mb-4 md:mb-6">
            <button id="hs-dropdown-hover-event" type="button" class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-800 border border-gray-200 rounded-lg shadow-sm bg-neutral-200 hs-dropdown-toggle gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                <svg class="size-4" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                </svg>
                Sort
              <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
              <div class="p-1 space-y-0.5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                  Latest
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                  Oldest
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                  Popular
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700" href="#">
                  Cheaper
                </a>
              </div>
            </div>
        </div>
        <!-- End Sort menu -->


        <!-- Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

            @forelse ($products as $product )

            <!-- Card -->
            <div wire:key="card-product-{{ $product->id }}" class="flex flex-col mb-4 border shadow-sm bg-neutral-200 rounded-xl dark:bg-neutral-900 border-neutral-300 dark:border-neutral-700 dark:shadow-neutral-700/70">

                <a class="px-5 py-5" href="{{ route('page.shop.single', $product->prod_slug) }}">
                    <div class="p-4 md:p-0 mb-4">
                        <span class=" inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">
                            {{ $product->prod_sku }}
                        </span>

                        <h3 class="text-lg font-bold text-gray-800 dark:text-white py-1.5">
                            {{ $product->prod_name }}

                            @if($product->formatted_discount)
                                {{-- Show discount badge --}}
                                <span class="inline-block bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full ms-2">
                                     {{ $product->formatted_discount }}
                                </span>
                            @endif
                        </h3>

                        <p class="text-sm text-gray-500 dark:text-neutral-500">
                            {{ $product->brand->brand_name }}
                        </p>

                        <!-- GROUPS -->
                        <div class="flex flex-row items-center justify-between mt-3 align-middle">
                            @if($product->discounts->isNotEmpty() && $product->discounted_price < $product->prod_price)

                                {{-- Show prices --}}
                                <div>
                                    <span class="text-neutral-400 line-through mr-2">₱{{ number_format($product->prod_price, 2) }}</span>
                                    <span class="font-bold text-gray-500 dark:text-white">₱{{ number_format($product->discounted_price, 2) }}</span>
                                </div>
                                @else
                                    {{-- No discount --}}
                                    <div>
                                        <span class="text-black font-bold">₱{{ number_format($product->prod_price, 2) }}</span>
                                    </div>
                            @endif
                        </div>
                        <!-- EBD GROUP -->

                    </div>
                    <img class="w-full h-[250px] md:h-[230px] lg:h-[200px] object-contain rounded-b-xl" src="{{ asset(Storage::url($product->prod_ft_image)) }}" alt="{{ $product->prod_slug }}">
                </a>

            </div>
            <!-- End Card -->

            @empty
            <div class="container w-full mx-auto text-center col-span-full">

                <svg class="flex items-center justify-center flex-shrink-0 w-auto mx-auto text-red-500 align-middle h-14" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>

                <h1 class="mt-4 text-2xl text-gray-800 dark:text-white">{{ __('No Products Created') }}</h1>

            </div>
            @endforelse

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->

</div>
