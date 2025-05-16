<div>

    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-5 mx-auto">
        <div class="mt-5">

            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-red-500 mb-6" href="{{route('page.shop')}}">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                {{ __('Back to Shop') }}
            </a>


            <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
                <!-- Content -->
                <div class="lg:col-span-2">

                    <!-- Grid -->
                    <div class="grid gap-10 lg:grid-cols-2 lg:gap-y-16">

                        <div>
                            <!-- Slider -->
                            @if($product && $product->productImages->isNotEmpty())
                            <div data-hs-carousel='{
                                    "loadingClasses": "opacity-0",
                                    "isAutoPlay": true
                                }' class="relative">

                                <div class="flex space-x-2 lg:flex-row hs-carousel">
                                    <!-- Thumbnail Preview -->
                                    <div class="flex-none">
                                        <div class="flex flex-col overflow-y-auto hs-carousel-pagination max-h-96 gap-y-2
                                            [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">

                                            @foreach($product->productImages as $image)
                                            <div  wire:key="product-img-{{ $image->id }}"  class="hs-carousel-pagination-item shrink-0 border-gray-300 rounded-md overflow-hidden cursor-pointer w-[80px] h-[80px] hs-carousel-active:border-red-500">
                                                <div class="flex justify-center h-full p-2 bg-gray-100 dark:bg-neutral-900">
                                                    <img class="object-container w-auto h-full" src="{{ asset(Storage::url($image->url)) }}" alt="{{ $product->prod_slug }}">
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <!-- Main Image Display -->
                                    <div class="relative overflow-hidden bg-white rounded-lg grow min-h-96 max-h-40">
                                        <div class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap">

                                            @foreach($product->productImages as $image)
                                            <div wire:key="product-img-slide-{{ $image->id }}" class="hs-carousel-slide">
                                                <div class="flex justify-center h-full p-6 bg-gray-100 dark:bg-neutral-900">
                                                    <img class="object-contain w-full h-full size-full start-0 rounded-xl" src="{{ asset(Storage::url($image->url)) }}" alt="{{ $product->prod_slug }}">
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>

                                        <!-- Previous Button -->
                                        <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                                            <span class="text-2xl" aria-hidden="true">
                                                <svg class="text-red-500 shrink-0 size-5 disabled:text-red-400 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m15 18-6-6 6-6"></path>
                                                </svg>
                                            </span>
                                            <span class="sr-only">{{ __('Previous') }}</span>
                                        </button>

                                        <!-- Next Button -->
                                        <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                                            <span class="sr-only">{{ __('Next') }}</span>
                                            <span class="text-2xl" aria-hidden="true">
                                                <svg class="text-red-500 disabled:text-red-400 shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m9 18 6-6-6-6"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p class="text-center text-gray-500">{{ __('No images available for this product.') }}</p>
                            @endif
                            <!-- End Slider -->

                        </div>

                        <div>
                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500 mb-4">{{ $product->prod_sku }}</span>

                            <div class="flex flex-wrap flex-col md:flex-row items-center align-middle">
                                <h1 class="text-4xl font-bold text-gray-800 dark:text-white">{{ $product->prod_name }}</h1>
                                @if($product->formatted_discount)
                                {{-- Show discount badge --}}
                                <span class="inline-block bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full ms-2">
                                     {{ $product->formatted_discount }}
                                </span>
                                @endif
                            </div>

                            <h6 class="mt-2 text-gray-500 text-md dark:text-neutral-500">{{ $product->brand->brand_name }}</h6>



                                <!-- GROUPS -->
                                <div class="flex flex-row items-center justify-between mt-3 align-middle">
                                    @if($product->discounts->isNotEmpty() && $product->discounted_price < $product->prod_price)

                                        {{-- Show prices --}}
                                        <div>
                                            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                                                <span class="text-neutral-400 line-through mr-2">₱{{ number_format($product->prod_price, 2) }}</span>
                                                <span class="font-bold text-gray-500 dark:text-white">₱{{ number_format($product->discounted_price, 2) }}</span>
                                            </h2>
                                        </div>
                                        @else
                                            {{-- No discount --}}
                                            <div>
                                                <span class="text-black font-bold">₱{{ number_format($product->prod_price, 2) }}</span>
                                            </div>
                                    @endif
                                </div>
                                <!-- EBD GROUP -->


                            <div class="flex mt-4 gap-x-2">
                                @forelse ( $product->productCategories as $prodCat)
                                <a wire:key="product-cat-{{ $prodCat->id }}"  href="{{ route('page.shop.category', $prodCat->prod_cat_slug) }}">
                                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800/30 dark:text-yellow-500">{{ $prodCat->prod_cat_name }}</span>
                                </a>
                                @empty
                                    <h2 class="text-gray-500 dar:text-white">{{ __('No categories') }}</h2>
                                @endforelse
                            </div>
                            <livewire:shop-partials.add-to-cart :product="$product" :key="$product->id">
                        </div>

                    </div>
                    <!-- End Grid -->


                    <div class="py-8 lg:pe-8">
                        <div class="space-y-5 text-gray-500 lg:space-y-8 dark:text-white">
                            <h2 class="text-lg font-bold lg:text-3xl dark:text-white">{{ __('Description') }}</h2>
                            <div class="mb-5">
                                {!! str($product->prod__desc)->sanitizeHtml() !!}
                            </div>

                            <div>
                                {!! str($product->prod_long_desc)->sanitizeHtml() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->

                <!-- Sidebar -->
                <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                    <div class="sticky top-0 py-8 start-0 lg:ps-8">
                        <h1 class="mb-5 text-lg font-bold lg:mb-8 lg:text-3xl dark:text-white">{{ __('Related Products') }}</h1>
                        <div class="space-y-6">

                            <div class="grid gap-2 lg:grid-cols-2">
                                @forelse ($related_products as $related_product )

                                <div wire:key="related-product-{{ $related_product->id }}" >
                                    <!-- Media -->
                                    <a class="flex flex-col items-center group gap-x-6 focus:outline-none" href="{{ route('page.shop.single', ['prod_slug' => $related_product->prod_slug]) }}">
                                        <div>
                                            <img class=" top-0 object-contain rounded-lg w-full h-[200px]" src="{{ asset(Storage::url($related_product->productImages[0]->url)) }}" alt="{{ $related_product->prod_slug }}">
                                        </div>
                                        <div class="p-2">
                                            <h3 class="mt-2 text-sm text-gray-800 dark:text-white">{{ $related_product->prod_name }}</h3>
                                            <h4 class="mt-3 text-lg font-bold text-gray-800 dark:text-white">₱ {{ $related_product->prod_price }}</h4>
                                        </div>
                                    </a>
                                    <!-- End Media -->
                                </div>

                                @empty
                                    <h1 class="text-lg font-bold text-gray-800 dark:text-white">{{ __('No related products') }}</h1>
                                @endforelse

                            </div>

                        </div>

                        <hr class="my-5 border-gray-500 lg:my-8">

                        <div class="lg:mt-8">
                            <h1 class="mb-5 text-lg font-bold lg:mb-8 lg:text-3xl dark:text-white">{{ __('Product Reviews') }}</h1>
                            <!-- Header -->
                            <div class="flex items-center justify-between mb-3 gap-x-3">
                                <div class="flex items-center gap-x-2">
                                    <h4 class="font-semibold text-gray-800 dark:text-white">
                                        5.0
                                    </h4>

                                    <!-- Rating -->
                                    <div class="flex">
                                        <svg class="text-yellow-400 shrink-0 size-4 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        <svg class="text-yellow-400 shrink-0 size-4 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        <svg class="text-yellow-400 shrink-0 size-4 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        <svg class="text-yellow-400 shrink-0 size-4 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                        <svg class="text-yellow-400 shrink-0 size-4 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                        </svg>
                                    </div>
                                    <!-- End Rating -->
                                </div>

                                <a class="inline-flex items-center text-xs font-medium text-blue-600 gap-x-1 decoration-2 hover:underline" href="#">
                                See all (4)
                                </a>
                            </div>
                            <!-- End Header -->

                            <div class="mb-3">
                                <!-- Progress -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">5 star</span>
                                </div>
                                <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-neutral-700" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-yellow-400 rounded-full whitespace-nowrap dark:bg-yellow-600" style="width: 78%"></div>
                                </div>
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">78%</span>
                                </div>
                                </div>
                                <!-- End Progress -->

                                <!-- Progress -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">4 star</span>
                                </div>
                                <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-neutral-700" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-yellow-400 rounded-full whitespace-nowrap dark:bg-yellow-600" style="width: 20%"></div>
                                </div>
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">20%</span>
                                </div>
                                </div>
                                <!-- End Progress -->

                                <!-- Progress -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">3 star</span>
                                </div>
                                <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-neutral-700" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-yellow-400 rounded-full whitespace-nowrap dark:bg-yellow-600" style="width: 6%"></div>
                                </div>
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">6%</span>
                                </div>
                                </div>
                                <!-- End Progress -->

                                <!-- Progress -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">2 star</span>
                                </div>
                                <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-neutral-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-yellow-400 rounded-full whitespace-nowrap dark:bg-yellow-600" style="width: 2%"></div>
                                </div>
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">2%</span>
                                </div>
                                </div>
                                <!-- End Progress -->

                                <!-- Progress -->
                                <div class="flex items-center gap-x-3 whitespace-nowrap">
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">1 star</span>
                                </div>
                                <div class="flex w-full h-2 overflow-hidden bg-gray-200 rounded-full dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <div class="flex flex-col justify-center overflow-hidden text-xs text-center text-white transition duration-500 bg-yellow-400 rounded-full whitespace-nowrap dark:bg-yellow-600" style="width: 0%"></div>
                                </div>
                                <div class="w-10 text-end">
                                    <span class="text-sm text-gray-800 dark:text-white">0%</span>
                                </div>
                                </div>
                                <!-- End Progress -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>

            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-red-500" href="{{route('page.shop')}}">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                {{ __('Back to Shop') }}
            </a>



        </div>
    </div>
    <!-- End Card Blog -->

</div>

