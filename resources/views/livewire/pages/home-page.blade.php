<div>
    {{-- @dd($getFtProds) --}}
    <div id="hs-offcanvas-body-scrolling-with-backdrop" class="hs-overlay [--body-scroll:true] hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs w-full z-10 bg-white border-e border-gray-200 dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-offcanvas-body-scrolling-with-backdrop-label">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
          <h3 id="hs-offcanvas-body-scrolling-with-backdrop-label" class="font-bold text-gray-800 dark:text-white">
            Body scrolling with backdrop
          </h3>
          <button type="button" class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-offcanvas-body-scrolling-with-backdrop">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
        <div class="p-4">
          <p class="text-gray-800 dark:text-neutral-400">
            Try scrolling the rest of the page to see this option in action.
          </p>
        </div>
    </div>

    <!-- Slider -->
    <div class="px-4 sm:px-6 lg:px-8 pb-5">
        <div data-hs-carousel='{
            "loadingClasses": "opacity-0"
        }' class="relative">
            <div class="hs-carousel relative overflow-hidden w-full h-120 md:h-[calc(100vh-250px)]  bg-gray-100 rounded-2xl dark:bg-neutral-800">
                <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">

                @foreach ($getFtProds as $getFtProd)
                <!-- Item -->
                <div wire:key="card-carousel-featured-{{ $getFtProd['id'] }}" class="hs-carousel-slide">
                    {{-- <div class="h-120 md:h-[calc(100vh-250px)]  flex flex-col bg-[url('{{ asset(Storage::url($getFtProd->prod_ft_image )) }}')] bg-cover bg-center bg-no-repeat"> --}}
                    <div
                        class="h-120 md:h-[calc(100vh-250px)] flex flex-col bg-cover bg-center bg-no-repeat"
                        style="background-image: url('{{ asset(Storage::url($getFtProd['prod_ft_image'])) }}');"
                    >
                        <div class="mt-auto w-2/3 md:max-w-lg ps-5 pb-5 md:ps-10 md:pb-10">
                        <span class="block text-white">qwqwq</span>
                        <span class="block text-white text-xl md:text-3xl">{{ $getFtProd['prod_name'] }}</span>
                        <div class="mt-5">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-white border border-transparent text-black hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="#">

                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>

                            Add to Cart
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- End Item -->
                @endforeach

                </div>
            </div>

            <!-- Arrows -->
            <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 h-full text-black hover:bg-white/20 rounded-s-2xl focus:outline-hidden focus:bg-white/20">
                <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-3.5 md:size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                </svg>
                </span>
                <span class="sr-only">Previous</span>
            </button>

            <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 h-full text-black hover:bg-white/20 rounded-e-2xl focus:outline-hidden focus:bg-white/20">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-3.5 md:size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                </svg>
                </span>
            </button>
            <!-- End Arrows -->
        </div>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="relative py-6 md:py-10 overflow-hidden border-b border-gray-200 dark:border-neutral-700 before:absolute before:top-0 before:start-0 before:z-10 before:w-20 before:h-full before:bg-linear-to-r before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:w-20 after:h-full after:bg-linear-to-l after:from-white after:to-transparent dark:before:from-neutral-900 dark:after:from-neutral-900">
                <div class="flex justify-between items-center gap-x-4">
                <svg class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white" enable-background="new 0 0 2499 614" viewBox="0 0 2499 614" xmlns="http://www.w3.org/2000/svg">
                    <path d="m431.7 0h-235.5v317.8h317.8v-235.5c0-45.6-36.7-82.3-82.3-82.3zm-308.9 0h-40.5c-45.6 0-82.3 36.7-82.3 82.3v40.5h122.8zm-122.8 196.2h122.8v122.8h-122.8zm392.5 317.8h40.5c45.6 0 82.3-36.7 82.3-82.3v-39.2h-122.8zm-196.3-121.5h122.8v122.8h-122.8zm-196.2 0v40.5c0 45.6 36.7 82.3 82.3 82.3h40.5v-122.8zm828-359.6h-48.1v449.4h254.5v-43h-206.4zm360.8 119c-93.7 0-159.5 69.6-159.5 169.6v11.5c1.3 43 20.3 83.6 51.9 113.9 30.4 27.9 69.6 44.3 111.4 44.3h6.3c44.3 0 86.1-16.5 119-44.3l1.3-1.3-21.5-35.4-2.5 1.3c-26.6 24.1-59.5 38-94.9 38-58.2 0-117.7-38-121.5-122.8h243.1v-2.5s1.3-15.2 1.3-22.8c-.3-91.2-53.4-149.5-134.4-149.5zm-108.9 134.2c10.1-57 51.9-93.7 106.3-93.7 40.5 0 84.8 24.1 88.6 93.7zm521.6-96.2v16.5c-20.3-34.2-58.2-55.7-97.5-55.7h-3.8c-86.1 0-145.6 68.4-145.6 168.4 0 101.3 57 169.6 141.8 169.6 67.1 0 97.5-40.5 107.6-58.2v49.4h45.6v-447h-46.8v157zm-98.8 257c-59.5 0-98.7-50.6-98.7-126.6 0-73.4 41.8-125.3 100-125.3 49.4 0 98.7 39.2 98.7 125.3 0 93.7-51.9 126.6-100 126.6zm424.1-250.7v2.5c-8.9-15.2-36.7-48.1-103.8-48.1-84.8 0-140.5 64.6-140.5 163.3s58.2 165.8 144.3 165.8c46.8 0 78.5-16.5 100-50.6v44.3c0 62-39.2 97.5-108.9 97.5-29.1 0-59.5-7.6-86.1-21.5l-2.5-1.3-17.7 39.2 2.5 1.3c32.9 16.5 69.6 25.3 105.1 25.3 74.7 0 154.4-38 154.4-143.1v-311.3h-46.8zm-93.7 241.8c-62 0-102.5-48.1-102.5-122.8 0-76 35.4-119 96.2-119 67.1 0 98.7 39.2 98.7 119 1.3 78.5-31.6 122.8-92.4 122.8zm331.7-286.1c-93.7 0-158.2 69.6-158.2 168.4v11.4c1.3 43 20.3 83.6 51.9 113.9 30.4 27.9 69.6 44.3 111.4 44.3h6.3c44.3 0 86.1-16.5 119-44.3l1.3-1.3-22.8-35.4-2.5 1.3c-26.6 24.1-59.5 38-94.9 38-58.2 0-117.7-38-121.5-122.8h244.2v-2.5s1.3-15.2 1.3-22.8c0-89.9-53.2-148.2-135.5-148.2zm-107.6 134.2c10.1-57 51.9-93.7 106.3-93.7 40.5 0 84.8 24.1 88.6 93.7zm440.6-127.9c-6.3-1.3-11.4-1.3-17.7-2.5-44.3 0-81 27.9-100 74.7v-72.2h-46.8l1.3 320.3v2.5h48.1v-135.4c0-20.3 2.5-41.8 8.9-60.8 15.2-49.4 49.4-81 89.9-81 5.1 0 10.1 0 15.2 1.3h2.5v-46.8z" fill="currentColor"></path>
                </svg>

                <svg class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="-4.126838974812941 0.900767442746961 939.436838974813 230.18142889845947" width="2500" height="607">
                    <path d="M667.21 90.58c-13.76 0-23.58 4.7-28.4 13.6l-2.59 4.82V92.9h-22.39v97.86h23.55v-58.22c0-13.91 7.56-21.89 20.73-21.89 12.56 0 19.76 7.77 19.76 21.31v58.8h23.56v-63c0-23.3-12.79-37.18-34.22-37.18zm-114.21 0c-27.79 0-45 17.34-45 45.25v13.74c0 26.84 17.41 43.51 45.44 43.51 18.75 0 31.89-6.87 40.16-21l-14.6-8.4c-6.11 8.15-15.87 13.2-25.55 13.2-14.19 0-22.66-8.76-22.66-23.44v-3.89h65.73v-16.23c0-26-17.07-42.74-43.5-42.74zm22.09 43.15h-44.38v-2.35c0-16.11 7.91-25 22.27-25 13.83 0 22.09 8.76 22.09 23.44zm360.22-56.94V58.07h-81.46v18.72h28.56V172h-28.56v18.72h81.46V172h-28.57V76.79zM317.65 55.37c-36.38 0-59 22.67-59 59.18v19.74c0 36.5 22.61 59.18 59 59.18s59-22.68 59-59.18v-19.74c-.01-36.55-22.65-59.18-59-59.18zm34.66 80.27c0 24.24-12.63 38.14-34.66 38.14S283 159.88 283 135.64v-22.45c0-24.24 12.64-38.14 34.66-38.14s34.66 13.9 34.66 38.14zm98.31-45.06c-12.36 0-23.06 5.12-28.64 13.69l-2.53 3.9V92.9h-22.4v131.53h23.56v-47.64l2.52 3.74c5.3 7.86 15.65 12.55 27.69 12.55 20.31 0 40.8-13.27 40.8-42.93v-16.64c0-21.37-12.63-42.93-41-42.93zM468.06 149c0 15.77-9.2 25.57-24 25.57-13.8 0-23.43-10.36-23.43-25.18v-14.72c0-15 9.71-25.56 23.63-25.56 14.69 0 23.82 9.79 23.82 25.56zm298.47-90.92L719 190.76h23.93l9.1-28.44h54.64l.09.28 9 28.16h23.92L792.07 58.07zm-8.66 85.53l21.44-67.08 21.22 67.08zM212.59 95.12a57.27 57.27 0 0 0-4.92-47.05 58 58 0 0 0-62.4-27.79A57.29 57.29 0 0 0 102.06 1a57.94 57.94 0 0 0-55.27 40.14A57.31 57.31 0 0 0 8.5 68.93a58 58 0 0 0 7.13 67.94 57.31 57.31 0 0 0 4.92 47A58 58 0 0 0 83 211.72 57.31 57.31 0 0 0 126.16 231a57.94 57.94 0 0 0 55.27-40.14 57.3 57.3 0 0 0 38.28-27.79 57.92 57.92 0 0 0-7.12-67.95zM126.16 216a42.93 42.93 0 0 1-27.58-10c.34-.19 1-.52 1.38-.77l45.8-26.44a7.43 7.43 0 0 0 3.76-6.51V107.7l19.35 11.17a.67.67 0 0 1 .38.54v53.45A43.14 43.14 0 0 1 126.16 216zm-92.59-39.54a43 43 0 0 1-5.15-28.88c.34.21.94.57 1.36.81l45.81 26.45a7.44 7.44 0 0 0 7.52 0L139 142.52v22.34a.67.67 0 0 1-.27.6l-46.3 26.72a43.14 43.14 0 0 1-58.86-15.77zm-12-100A42.92 42.92 0 0 1 44 57.56V112a7.45 7.45 0 0 0 3.76 6.51l55.9 32.28L84.24 162a.68.68 0 0 1-.65.06L37.3 135.33a43.13 43.13 0 0 1-15.77-58.87zm159 37l-55.9-32.28L144 70a.69.69 0 0 1 .65-.06l46.29 26.73a43.1 43.1 0 0 1-6.66 77.76V120a7.44 7.44 0 0 0-3.74-6.54zm19.27-29c-.34-.21-.94-.57-1.36-.81L152.67 57.2a7.44 7.44 0 0 0-7.52 0l-55.9 32.27V67.14a.73.73 0 0 1 .28-.6l46.29-26.72a43.1 43.1 0 0 1 64 44.65zM78.7 124.3l-19.36-11.17a.73.73 0 0 1-.37-.54V59.14A43.09 43.09 0 0 1 129.64 26c-.34.19-.95.52-1.38.77l-45.8 26.44a7.45 7.45 0 0 0-3.76 6.51zm10.51-22.67l24.9-14.38L139 101.63v28.74l-24.9 14.38-24.9-14.38z" fill="currentColor"></path>
                </svg>

                <svg class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2428 1002">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M311.5 389.8h191.8l67 117.5 77.8-117.5h178.3L682.7 590.7l154 220.7H648.1l-77.8-135.8-91.7 135.8h-175l153.2-220.7-145.3-200.9Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1279.3 640.7H955.4c2.9 26 10 45.2 21 58a76.5 76.5 0 0 0 61.1 27.3c16 0 31.5-4 45.3-12 8.8-5 18.2-13.7 28.2-26.5l159.2 14.7c-24.4 42.4-53.7 72.7-88 91.2-34.5 18.2-83.8 27.5-148.2 27.5-55.8 0-99.7-7.9-131.8-23.6a193.2 193.2 0 0 1-79.6-75c-21-34.4-31.6-74.6-31.6-121 0-65.8 21.2-119.2 63.3-159.8 42.3-40.8 100.6-61.3 175-61.3 60.3 0 108 9.2 142.8 27.5a184 184 0 0 1 79.8 79.3c18.3 34.7 27.4 79.8 27.4 135.3v18.4ZM1115 563.3c-3.2-31.3-11.6-53.7-25.2-67.1a73.1 73.1 0 0 0-53.8-20.3 73.6 73.6 0 0 0-61.6 30.6c-9.7 12.7-16 31.6-18.5 56.8H1115Zm137-173.5h168.3l81.9 267.1 84.5-267H1750l-179.1 421.5h-143.3L1252 389.8Zm463.2 212c0-64.3 21.7-117.4 65-159 43.5-41.7 102-62.6 176-62.6 84.4 0 148.2 24.5 191.3 73.5 34.6 39.4 52 88 52 145.8 0 64.7-21.5 117.8-64.5 159.3-43 41.3-102.4 62-178.5 62-67.7 0-122.5-17.1-164.3-51.5-51.4-42.6-77-98.4-77-167.6Zm162-.5c0 37.7 7.5 65.5 22.8 83.4a72 72 0 0 0 57.3 27.1c23.4 0 42.5-9 57.4-26.7 15-17.8 22.5-46 22.5-85.4 0-36.4-7.6-63.7-22.7-81.5a70.5 70.5 0 0 0-56-26.7c-23.5 0-43 9-58.3 27-15.4 18.2-23 45.9-23 82.8ZM2363.1.1a64 64 0 0 1 0 127.9 64 64 0 0 1 0-128Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1912.1 671.5c220.3-135 326.4-327 334-419.2 8.7-106.7-71-235.9-358.9-238-345 3.6-790 158.3-1163.6 360.4h138c315.8-152.6 672-266.2 1000.8-275.2 287.7-7.8 304.4 149.2 302 199-3.6 71-74.7 234.5-252.3 373Zm-1315.7-222-36 22.7 10 17.5 26-40.1ZM419.8 567.5C212 717 57 873.2.8 1001.9 77.8 897.1 217 771 394.9 647l40.4-58.1-15.5-21.4Z" fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2036.3 580a819.8 819.8 0 0 0 114.2-122.8l-3-3.5c-8-9.2-17-17.5-26.5-25-21 39.8-50 83.7-88.2 128.3 1.6 7 2.8 14.7 3.5 23Z" fill="currentColor"></path>
                </svg>

                <svg class="w-14 md:w-20 h-auto text-black mx-auto dark:text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127 33">
                    <path d="M9.3 16.5C9.3 9 14.3 2.7 21.2.7a16.5 16.5 0 1 0 0 31.6c-6.9-2-11.9-8.3-11.9-15.8Z" fill="currentColor"></path>
                    <path d="M21.7 10c4 0 7.4 2.8 8.5 6.4a8.9 8.9 0 1 0-17 0c1-3.6 4.4-6.3 8.5-6.3Z" fill="currentColor"></path>
                    <path d="M24.8 19.4c0 3-2 5.5-4.8 6.3A6.6 6.6 0 1 0 20 13c2.8.8 4.8 3.4 4.8 6.4Z" fill="currentColor"></path>
                    <path d="M39.6 13.5A4.4 4.4 0 0 1 44 9.1h1.3v2.7l-1 .2-1 .6-.2.4-.1.5h2.3v3H43v9.2h-3.4v-9.3h-1.3v-2.9h1.3ZM55.7 13.5h3.4v6.1a6.9 6.9 0 0 1-1.7 4.6 6 6 0 0 1-4.5 1.8c-1 0-1.8-.1-2.5-.5a6 6 0 0 1-3.2-3.4c-.3-.8-.4-1.6-.4-2.5v-6H50v6c0 .5 0 1 .2 1.3l.5 1c.2.4.5.6.9.8.3.2.8.3 1.2.3a2.6 2.6 0 0 0 2.1-1c.3-.3.4-.7.5-1l.2-1.4v-6ZM61.2 25.7V9.5h3.4v16.2h-3.4ZM66.9 25.7V9.5h3.3v16.2H67ZM78.5 21.2l3.3-7.7h3.7l-5.7 12.2h-2.7l-5.6-12.2H75l3.4 7.7ZM87 13.5h3.3v12.2H87V13.5Zm1.6-5 .8.1.6.4.4.7.2.7a1.9 1.9 0 0 1-.6 1.4l-.6.4a2 2 0 0 1-.8.1c-.5 0-1-.2-1.3-.5a2 2 0 0 1-.4-2.1c0-.3.2-.5.4-.7l.6-.4.7-.1ZM98.8 13.2a6.7 6.7 0 0 1 4.8 1.9 6.3 6.3 0 0 1 1.9 5.7h-9.8a3.3 3.3 0 0 0 3.2 2.2c.5 0 1-.1 1.4-.4.5-.2.9-.5 1.2-1h3.7c-.2.7-.5 1.3-1 1.8a6.1 6.1 0 0 1-3.3 2.3 7 7 0 0 1-6.9-1.6 6.1 6.1 0 0 1-2-4.5 6.1 6.1 0 0 1 2-4.5c.7-.6 1.4-1 2.2-1.4.8-.3 1.7-.5 2.6-.5Zm3.2 5.2c-.3-.6-.7-1.1-1.2-1.5-.6-.4-1.3-.7-2-.7s-1.4.3-2 .7c-.5.4-.9.9-1.1 1.5h6.3ZM123 13.5h3.6l-5 12.2H119l-2.5-6.5-2.5 6.5h-2.7l-5-12.2h3.6l2.7 7 2.8-7h2.2l2.8 7 2.7-7Z" fill="currentColor"></path>
                </svg>

                <svg class="hidden sm:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 88 22" xml:space="preserve" enable-background="new 0 0 88 22">
                    <path d="M36.3 14.6a7.3 7.3 0 0 1-5.6 2.8c-3.8 0-6.8-2.7-6.8-6.2a6 6 0 0 1 2-4.5A6 6 0 0 1 30.5 5c2.2 0 4.3 1 5.6 2.8l-2.5 1.8a3.7 3.7 0 0 0-3.1-1.8 3.5 3.5 0 0 0-3.5 3.5c.1 2 1.7 3.5 3.6 3.5 1.3 0 2.5-.6 3.2-1.7l2.5 1.5z" fill="currentColor"></path>
                    <path d="M37.7 0H40.8V17.1H37.7z" fill="currentColor"></path>
                    <path d="M49.1 14.7c2 0 3.7-1.6 3.8-3.6-.1-2-1.8-3.6-3.8-3.6s-3.7 1.6-3.8 3.6c.1 2 1.7 3.6 3.8 3.6m0-9.8c1.7-.1 3.4.5 4.7 1.7 1.3 1.2 2 2.8 2.1 4.5a6.4 6.4 0 0 1-2.1 4.5 6.4 6.4 0 0 1-4.7 1.7c-3.8 0-6.8-2.7-6.8-6.2s3-6.2 6.8-6.2" fill="currentColor"></path>
                    <path d="M55.3 5.1 59 5.1 62 11.5 65.2 5.1 68.6 5.1 62 17.8z" fill="currentColor"></path>
                    <path d="M77.5 9.4a3 3 0 0 0-2.9-1.9c-1.3 0-2.5.7-3.1 1.9h6zm2 6.3a7 7 0 0 1-4.6 1.6c-3.8 0-6.8-2.7-6.8-6.2 0-1.7.7-3.3 1.9-4.5a6 6 0 0 1 4.6-1.7c1.7-.1 3.3.6 4.5 1.8s1.8 2.8 1.7 4.5v.8h-9.6a3.9 3.9 0 0 0 6.5 1.5l1.8 2.2zm2.8-5.3c0-2.9 2.2-5.2 5.7-5.2V8c-.7 0-1.5.3-2 .8s-.7 1.3-.6 2v6.3h-3.1v-6.7z" fill="currentColor"></path>
                    <path d="M9.7 5.6a5 5 0 0 0-8.3-3.5C0 3.5-.4 5.6.3 7.4s2.5 3 4.5 3h4.9V5.6zm1.4 0a5 5 0 0 1 8.3-3.5c1.4 1.4 1.8 3.5 1.1 5.3s-2.5 3-4.5 3h-4.9V5.6zm0 11a5 5 0 0 0 8.3 3.5c1.4-1.4 1.8-3.5 1.1-5.3s-2.5-3-4.5-3h-4.9v4.8zm-6.3 3.5c1.9 0 3.5-1.5 3.5-3.5v-3.5H4.8c-1.9 0-3.5 1.5-3.5 3.5s1.6 3.5 3.5 3.5zm4.9-3.5a5 5 0 0 1-8.3 3.5C0 18.7-.4 16.6.3 14.8s2.5-3 4.5-3h4.9v4.8z" fill="currentColor"></path>
                </svg>

                <svg class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 107 32">
                    <g clip-path="url(#a)" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.1 0A3.1 3.1 0 0 0 0 3.1v25.2c0 1.7 1.4 3.1 3.1 3.1h25.2c1.7 0 3.1-1.4 3.1-3.1V3C31.4 1.4 30 0 28.3 0H3Zm7.3 18H13c2 0 3.3-2 2.5-3.8l-2.7-6a2.4 2.4 0 0 1 4.4-2L24.7 23a2.5 2.5 0 1 1-4.6 2l-.5-1c-.4-1-1.4-1.6-2.5-1.6h-3c-1 0-2 .6-2.5 1.6l-.4 1a2.5 2.5 0 0 1-4.7-2L8 19.6c.4-1 1.3-1.6 2.4-1.6Zm10.7-9.4L22.5 5c0-.3.5-.3.6 0l.6 1.2.1.1 1.5.8c.2.1.2.5 0 .6L21.5 9a.3.3 0 0 1-.5-.4ZM7.4 13.4l3.6 1.3c.3.1.5-.1.4-.4l-1.3-3.6a.3.3 0 0 0-.6 0L8.7 12l-.1.2-1.3.6c-.2.1-.2.5 0 .6ZM42.1 26.7h-3l6.6-20.3c.1-.3.4-.4.6-.4h4.5c.2 0 .5.1.6.4L58 26.7h-3l-2-6.3H44l-2 6.3Zm2.9-9 2.8-8.6a.8.8 0 0 1 1.5 0l2.8 8.7H45Z"></path>
                    <path d="M60.5 11.3v15.4h2.7V12c0-.3-.3-.6-.7-.6h-2ZM106 6h-2v20.7h2.7V6.6c0-.3-.3-.6-.7-.6ZM68.2 13.5a2.2 2.2 0 1 1-4.4 0 2.2 2.2 0 0 1 4.4 0ZM77.9 11.4c3.9.3 5.4 3.8 5.7 5.4h-2.9c-.3-2-2.7-3.9-5.7-2.8-3.3 1.2-3.2 4.8-3 6 .2 1.1.6 3 3 4 3 1.1 5.4-.8 5.7-2.8h2.9c-.3 1.7-1.8 5-5.7 5.4-4.3.5-6-1.5-6.8-2.4a7 7 0 0 1-1.4-2.8c-.8-3.5.4-6.5 1.4-7.6.7-1 2.5-2.8 6.8-2.4Z"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M87.8 13.8c-1 1-2.2 4-1.5 7.6.2.8.8 2 1.5 2.8.7.9 2.3 2.5 5.8 2.5 3.6 0 5.1-1.6 5.9-2.5a7 7 0 0 0 1.4-2.8c.8-3.5-.5-6.5-1.4-7.6-.7-1-2.3-2.5-5.9-2.5-3.5 0-5.1 1.6-5.8 2.5Zm1 6.3c-.2-1.3-.4-4.9 3-6a5.4 5.4 0 0 1 3.6 0c3.4 1.1 3.3 4.7 3.1 6-.2 1-.6 3-3 4a5.4 5.4 0 0 1-3.7 0c-2.4-1-2.9-3-3-4Z"></path>
                    </g>
                </svg>

                <svg class="hidden md:block w-14 md:w-20 h-auto text-black mx-auto dark:text-white" xmlns="http://www.w3.org/2000/svg" width="2500" height="1036" viewBox="0 -6.166 294.398 121.975">
                    <path d="M12.139 90.511c-3.939 0-7.799-.479-10.938-1.292l.487-8.277c3.053 1.123 7.313 2.012 11.254 2.012 5.952 0 10.775-2.492 10.775-8.359C23.718 63.172 0 68.002 0 50.466c0-9.325 7.315-15.834 19.941-15.834 3.214 0 6.51.397 9.809.959l-.485 7.802c-3.132-.963-6.591-1.527-9.806-1.527-6.754 0-10.211 3.134-10.211 7.638 0 10.855 23.72 6.839 23.72 23.798-.005 9.973-7.882 17.209-20.829 17.209M54.106 90.264c-2.249 0-3.938-.076-6.03-.479v17.397h-8.601V49.746h8.12c0 2.094-.082 5.309-.484 7.476h.162c2.25-5.068 6.833-8.283 12.944-8.283 9.487 0 14.712 6.75 14.712 18.814.001 14.076-7.473 22.511-20.823 22.511m3.861-34.246c-6.434 0-9.892 7.558-9.892 14.384v12.312c1.852.562 3.86.804 6.272.804 6.833 0 11.497-4.182 11.497-14.958.001-8.039-2.49-12.542-7.877-12.542zM102.519 57.381C94.561 55.936 90.7 61.485 90.7 73.466v16.238h-8.606V49.746H90.3c0 2.246-.246 5.791-.809 8.844h.162c1.771-5.388 5.79-10.377 13.271-9.651l-.405 8.442M114.803 43.797c-3.056 0-5.55-2.414-5.55-5.393 0-2.971 2.494-5.385 5.55-5.385 2.974 0 5.467 2.333 5.467 5.385 0 2.979-2.493 5.393-5.467 5.393m4.26 45.907h-8.6V49.746h8.6v39.958zM154.449 89.704V63.975c0-4.982-1.374-7.875-5.951-7.875-6.03 0-10.457 6.345-10.457 14.302v19.303h-8.603V49.746h8.203c0 2.094-.162 5.546-.563 7.796l.082.075c2.33-5.141 7.157-8.68 13.91-8.68 9.084 0 11.9 5.711 11.9 12.787v27.979h-8.521M186.675 90.425c-8.524 0-11.1-3.294-11.1-12.214V56.417h-7.634v-6.671h7.634V37.04l8.523-2.333v15.039h10.532v6.671h-10.448v19.137c0 5.954 1.205 7.558 5.224 7.558 1.769 0 3.699-.24 5.226-.643v7.076c-2.331.486-5.307.88-7.957.88" fill="currentColor"></path>
                    <path d="M233.712 78.636c11.72-15.086 20.938-32.809 20.938-45.537 0-6.652-4.765-11.295-10.978-14.823.123 13.831-4.668 46.263-9.96 60.36M195.279 115.809c27.47-9.188 67.29-30.598 94.985-49.725 2.324-1.6 4.135-3.085 4.135-5.685 0-4.519-8.275-10.576-12.292-12.987-21.792 22.653-65.163 56.596-86.828 68.397" fill="currentColor"></path>
                    <path d="M220.76 96.567c16.938-11.709 41.545-33.739 49.873-45.727 1.963-2.82 3.416-4.454 3.416-7.405 0-4.839-5.644-8.382-9.703-10.849-9.727 22.924-31.579 51.469-43.586 63.981M236.192 64.087c2.191-14.477.903-31.952-1.894-42.913-1.521-5.969-6.901-12.706-11.88-14.812 6.526 18.522 12.128 44.898 13.774 57.725" fill="currentColor"></path>
                    <path d="M231.367 43.779C226.235 29.91 213.446.998 194.633-6.165c12.247 13.516 30.417 40.337 36.734 49.944" fill="currentColor"></path>
                </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider -->



    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-20 mx-auto">
        <div class="grid items-center gap-12 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Icon Block -->
        <div class="text-center">
            <div class="flex items-center justify-center mx-auto border border-gray-200 rounded-full size-12 bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
            <svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="10" height="14" x="3" y="8" rx="2"/><path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"/><path d="M8 18h.01"/></svg>
            </div>
            <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Responsive</h3>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Responsive, and mobile-first project on the web</p>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <div class="flex items-center justify-center mx-auto border border-gray-200 rounded-full size-12 bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
            <svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
            </div>
            <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Customizable</h3>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Components are easily customized and extendable</p>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <div class="flex items-center justify-center mx-auto border border-gray-200 rounded-full size-12 bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
            <svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            </div>
            <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Documentation</h3>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Every component and plugin is well documented</p>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <div class="flex items-center justify-center mx-auto border border-gray-200 rounded-full size-12 bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
            <svg class="text-gray-600 shrink-0 size-5 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
            </div>
            <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">24/7 Support</h3>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Contact us 24 hours a day, 7 days a week</p>
            </div>
        </div>
        <!-- End Icon Block -->
        </div>
    </div>
    <!-- End Icon Blocks -->


    <!-- Features -->
    <div class="px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-14">
        <!-- Title -->
        <div class="max-w-2xl mx-auto mb-8 text-center lg:mb-14">
        <h2 class="text-3xl font-bold text-gray-800 lg:text-4xl dark:text-neutral-200">
            Explore tools
        </h2>
        <p class="mt-3 text-gray-800 dark:text-neutral-200">
            The powerful and flexible theme for all kinds of businesses.
        </p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid max-w-3xl grid-cols-12 gap-6 mx-auto lg:gap-8">
        <!-- Icon Block -->
        <div class="col-span-6 text-center sm:col-span-4">
            <svg class="h-auto mx-auto text-gray-800 w-7 md:w-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="10" height="14" x="3" y="8" rx="2"/><path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"/><path d="M8 18h.01"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                Responsive
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="col-span-6 text-center sm:col-span-4">
            <svg class="h-auto mx-auto text-gray-800 w-7 md:w-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                Customizable
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="col-span-6 col-start-4 text-center sm:col-span-4">
            <svg class="h-auto mx-auto text-gray-800 w-7 md:w-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                24/7 Support
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="grid items-center grid-cols-12 mt-20 gap-x-2 sm:gap-x-6 lg:gap-x-8">
        <div class="hidden col-span-4 md:block md:col-span-3">
            <img class="rounded-xl" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="col-span-4 md:col-span-3">
            <img class="rounded-xl" src="https://images.unsplash.com/photo-1587613991119-fbbe8e90531d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="col-span-4 md:col-span-3">
            <img class="rounded-xl" src="https://images.unsplash.com/photo-1554295405-abb8fd54f153?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="col-span-4 md:col-span-3">
            <img class="rounded-xl" src="https://images.unsplash.com/photo-1640622300473-977435c38c04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->


    <div class="my-20">
        <!-- Title -->
        <div class="mb-10">
            <div class="flex flex-col flex-wrap items-center justify-between md:flex-row">
                <div>
                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">New Items</h2>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, ad?</p>
                </div>

                <div>
                    <a href="{{ route('page.shop') }}" class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-red-500 border border-transparent rounded-lg gap-x-2 hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">Explore Products</a>
                </div>
            </div>
        </div>
        <!-- End Title -->
        <!-- Slider -->
        <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
            "slidesQty": {
            "xs": 1,
            "md": 2,
            "lg": 4
            },
            "isDraggable": true
        }' class="relative">
            <div class="w-full overflow-hidden rounded-lg hs-carousel">
                <div class="relative -mx-1 min-h-[28rem]  max-h-[28rem]">
                    <div class="absolute top-0 bottom-0 flex transition-transform duration-700 opacity-0 hs-carousel-body start-0 flex-nowrap cursor-grab hs-carousel-dragging:transition-none gap-2  hs-carousel-dragging:cursor-grabbing">

                    @foreach ($newProducts as $product)
                    <!-- Card -->
                    <div wire:key="card-carousel-slide-{{ $product->id }}" class="hs-carousel-slide flex flex-col border bg-gray-300 shadow-sm bg-neutral-200 rounded-xl dark:bg-neutral-700 border-neutral-300 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <a class="px-5 pt-5" href="{{ route('page.shop.single', $product->prod_slug) }}">
                            <div class="p-4 md:p-5">
                                <span class=" inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">
                                    {{ $product->prod_sku }}
                                </span>

                                <h3 class="text-lg font-bold text-gray-800 dark:text-white py-1.5">
                                    {{ $product->prod_name }}

                                    {{-- Show discount badge --}}
                                    <span class="inline-block bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full mb-2 ms-2">
                                        @php
                                            $discount = $product->discounts->first()->pivot;

                                            echo $discount->discount_type === 'percentage'
                                                ? number_format($discount->discount_value,0) . '% OFF'
                                                : '₱' . number_format($discount->discount_value, 0) . ' OFF';
                                        @endphp
                                    </span>

                                </h3>

                                <p class="text-sm text-gray-500 dark:text-neutral-500">
                                    {{ $product->brand->brand_name ?? 'N/A' }}
                                </p>

                                <!-- GROUPS -->
                                <div class="flex flex-row items-center justify-start mt-3 align-middle">
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
                                <!-- END GROUP -->
                            </div>

                            <img class="w-full h-[250px] md:h-[170px] lg:h-[180px] object-contain rounded-b-xl" src="{{ asset(Storage::url($product->prod_ft_image)) }}" alt="{{ $product->prod_slug }}">
                        </a>

                    </div>
                    <!-- End Card -->

                    @endforeach

                    </div>
                </div>
            </div>

            <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
                </svg>
            </span>
            <span class="sr-only">Previous</span>
            </button>
            <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
                <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
                </svg>
            </span>
            </button>

            <div class="absolute flex justify-center space-x-2 hs-carousel-pagination bottom-3 start-0 end-0"></div>
        </div>
        <!-- End Slider -->
    </div>

    <!-- Testimonials -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-24 mx-auto">

        <!-- Title -->
        <div class="max-w-2xl mx-auto mb-10 text-center">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">What people saying? </h2>
            <p class="mt-1 text-gray-600 dark:text-neutral-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, ad?</p>
        </div>
        <!-- End Title -->


        <!-- Grid -->
        <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 md:gap-20 md:grid-cols-3 lg:grid-cols-5 lg:gap-8">
        <!-- Icon Block -->
        <div class="text-center">
            <svg class="w-auto h-8 mx-auto text-gray-800 dark:text-neutral-200" width="227" height="88" viewBox="0 0 227 88" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M155.1 50.7001C151 50.7001 147.5 51.7001 144.5 53.1001C143.4 50.9001 142.3 49.0001 142.1 47.6001C142 46.0001 141.7 45.0001 142 43.0001C142.3 41.0001 143.4 38.3001 143.4 38.0001C143.4 37.8001 143.1 36.8001 140.8 36.8001C138.5 36.8001 136.4 37.2001 136.2 37.9001C136 38.5001 135.5 39.9001 135.2 41.4001C134.8 43.5001 130.5 51.1001 128.1 55.1001C127.3 53.5001 126.6 52.2001 126.5 51.1001C126.3 49.5001 126 48.5001 126.3 46.5001C126.6 44.5001 127.7 41.8001 127.7 41.5001C127.7 41.3001 127.4 40.3001 125.1 40.3001C122.8 40.3001 120.7 40.7001 120.5 41.4001C120.3 42.0001 120 43.5001 119.5 44.9001C119 46.3001 113.3 59.0001 111.8 62.3001C111 64.0001 110.4 65.3001 109.9 66.2001C109.9 66.2001 109.9 66.3001 109.8 66.4001C109.4 67.2001 109.2 67.6001 109.2 67.6001C108.9 68.2001 108.5 68.7001 108.4 68.7001C108.3 68.7001 108 67.2001 108.4 65.1001C109.3 60.7001 111.3 53.8001 111.3 53.6001C111.3 53.5001 111.7 52.3001 110 51.7001C108.3 51.1001 107.7 52.1001 107.6 52.1001C107.5 52.1001 107.3 52.5001 107.3 52.5001C107.3 52.5001 109.2 44.8001 103.8 44.8001C100.4 44.8001 95.8001 48.5001 93.5001 51.8001C92.1001 52.6001 89.0001 54.3001 85.7001 56.1001C84.4001 56.8001 83.1001 57.5001 81.9001 58.2001C81.8001 58.1001 81.7001 58.0001 81.6001 57.9001C75.0001 50.8001 63.0001 45.8001 63.5001 36.5001C63.7001 33.1001 64.9001 24.2001 86.6001 13.3001C104.5 4.50005 118.8 6.90005 121.3 12.3001C124.8 20.1001 113.7 34.4001 95.1001 36.5001C88.0001 37.3001 84.3001 34.6001 83.4001 33.5001C82.4001 32.4001 82.3001 32.4001 81.9001 32.6001C81.3001 32.9001 81.7001 33.9001 81.9001 34.4001C82.5001 35.8001 84.7001 38.4001 88.6001 39.7001C92.0001 40.8001 100.3 41.4001 110.3 37.5001C121.5 33.2001 130.3 21.1001 127.7 11.0001C125.2 0.800058 108.1 -2.49995 92.0001 3.20005C82.4001 6.60005 72.0001 12.0001 64.6001 18.9001C55.7001 27.2001 54.3001 34.4001 54.9001 37.4001C57.0001 48.1001 71.8001 55.1001 77.7001 60.3001C77.4001 60.5001 77.1001 60.6001 76.9001 60.7001C73.9001 62.2001 62.7001 68.1001 59.8001 74.3001C56.6001 81.4001 60.3001 86.4001 62.8001 87.1001C70.4001 89.2001 78.2001 85.4001 82.4001 79.2001C86.6001 72.9001 86.1001 64.8001 84.1001 61.1001C84.1001 61.1001 84.1001 61.0001 84.0001 61.0001C84.8001 60.6001 85.6001 60.1001 86.3001 59.6001C87.8001 58.7001 89.3001 57.9001 90.6001 57.2001C89.9001 59.2001 89.3001 61.5001 89.1001 65.0001C88.8001 69.0001 90.4001 74.2001 92.6001 76.2001C93.6001 77.1001 94.7001 77.1001 95.4001 77.1001C97.9001 77.1001 99.0001 75.0001 100.3 72.5001C101.8 69.5001 103.2 66.0001 103.2 66.0001C103.2 66.0001 101.5 75.5001 106.2 75.5001C107.9 75.5001 109.6 73.3001 110.4 72.2001C110.4 72.2001 110.4 72.1001 110.5 72.0001C110.7 71.7001 110.8 71.6001 110.8 71.6001C111.5 70.4001 113 67.7001 115.3 63.2001C118.2 57.4001 121.1 50.2001 121.1 50.2001C121.1 50.2001 121.4 52.0001 122.2 54.9001C122.7 56.6001 123.8 58.5001 124.6 60.4001C123.9 61.4001 123.5 61.9001 123.5 61.9001C122.9 62.6001 122.4 63.4001 121.7 64.2001C119.4 67.0001 116.6 70.1001 116.2 71.1001C115.8 72.2001 115.9 73.0001 116.7 73.6001C117.3 74.1001 118.4 74.1001 119.6 74.1001C121.7 74.0001 123.2 73.4001 123.9 73.1001C125 72.7001 126.3 72.1001 127.6 71.2001C129.9 69.5001 131.3 67.1001 131.1 63.9001C131 62.2001 130.5 60.4001 129.8 58.8001C130 58.5001 130.2 58.2001 130.4 57.9001C134 52.6001 136.8 46.9001 136.8 46.9001C136.8 46.9001 137.1 48.7001 137.9 51.6001C138.3 53.1001 139.2 54.7001 140 56.3001C136.6 59.0001 134.5 62.2001 133.8 64.3001C132.5 68.2001 133.5 69.9001 135.5 70.3001C136.4 70.5001 137.7 70.1001 138.6 69.7001C139.8 69.3001 141.2 68.7001 142.5 67.7001C144.8 66.0001 147 63.7001 146.8 60.5001C146.7 59.1001 146.4 57.6001 145.8 56.2001C148.7 55.0001 152.4 54.3001 157.1 54.9001C167.2 56.1001 169.2 62.4001 168.9 65.1001C168.5 67.8001 166.4 69.2001 165.7 69.7001C165 70.1001 164.8 70.3001 164.8 70.6001C164.9 71.1001 165.2 71.0001 165.8 71.0001C166.6 70.9001 171.1 68.8001 171.3 64.0001C171.6 57.4001 165.7 50.6001 155.1 50.7001ZM76.9001 77.0001C73.5001 80.7001 68.9001 82.0001 66.8001 80.9001C64.6001 79.6001 65.5001 74.2001 69.6001 70.4001C72.1001 68.0001 75.3001 65.8001 77.5001 64.5001C78.0001 64.2001 78.7001 63.8001 79.6001 63.2001C79.7001 63.1001 79.8001 63.1001 79.8001 63.1001C80.0001 63.0001 80.1001 62.9001 80.3001 62.8001C81.9001 68.3001 80.5001 73.2001 76.9001 77.0001ZM101.4 60.4001C100.2 63.3001 97.8001 70.6001 96.3001 70.2001C95.0001 69.9001 94.2001 64.3001 96.0001 58.9001C96.9001 56.2001 98.9001 52.9001 100 51.6001C101.8 49.6001 103.9 48.9001 104.3 49.7001C105 50.7001 102.1 58.6001 101.4 60.4001ZM121.6 70.0001C121.1 70.3001 120.6 70.4001 120.4 70.3001C120.3 70.2001 120.6 69.9001 120.6 69.9001C120.6 69.9001 123.1 67.2001 124.1 65.9001C124.7 65.2001 125.4 64.3001 126.1 63.4001C126.1 63.5001 126.1 63.6001 126.1 63.7001C126.2 66.9001 123 69.1001 121.6 70.0001ZM137.2 66.5001C136.8 66.2001 136.9 65.4001 138.1 62.7001C138.6 61.7001 139.7 59.9001 141.6 58.2001C141.8 58.9001 142 59.5001 141.9 60.2001C141.9 64.3001 139 65.8001 137.2 66.5001Z" fill="currentColor"/>
            </svg>

            <div class="mt-2 sm:mt-6">
            <p class="text-gray-800 dark:text-neutral-200">
                " Truly great template and costumer support. "
            </p>
            </div>

            <!-- Star -->
            <div class="flex justify-center mt-3 shrink-0 gap-x-1">
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            </div>
            <!-- End Star -->
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <svg class="w-auto h-8 mx-auto text-gray-800 dark:text-neutral-200" width="100" height="33" viewBox="0 0 100 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.8281 1.37569C22.5336 1.37569 23.2424 1.37569 23.9508 1.3708C23.943 3.90544 23.9763 6.44058 23.9352 8.97522C23.9171 10.6112 23.2268 12.3547 21.7273 13.1664C20.0327 14.0293 17.884 14.0245 16.2226 13.0866C14.8083 12.2589 14.1209 10.5569 14.1591 8.96984C14.1669 6.43764 14.1615 3.90544 14.1645 1.37324H16.2246C16.23 3.56544 16.2197 5.75518 16.227 7.94737C16.2632 8.95467 16.2657 10.051 16.8713 10.9096C17.6854 12.0304 19.3933 12.1361 20.5405 11.505C21.5786 10.8788 21.8002 9.57305 21.8208 8.45763C21.8384 6.09763 21.8227 3.73568 21.8281 1.37569ZM31.0244 1.42217C32.8091 0.891852 34.8007 1.21376 36.3902 2.16431C36.3804 2.90597 36.3804 3.64518 36.3804 4.38488C35.0463 3.3903 33.2714 2.65891 31.6149 3.23815C30.8987 3.45243 30.43 4.31443 30.7749 5.00814C31.0582 5.6725 31.8287 5.86574 32.4383 6.11329C33.7518 6.63626 35.2665 6.91708 36.2405 8.02711C37.4924 9.53929 37.1754 12.2315 35.3413 13.1512C33.2778 14.2201 30.6991 13.8801 28.7207 12.7672C28.7183 12.0045 28.7183 11.2447 28.7104 10.482C30.1996 11.6287 32.2656 12.3088 34.0894 11.6106C35.084 11.2501 35.2102 9.70269 34.3086 9.16846C32.9094 8.32114 31.1913 8.14844 29.8493 7.18761C28.6698 6.33931 28.322 4.65786 28.8117 3.33355C29.1771 2.37272 30.0612 1.70542 31.0244 1.42217ZM50.1764 1.19028C52.984 3.7665 55.7149 6.4303 58.4711 9.06279V1.37324H60.5317V13.8107C57.7211 11.1415 54.9884 8.39305 52.1621 5.73855V13.5391C51.4953 13.544 50.8305 13.544 50.1661 13.5465C50.1696 9.42873 50.149 5.31195 50.1764 1.19028ZM65.9449 1.3708C68.4311 1.3708 70.9144 1.38352 73.3977 1.36297C73.4128 1.98917 73.4128 2.61488 73.4128 3.24108C71.6306 3.24108 69.8504 3.23815 68.0676 3.24108V6.13384C69.6571 6.13922 71.2441 6.13384 72.8336 6.13922V8.00412C71.244 8.0064 69.6553 8.0064 68.0676 8.00412C68.0676 9.22717 68.0676 10.4541 68.073 11.6777C69.8503 11.6698 71.6306 11.6777 73.4055 11.6723C73.408 12.3166 73.4104 12.9628 73.4104 13.6071H65.94C65.9449 9.52902 65.9376 5.45138 65.9449 1.3708ZM79.4513 1.84974C81.3832 0.731877 83.8513 1.07433 85.747 2.10512C85.7832 2.86243 85.7832 3.6217 85.7808 4.3795C84.4051 3.3492 82.552 2.61244 80.8632 3.28756C79.9048 3.63001 79.7937 5.07517 80.6645 5.57466C82.0833 6.38872 83.8176 6.5531 85.1443 7.55306C86.927 8.88227 86.7954 12.0999 84.7578 13.1302C82.6943 14.2123 80.0902 13.8929 78.1167 12.7491C78.1167 11.9966 78.1167 11.2447 78.104 10.4923C79.5413 11.5197 81.3705 12.2183 83.1429 11.7393C83.797 11.5744 84.3973 10.9869 84.3043 10.2658C84.3176 9.71443 83.9311 9.23011 83.4467 9.0036C82.0554 8.282 80.4136 8.07848 79.1524 7.10249C77.5061 5.8271 77.6148 2.90352 79.4513 1.84974ZM91.8163 1.89133C93.7326 0.731877 96.2418 1.04351 98.1351 2.10218C98.1429 2.85215 98.1429 3.59919 98.1483 4.34868C96.7853 3.31838 94.9253 2.62026 93.259 3.30028C92.3295 3.66083 92.2233 5.06489 93.0731 5.57466C94.5261 6.42003 96.3347 6.5531 97.6639 7.63329C98.8077 8.53492 99.0367 10.2066 98.5935 11.5255C98.1786 12.6996 96.9962 13.3846 95.8343 13.635C94.0515 14.0034 92.148 13.6737 90.5639 12.7828C90.538 12.0177 90.538 11.2525 90.5355 10.4874C92.0345 11.6004 94.0775 12.3137 95.8988 11.6126C96.8905 11.252 97.0426 9.73204 96.1488 9.18069C94.711 8.28151 92.8975 8.15333 91.5502 7.08635C89.9617 5.81193 90.036 2.9637 91.8163 1.89133ZM0.960938 1.37324C3.12084 1.49946 5.36391 1.05574 7.45386 1.73673C9.77471 2.48084 10.1044 6.11084 7.9871 7.29035C9.91659 8.08925 10.3593 10.825 9.0355 12.3396C8.22144 13.3082 6.89223 13.5656 5.68924 13.6018C4.11249 13.6277 2.53867 13.6018 0.961916 13.6096V1.37324H0.960938ZM3.02544 3.24353C3.02283 4.31525 3.02283 5.3868 3.02544 6.45819C4.13304 6.40437 5.28221 6.61278 6.36388 6.30115C7.67009 5.92249 7.68036 3.7714 6.38198 3.38002C5.2871 3.10166 4.14086 3.29245 3.02544 3.24353ZM3.02544 8.26439C3.02055 9.42335 3.023 10.5828 3.02544 11.7378C4.29741 11.6478 5.66331 11.9878 6.8663 11.4546C8.05902 10.8724 7.9509 8.88863 6.70144 8.44295C5.51655 8.07359 4.24653 8.34511 3.02544 8.26439ZM42.2432 1.37324H44.3058V13.6096H42.2432V1.37324ZM33.7988 20.3716C35.7229 19.1529 38.2889 19.491 40.19 20.5908C40.1797 21.3275 40.1797 22.0643 40.1821 22.8006C38.7913 21.7835 36.8799 20.9978 35.2053 21.7781C34.3785 22.1724 34.2704 23.4008 35.0145 23.9341C36.5399 24.9027 38.5672 24.9492 39.8832 26.2735C40.7638 27.1052 40.9106 28.432 40.6846 29.5655C40.4219 30.699 39.4327 31.5439 38.3427 31.8648C36.4347 32.4519 34.2934 32.1353 32.5777 31.1383C32.5831 30.3835 32.5855 29.6291 32.5777 28.8742C34.0283 29.9637 35.9988 30.6799 37.7815 30.041C38.8578 29.7524 39.0721 28.0988 38.0981 27.5577C36.6583 26.6585 34.8267 26.5455 33.5023 25.4326C32.0009 24.1635 32.0988 21.4327 33.7988 20.3716ZM9.14117 19.8564H11.1993C11.2042 23.8905 11.205 27.9263 11.2018 31.9636H9.14117V19.8564ZM17.0597 19.5732C19.8008 22.19 22.5355 24.8176 25.3006 27.4095C25.3109 24.8695 25.303 22.3319 25.3055 19.7948C25.9904 19.7919 26.6774 19.7909 27.3666 19.7919C27.3714 23.9214 27.3612 28.0479 27.3714 32.1774C24.5765 29.5283 21.8359 26.8195 19.0621 24.1469C19.0488 26.7515 19.0621 29.3581 19.0567 31.9651H17.0602C17.0576 27.8332 17.0574 23.7025 17.0597 19.5732ZM46.0425 19.8564H48.1036V31.9636H46.0425V19.8564ZM54.031 19.8564C55.6901 19.8564 57.3508 19.8546 59.0132 19.8511C60.9011 19.8281 62.8511 20.7943 63.7738 22.4816C64.7654 24.2535 64.8295 26.456 64.2141 28.3649C63.5546 30.3707 61.5914 31.7895 59.4999 31.925C57.6786 32.0179 55.8548 31.9382 54.031 31.9636V19.8564ZM56.1537 21.7238V30.0933C57.6297 30.0395 59.2191 30.3203 60.5919 29.6301C61.9128 28.9496 62.5165 27.4041 62.4778 25.982C62.5316 24.5446 62.0243 22.9322 60.7005 22.1954C59.3116 21.42 57.6659 21.8221 56.1537 21.7238ZM68.8406 19.8564C71.3082 19.8542 73.777 19.8542 76.2469 19.8564C76.2469 20.4797 76.244 21.103 76.244 21.7267C74.4619 21.7215 72.681 21.7215 70.9012 21.7267V24.5549C72.4882 24.5578 74.0769 24.5588 75.6672 24.5578V26.3611C74.0777 26.3611 72.4873 26.3582 70.9012 26.3611V30.0909C72.6815 30.0963 74.4642 30.0909 76.2469 30.0938V31.9612H68.8406V19.8564ZM82.3029 19.854C83.9746 19.8692 85.6468 19.8383 87.316 19.8643C88.7347 19.9 90.2347 20.717 90.6427 22.1489C91.0086 23.3935 90.921 24.8695 90.1221 25.933C89.6329 26.569 88.8394 26.8092 88.0977 27.0127C89.5452 28.648 90.9817 30.2951 92.4073 31.9539C91.5919 31.9695 90.7796 31.9695 89.9705 31.9539C88.5894 30.313 87.1819 28.6952 85.7945 27.0646C85.3361 27.0675 84.8802 27.0675 84.4247 27.0675C84.4198 28.6981 84.4222 30.3287 84.4222 31.9597C83.7139 31.962 83.0055 31.962 82.2971 31.9597V19.8501L82.3029 19.854ZM84.4222 21.6602C84.4174 22.8607 84.4198 24.0613 84.4222 25.2613C85.5225 25.1997 86.6727 25.434 87.7377 25.0916C89.0542 24.5632 89.0826 22.4498 87.7866 21.8867C86.7211 21.4792 85.5435 21.7189 84.4281 21.6621" fill="currentColor"/>
            </svg>

            <div class="mt-2 sm:mt-6">
            <p class="text-gray-800 dark:text-neutral-200">
                " The best one I've ever come across. "
            </p>
            </div>

            <!-- Star -->
            <div class="flex justify-center mt-3 shrink-0 gap-x-1">
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M49.6867 20.0305C50.2889 19.3946 49.9878 18.1228 49.0846 18.1228L33.7306 15.8972C33.4296 15.8972 33.1285 15.8972 32.8275 15.2613L25.9032 0.317944C25.6021 0 25.3011 0 25 0V42.6046C25 42.6046 25.3011 42.6046 25.6021 42.6046L39.7518 49.9173C40.3539 50.2352 41.5581 49.5994 41.2571 48.6455L38.5476 32.4303C38.5476 32.1124 38.5476 31.7944 38.8486 31.4765L49.6867 20.0305Z" fill="#cbd5e1"/>
                <path d="M0.313299 20.0305C-0.288914 19.3946 0.0122427 18.1228 0.915411 18.1228L16.2694 15.8972C16.5704 15.8972 16.8715 15.8972 17.1725 15.2613L24.0968 0.317944C24.3979 0 24.6989 0 25 0V42.6046C25 42.6046 24.6989 42.6046 24.3979 42.6046L10.2482 49.9173C9.64609 50.2352 8.44187 49.5994 8.74292 48.6455L11.4524 32.4303C11.4524 32.1124 11.4524 31.7944 11.1514 31.4765L0.313299 20.0305Z" fill="currentColor"/>
            </svg>
            </div>
            <!-- End Star -->
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <svg class="w-auto h-8 mx-auto text-gray-800 dark:text-neutral-200" width="106" height="36" viewBox="0 0 106 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M55.4732 9.52669C55.4732 10.6846 54.5258 11.6846 53.3153 11.6846C52.1048 11.6846 51.1574 10.7372 51.1574 9.52669C51.1574 8.31616 52.0521 7.36879 53.3153 7.36879C54.5785 7.47406 55.4732 8.42142 55.4732 9.52669ZM46.6837 13.8425C46.6837 14.053 46.6837 14.3688 46.6837 14.3688C46.6837 14.3688 45.6837 13.053 43.5258 13.053C39.9469 13.053 37.1574 15.7898 37.1574 19.5267C37.1574 23.2635 39.8942 26.0004 43.5258 26.0004C45.7363 26.0004 46.6837 24.6319 46.6837 24.6319V25.2109C46.6837 25.4741 46.8942 25.6846 47.1574 25.6846H49.789V13.3688C49.789 13.3688 47.3679 13.3688 47.1574 13.3688C46.8942 13.3688 46.6837 13.632 46.6837 13.8425ZM46.6837 21.7372C46.21 22.4741 45.21 23.1056 44.0521 23.1056C41.9469 23.1056 40.3679 21.7898 40.3679 19.5793C40.3679 17.3688 41.9995 16.053 44.0521 16.053C45.21 16.053 46.2627 16.6846 46.6837 17.4214V21.7372ZM51.789 13.3688H54.9469V25.6846H51.789V13.3688ZM98.789 13.053C96.6311 13.053 95.6311 14.3688 95.6311 14.3688V7.47406H92.4732V25.7372C92.4732 25.7372 94.8942 25.7372 95.1048 25.7372C95.3679 25.7372 95.5785 25.5267 95.5785 25.2635V24.6846C95.5785 24.6846 96.5785 26.053 98.7364 26.053C102.315 26.053 105.105 23.3162 105.105 19.5793C105.157 15.7898 102.368 13.053 98.789 13.053ZM98.2627 23.053C97.0521 23.053 96.1048 22.4214 95.6311 21.6846V17.2635C96.1048 16.632 97.1574 15.8951 98.2627 15.8951C100.368 15.8951 101.947 17.2109 101.947 19.4214C101.947 21.632 100.368 23.053 98.2627 23.053ZM90.8416 18.4214V25.7898H87.6837V18.7898C87.6837 16.7372 87.0521 15.9477 85.2627 15.9477C84.3153 15.9477 83.3153 16.4214 82.6837 17.1583V25.7372H79.5258V13.3688H81.9995C82.2627 13.3688 82.4732 13.5793 82.4732 13.8425V14.3688C83.3679 13.4214 84.6311 13.053 85.8416 13.053C87.21 13.053 88.3679 13.4214 89.2627 14.2109C90.4206 15.1583 90.8416 16.3162 90.8416 18.4214ZM71.8942 13.053C69.7364 13.053 68.7364 14.3688 68.7364 14.3688V7.47406H65.5785V25.7372C65.5785 25.7372 67.9995 25.7372 68.21 25.7372C68.4732 25.7372 68.6837 25.5267 68.6837 25.2635V24.6846C68.6837 24.6846 69.6837 26.053 71.8416 26.053C75.4206 26.053 78.21 23.3162 78.21 19.5793C78.2627 15.7898 75.4732 13.053 71.8942 13.053ZM71.3679 23.053C70.1574 23.053 69.21 22.4214 68.7364 21.6846V17.2635C69.21 16.632 70.2627 15.8951 71.3679 15.8951C73.4732 15.8951 75.0521 17.2109 75.0521 19.4214C75.0521 21.632 73.4732 23.053 71.3679 23.053ZM62.8416 13.053C63.789 13.053 64.2627 13.2109 64.2627 13.2109V16.1056C64.2627 16.1056 61.6311 15.2109 59.9995 17.1056V25.7372H56.8416V13.3688C56.8416 13.3688 59.2627 13.3688 59.4732 13.3688C59.7364 13.3688 59.9469 13.5793 59.9469 13.8425V14.3688C60.5785 13.6846 61.8942 13.053 62.8416 13.053ZM30.1574 24.6319C29.9995 24.2635 29.8416 23.7898 29.6837 23.4741C29.4206 22.8951 29.1574 22.3162 28.9469 21.7898L28.8942 21.7372C26.6311 16.8425 24.21 11.8425 21.6311 6.89511L21.5258 6.68458C21.2627 6.2109 20.9995 5.68458 20.7363 5.15827C20.4206 4.57932 20.1048 3.94774 19.5785 3.36879C18.5258 2.053 16.9995 1.31616 15.4206 1.31616C13.789 1.31616 12.3153 2.053 11.21 3.26353C10.6837 3.89511 10.3153 4.47406 9.99951 5.10564C9.73635 5.63195 9.47319 6.15827 9.21003 6.63195L9.10477 6.84248C6.57845 11.7372 4.10477 16.7372 1.84161 21.6846L1.78898 21.7372C1.57845 22.2635 1.3153 22.8425 1.05214 23.4214C0.894243 23.7898 0.736348 24.1583 0.578453 24.5793C0.1574 25.7898 -0.000494055 26.9477 0.210032 28.1056C0.578453 30.5793 2.21003 32.632 4.47319 33.5267C5.3153 33.8951 6.21003 34.053 7.10477 34.053C7.36793 34.053 7.68372 34.0004 7.94687 34.0004C9.05214 33.8951 10.1574 33.5267 11.21 32.8951C12.5785 32.1583 13.8416 31.053 15.2627 29.4741C16.6837 31.053 17.9995 32.1056 19.3153 32.8951C20.4206 33.5267 21.5258 33.8951 22.5785 34.0004C22.8416 34.053 23.1574 34.053 23.4206 34.053C24.3153 34.053 25.2627 33.8951 26.0521 33.5267C28.3679 32.632 29.9469 30.5267 30.3153 28.1056C30.6837 26.9477 30.5785 25.8425 30.1574 24.6319ZM15.3679 26.3162C13.5785 24.1056 12.4732 22.0004 12.0521 20.2109C11.8942 19.4741 11.8416 18.7898 11.9469 18.2109C11.9995 17.6846 12.21 17.2109 12.4732 16.8425C13.1048 15.9477 14.1574 15.4214 15.3679 15.4214C16.5785 15.4214 17.6837 15.9477 18.2627 16.8425C18.5258 17.2109 18.7363 17.6846 18.789 18.2109C18.8942 18.7898 18.8416 19.4741 18.6837 20.2109C18.2627 21.9477 17.1048 24.053 15.3679 26.3162ZM28.4206 27.8425C28.21 29.5267 27.0521 31.0004 25.4206 31.6846C24.6311 32.0004 23.789 32.1056 22.9469 32.0004C22.1048 31.8951 21.3153 31.632 20.4732 31.1583C19.3153 30.5267 18.1048 29.4741 16.7363 28.0004C18.8942 25.3688 20.21 22.8951 20.6837 20.7372C20.8942 19.7372 20.9469 18.7898 20.8416 17.9477C20.7363 17.1056 20.4206 16.3688 19.9469 15.7372C18.9469 14.2635 17.21 13.4214 15.3153 13.4214C13.4206 13.4214 11.6837 14.3162 10.6837 15.7372C10.21 16.3688 9.94687 17.1583 9.78898 17.9477C9.68372 18.7898 9.68372 19.7372 9.94687 20.7372C10.4206 22.8951 11.789 25.3688 13.8942 28.0004C12.5258 29.5267 11.3153 30.5267 10.1574 31.1583C9.3153 31.632 8.47319 31.8951 7.68372 32.0004C6.78898 32.1056 5.94687 31.9477 5.21003 31.6846C3.57845 31.053 2.47319 29.5267 2.21003 27.8425C2.10477 27.0004 2.1574 26.2109 2.52582 25.2635C2.63108 24.9477 2.78898 24.632 2.94687 24.2109C3.1574 23.6846 3.42056 23.1056 3.68372 22.5793L3.73635 22.5267C5.99951 17.632 8.42056 12.632 10.9469 7.78985L11.0521 7.57932C11.3153 7.10564 11.5785 6.57932 11.8416 6.053C12.1048 5.52669 12.4206 5.053 12.7363 4.63195C13.4206 3.84248 14.3679 3.42143 15.3679 3.42143C16.3679 3.42143 17.3153 3.84248 17.9995 4.63195C18.3679 5.053 18.6311 5.52669 18.8942 6.053C19.1574 6.52669 19.4206 7.053 19.6837 7.57932L19.789 7.78985C22.2627 12.6846 24.6837 17.6846 26.9469 22.5267V22.5793C27.21 23.1056 27.4206 23.6846 27.6837 24.2109C27.8416 24.5793 27.9995 24.9477 28.1048 25.2635C28.4732 26.1583 28.5785 27.0004 28.4206 27.8425Z" fill="currentColor"/>
            </svg>

            <div class="mt-2 sm:mt-6">
            <p class="text-gray-800 dark:text-neutral-200">
                " This is a truly beautiful template. "
            </p>
            </div>

            <!-- Star -->
            <div class="flex justify-center mt-3 shrink-0 gap-x-1">
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            </div>
            <!-- End Star -->
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <svg class="w-auto h-8 mx-auto text-gray-800 dark:text-neutral-200" width="140" height="47" viewBox="0 0 140 47" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
                <path d="M96.2674 23.8697C93.7525 23.5204 92.7744 22.8916 92.8443 21.9136C92.984 20.1671 95.1497 19.9575 96.477 20.0274C99.0619 20.2369 99.6207 22.4725 99.6207 22.7519L102.136 22.5423C101.996 20.9355 100.669 17.7918 96.8962 17.5124C94.8004 17.3727 92.984 17.7918 91.7964 18.8397C90.8882 19.6082 90.1197 20.7958 89.98 21.9835C89.7006 25.8258 93.473 26.3847 95.8483 26.734C98.8523 27.1531 99.5509 27.5723 99.481 28.69C99.481 29.2489 99.1317 29.8078 98.7126 30.1571C98.0838 30.6461 96.8263 30.8557 95.5688 30.716C92.7046 30.4365 92.495 28.6202 92.495 28.2709L89.98 28.3407C89.98 29.8777 91.0279 32.8817 95.2894 33.3707C97.5948 33.6501 99.481 32.9515 100.459 32.2529C101.577 31.4146 102.206 30.0174 102.275 28.69C102.485 24.708 98.6427 24.219 96.2674 23.8697Z" fill="currentColor"/>
                <path d="M110.659 30.7161C114.431 30.7161 114.152 26.4546 114.152 26.4546V17.9316H117.086V26.3847C117.086 26.3847 117.086 26.4546 117.086 26.6642C117.086 27.9217 116.946 33.3009 110.728 33.3009H110.519C104.301 33.3009 104.162 27.9915 104.162 26.6642C104.162 26.5245 104.162 26.3847 104.162 26.3847V17.9316H107.096V26.3847C107.166 26.3847 106.886 30.7161 110.659 30.7161Z" fill="currentColor"/>
                <path d="M136.926 28.3405C136.088 29.8076 134.411 30.6459 132.595 30.6459C130.08 30.6459 128.054 29.0392 127.705 26.5242H139.93C139.93 26.1749 139.93 25.6859 139.93 25.3366C139.93 20.5861 136.717 17.5122 132.455 17.5122C128.194 17.5122 124.771 20.5162 124.771 25.3366C124.771 30.1569 128.194 33.2308 132.455 33.2308C135.11 33.2308 137.625 32.113 139.022 29.8775L136.926 28.3405ZM132.525 20.2368C134.97 20.2368 136.717 21.7737 137.136 24.2887H127.774C128.124 21.7038 130.01 20.2368 132.525 20.2368Z" fill="currentColor"/>
                <path d="M80.9681 17.582C78.8723 17.582 76.7066 18.5601 75.7286 20.2367V17.8615H72.7944V40.2168H75.7286V30.7158C76.7066 32.4623 78.8723 33.3006 80.9681 33.3006C85.0898 33.3006 88.513 30.2966 88.513 25.4762C88.513 20.7257 85.0898 17.582 80.9681 17.582ZM80.6886 30.576C78.2435 30.576 75.6587 28.8295 75.6587 25.616C75.6587 22.4024 78.1737 20.3066 80.8284 20.3066C83.5529 20.3066 85.7186 22.3325 85.7186 25.3365C85.6487 28.4104 83.3433 30.576 80.6886 30.576Z" fill="currentColor"/>
                <path d="M122.605 9.68799H119.67V32.9515H122.605V9.68799Z" fill="currentColor"/>
                <path d="M64.4113 17.4424C64.3414 17.4424 64.2716 17.4424 64.2017 17.4424C64.2017 17.4424 61.6867 17.4424 59.3115 18.4204L59.5909 19.1889L60.1498 20.7957C60.9881 20.4464 62.3853 20.0272 64.2017 19.9574C64.2716 19.9574 64.3414 19.9574 64.4113 19.9574C67.6249 19.9574 67.6947 22.8915 67.6947 22.8915V23.6599L62.6648 23.5901C62.3155 23.5901 60.2895 23.5901 58.8225 24.9873C58.4732 25.3366 58.1937 25.6859 57.9841 26.1051C57.7047 26.7338 57.4951 27.4324 57.4951 28.2009C57.4951 29.1789 57.7746 30.0871 58.1937 30.8556C58.4033 31.2049 58.6827 31.5542 58.9622 31.8336C59.9402 32.7418 61.3374 33.3007 62.8744 33.3007C63.0141 33.3007 63.1538 33.3007 63.2237 33.3007C64.9702 33.2308 66.577 32.5322 67.6249 30.8556V32.9514H70.2097V23.4504C70.2796 21.0053 68.7426 17.4424 64.4113 17.4424ZM63.1538 30.9254C62.2456 30.9953 60.1498 30.5063 60.1498 28.2009C60.1498 27.5721 60.7087 26.1051 62.5251 26.1051C64.3414 26.1051 67.555 26.1051 67.555 26.1051C67.6249 28.8995 65.9482 30.7857 63.1538 30.9254Z" fill="currentColor"/>
                <path d="M49.1118 30.3667C44.4311 30.3667 40.8682 26.5942 40.8682 21.9136C40.8682 17.233 44.501 13.3906 49.1118 13.3906C51.3473 13.3906 53.3034 14.2988 54.7704 15.696L56.5169 13.3208C54.6307 11.5743 51.976 10.5264 49.1118 10.5264C42.8243 10.5264 37.8643 15.6262 37.8643 21.9136C37.8643 28.201 42.8243 33.3008 49.1118 33.3008C51.6966 33.3008 54.002 32.4625 55.8183 31.1351L54.8403 28.4106C53.2335 29.5284 51.0678 30.3667 49.1118 30.3667Z" fill="currentColor"/>
                <path d="M0 30.2965H3.63273V28.061H8.24351V30.2965H11.8064V12.9712H0V30.2965Z" fill="currentColor"/>
                <path d="M18.0938 8.08105C17.5349 8.08105 17.1157 8.50022 17.1157 9.0591C17.1157 9.61798 17.5349 10.0371 18.0938 10.0371C18.6526 10.0371 19.0718 9.61798 19.0718 9.0591C19.1417 8.57008 18.6526 8.08105 18.0938 8.08105Z" fill="currentColor"/>
                <path d="M18.0938 12.6221C17.5349 12.6221 17.1157 13.0412 17.1157 13.6001C17.1157 14.159 17.5349 14.5782 18.0938 14.5782C18.6526 14.5782 19.0718 14.159 19.0718 13.6001C19.1417 13.1111 18.6526 12.6221 18.0938 12.6221Z" fill="currentColor"/>
                <path d="M18.0938 17.2329C17.5349 17.2329 17.1157 17.6521 17.1157 18.211C17.1157 18.7698 17.5349 19.189 18.0938 19.189C18.6526 19.189 19.0718 18.7698 19.0718 18.211C19.1417 17.6521 18.6526 17.2329 18.0938 17.2329Z" fill="currentColor"/>
                <path d="M22.7744 8.08105C22.2155 8.08105 21.7964 8.50022 21.7964 9.0591C21.7964 9.61798 22.2155 10.0371 22.7744 10.0371C23.3333 10.0371 23.7525 9.61798 23.7525 9.0591C23.7525 8.57008 23.3333 8.08105 22.7744 8.08105Z" fill="currentColor"/>
                <path d="M22.7744 12.6221C22.2155 12.6221 21.7964 13.0412 21.7964 13.6001C21.7964 14.159 22.2155 14.5782 22.7744 14.5782C23.3333 14.5782 23.7525 14.159 23.7525 13.6001C23.7525 13.1111 23.3333 12.6221 22.7744 12.6221Z" fill="currentColor"/>
                <path d="M22.7744 17.2329C22.2155 17.2329 21.7964 17.6521 21.7964 18.211C21.7964 18.7698 22.2155 19.189 22.7744 19.189C23.3333 19.189 23.7525 18.7698 23.7525 18.211C23.7525 17.6521 23.3333 17.2329 22.7744 17.2329Z" fill="currentColor"/>
                <path d="M27.3154 8.08105C26.7566 8.08105 26.3374 8.50022 26.3374 9.0591C26.3374 9.61798 26.7566 10.0371 27.3154 10.0371C27.8743 10.0371 28.2935 9.61798 28.2935 9.0591C28.2935 8.57008 27.8743 8.08105 27.3154 8.08105Z" fill="currentColor"/>
                <path d="M27.3154 12.6221C26.7566 12.6221 26.3374 13.0412 26.3374 13.6001C26.3374 14.159 26.7566 14.5782 27.3154 14.5782C27.8743 14.5782 28.2935 14.159 28.2935 13.6001C28.2935 13.1111 27.8743 12.6221 27.3154 12.6221Z" fill="currentColor"/>
                <path d="M27.3154 17.2329C26.7566 17.2329 26.3374 17.6521 26.3374 18.211C26.3374 18.7698 26.7566 19.189 27.3154 19.189C27.8743 19.189 28.2935 18.7698 28.2935 18.211C28.2935 17.6521 27.8743 17.2329 27.3154 17.2329Z" fill="currentColor"/>
                <path d="M6.07776 24.2885C2.79433 24.2186 0.0697788 26.8035 -8.15348e-05 30.017C-0.0699418 33.2306 2.51489 35.9552 5.79832 36.0949C9.08176 36.1647 11.7364 33.5799 11.8762 30.2965C11.8762 27.0829 9.29134 24.3584 6.07776 24.2885ZM7.89413 32.3224H3.91209V28.3404H7.89413V32.3224Z" fill="currentColor"/>
                <path d="M6.07776 24.2885C2.79433 24.2186 0.0697788 26.8035 -8.15348e-05 30.017C-0.0699418 33.2306 2.51489 35.9552 5.79832 36.0949C9.08176 36.1647 11.7364 33.5799 11.8762 30.2965C11.8762 27.0829 9.29134 24.3584 6.07776 24.2885ZM7.89413 32.3224H3.91209V28.3404H7.89413V32.3224Z" fill="white" fill-opacity="0.2"/>
                <path d="M5.93812 19.1189C9.21766 19.1189 11.8762 16.4603 11.8762 13.1808C11.8762 9.90126 9.21766 7.24268 5.93812 7.24268C2.65859 7.24268 0 9.90126 0 13.1808C0 16.4603 2.65859 19.1189 5.93812 19.1189Z" fill="white"/>
                <path d="M16.627 23.1709V35.3266H28.7826V23.1709H16.627ZM26.3375 31.9733H19.1419V30.4364H26.3375V31.9733ZM26.3375 27.9913H19.1419V26.4543H26.3375V27.9913Z" fill="currentColor"/>
            </g>
            <defs>
                <clipPath id="clip0">
                <rect width="140" height="47" fill="white"/>
                </clipPath>
            </defs>
            </svg>

            <div class="mt-2 sm:mt-6">
            <p class="text-gray-800 dark:text-neutral-200">
                " There one theme that you want. "
            </p>
            </div>

            <!-- Star -->
            <div class="flex justify-center mt-3 shrink-0 gap-x-1">
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            </div>
            <!-- End Star -->
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center ">
            <svg class="w-auto h-8 mx-auto text-gray-800 dark:text-neutral-200" width="140" height="47" viewBox="0 0 140 47" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.3991 8.15082C20.3991 9.61789 19.1416 10.8754 17.6745 10.8754C16.2075 10.8754 14.95 9.61789 14.95 8.15082C14.95 6.68375 16.2075 5.42627 17.6745 5.42627C19.1416 5.42627 20.3991 6.68375 20.3991 8.15082ZM17.6745 13.1109C16.0678 13.1109 14.8103 14.3684 14.8103 15.9752C14.8103 17.582 16.0678 18.8394 17.6745 18.8394C19.2813 18.8394 20.5388 17.582 20.5388 15.9752C20.5388 14.2985 19.2813 13.1109 17.6745 13.1109ZM17.6745 20.7257C16.0678 20.7257 14.7404 22.053 14.7404 23.6598C14.7404 25.2666 16.0678 26.5939 17.6745 26.5939C19.2813 26.5939 20.6087 25.2666 20.6087 23.6598C20.6785 22.053 19.2813 20.7257 17.6745 20.7257ZM17.6745 28.4802C16.0678 28.4802 14.8103 29.7376 14.8103 31.3444C14.8103 32.9512 16.0678 34.2087 17.6745 34.2087C19.2813 34.2087 20.5388 32.9512 20.5388 31.3444C20.5388 29.8075 19.2813 28.4802 17.6745 28.4802ZM17.6745 36.3744C16.2075 36.3744 14.95 37.6319 14.95 39.0989C14.95 40.566 16.2075 41.8235 17.6745 41.8235C19.1416 41.8235 20.3991 40.566 20.3991 39.0989C20.3991 37.6319 19.2115 36.3744 17.6745 36.3744ZM25.2195 12.7616C23.4729 12.7616 22.0059 14.2287 22.0059 15.9752C22.0059 17.7217 23.4729 19.1887 25.2195 19.1887C26.966 19.1887 28.433 17.7217 28.433 15.9752C28.433 14.2287 26.966 12.7616 25.2195 12.7616ZM25.2195 20.3764C23.4031 20.3764 21.8662 21.8434 21.8662 23.7297C21.8662 25.546 23.3332 27.083 25.2195 27.083C27.0358 27.083 28.5728 25.6159 28.5728 23.7297C28.5728 21.8434 27.0358 20.3764 25.2195 20.3764ZM25.2195 28.1309C23.4729 28.1309 22.0059 29.5979 22.0059 31.3444C22.0059 33.0909 23.4729 34.558 25.2195 34.558C26.966 34.558 28.433 33.0909 28.433 31.3444C28.433 29.5979 26.966 28.1309 25.2195 28.1309ZM32.9739 19.9572C31.0179 19.9572 29.2714 21.564 29.2714 23.6598C29.2714 25.6159 30.8781 27.3624 32.9739 27.3624C35.0698 27.3624 36.6765 25.7556 36.6765 23.6598C36.5368 21.564 34.93 19.9572 32.9739 19.9572ZM10.0598 13.4602C8.73243 13.4602 7.61466 14.578 7.61466 15.9053C7.61466 17.2327 8.73243 18.3504 10.0598 18.3504C11.3871 18.3504 12.5049 17.2327 12.5049 15.9053C12.5049 14.578 11.457 13.4602 10.0598 13.4602ZM10.0598 21.075C8.59271 21.075 7.47494 22.1927 7.47494 23.6598C7.47494 25.1269 8.59271 26.2446 10.0598 26.2446C11.5268 26.2446 12.6446 25.1269 12.6446 23.6598C12.6446 22.1927 11.5268 21.075 10.0598 21.075ZM10.0598 28.8295C8.73243 28.8295 7.61466 29.9472 7.61466 31.2746C7.61466 32.6019 8.73243 33.7197 10.0598 33.7197C11.3871 33.7197 12.5049 32.6019 12.5049 31.2746C12.5049 29.9472 11.457 28.8295 10.0598 28.8295ZM2.445 21.4941C1.18752 21.4941 0.209473 22.4722 0.209473 23.7297C0.209473 24.9871 1.18752 25.9652 2.445 25.9652C3.70249 25.9652 4.68053 24.9871 4.68053 23.7297C4.68053 22.4722 3.70249 21.4941 2.445 21.4941Z" fill="currentColor"/>
            <path d="M64.4812 18.9092C64.2018 18.9092 63.9922 19.1886 63.9922 19.3982V38.7495C63.9922 39.0289 64.2716 39.2385 64.4812 39.2385H66.7866C67.066 39.2385 67.2756 38.9591 67.2756 38.7495V19.3982C67.2756 19.1188 66.9962 18.9092 66.7866 18.9092H64.4812Z" fill="currentColor"/>
            <path d="M65.7389 10.7358C64.4815 10.7358 63.5034 11.7139 63.5034 12.9714C63.5034 14.2289 64.4815 15.2069 65.7389 15.2069C66.9964 15.2069 67.9745 14.2289 67.9745 12.9714C67.9745 11.7139 66.9266 10.7358 65.7389 10.7358Z" fill="currentColor"/>
            <path d="M114.082 18.9092C113.803 18.9092 113.593 19.1886 113.593 19.3982V38.7495C113.593 39.0289 113.873 39.2385 114.082 39.2385H116.388C116.667 39.2385 116.877 38.9591 116.877 38.7495V19.3982C116.877 19.1188 116.597 18.9092 116.388 18.9092H114.082Z" fill="currentColor"/>
            <path d="M115.2 10.7358C113.942 10.7358 112.964 11.7139 112.964 12.9714C112.964 14.2289 113.942 15.2069 115.2 15.2069C116.457 15.2069 117.435 14.2289 117.435 12.9714C117.435 11.7139 116.457 10.7358 115.2 10.7358Z" fill="currentColor"/>
            <path d="M138.603 37.3525C138.743 37.2127 138.743 37.073 138.743 37.0031C138.743 36.8634 138.743 36.8634 138.743 36.8634C138.743 36.8634 138.743 36.7237 138.603 36.7237C138.603 36.7237 138.463 36.584 138.324 36.584C138.184 36.584 138.184 36.584 138.044 36.584H137.416V38.3305H137.695V37.7018H138.044L138.533 38.3305H138.813L138.184 37.562C138.463 37.6319 138.603 37.4922 138.603 37.3525ZM137.765 37.4922V36.8634H138.254C138.394 36.8634 138.533 36.8634 138.603 37.0031C138.743 37.0031 138.743 37.1429 138.743 37.2826C138.743 37.4223 138.743 37.562 138.603 37.562C138.463 37.562 138.324 37.7018 138.254 37.7018H137.765V37.4922Z" fill="currentColor"/>
            <path d="M138.114 35.8853C137.276 35.8853 136.507 36.6537 136.507 37.492C136.507 38.3304 137.276 39.0988 138.114 39.0988C138.952 39.0988 139.721 38.3304 139.721 37.492C139.721 36.5839 139.022 35.8853 138.114 35.8853ZM138.114 38.9591C137.276 38.9591 136.647 38.3304 136.647 37.492C136.647 36.6537 137.276 36.025 138.114 36.025C138.952 36.025 139.581 36.6537 139.581 37.492C139.581 38.3304 138.883 38.9591 138.114 38.9591Z" fill="currentColor"/>
            <path d="M83.6928 22.0531C83.9722 22.0531 84.1818 21.7737 84.1818 21.5641V19.2587C84.1818 18.9793 83.9024 18.7697 83.6928 18.7697H78.7327V11.3645C78.7327 11.0851 78.4533 10.8755 78.2437 10.8755H75.9383C75.6588 10.8755 75.4493 11.1549 75.4493 11.3645V18.7697H73.0042C72.7247 18.7697 72.5151 19.0491 72.5151 19.2587V21.5641C72.5151 21.8436 72.7946 22.0531 73.0042 22.0531H75.4493V33.2308C75.4493 36.6539 77.7547 38.8895 81.108 38.8895H83.5531C83.8325 38.8895 84.0421 38.61 84.0421 38.4004V36.0951C84.0421 35.8156 83.7626 35.606 83.5531 35.606H81.4573C79.8505 35.606 78.7327 34.4883 78.7327 32.7418V21.9833L83.6928 22.0531Z" fill="currentColor"/>
            <path d="M132.735 22.0531C133.014 22.0531 133.224 21.7737 133.224 21.5641V19.2587C133.224 18.9793 132.944 18.7697 132.735 18.7697H127.775V11.3645C127.775 11.0851 127.495 10.8755 127.286 10.8755H124.98C124.701 10.8755 124.491 11.1549 124.491 11.3645V18.7697H122.046C121.767 18.7697 121.557 19.0491 121.557 19.2587V21.5641C121.557 21.8436 121.837 22.0531 122.046 22.0531H124.491V33.2308C124.491 36.6539 126.797 38.8895 130.15 38.8895H132.595C132.874 38.8895 133.084 38.61 133.084 38.4004V36.0951C133.084 35.8156 132.805 35.606 132.595 35.606H130.36C128.753 35.606 127.635 34.4883 127.635 32.7418V21.9833L132.735 22.0531Z" fill="currentColor"/>
            <path d="M49.8106 22.053V38.5401C49.8106 38.8195 50.09 39.0291 50.2996 39.0291H52.605C52.8844 39.0291 53.094 38.7497 53.094 38.5401V22.053H58.5431C58.8226 22.053 59.0321 21.7736 59.0321 21.564V19.2586C59.0321 18.9792 58.7527 18.7696 58.5431 18.7696H53.094V14.4383C53.094 12.6918 54.3515 11.5041 55.8186 11.5041H58.5431C58.8226 11.5041 59.0321 11.2247 59.0321 11.0151V8.70973C59.0321 8.43028 58.7527 8.2207 58.5431 8.2207H55.9583C52.5351 8.2207 49.8106 11.085 49.8106 14.3684V18.7696H47.3655C47.086 18.7696 46.8765 19.049 46.8765 19.2586V21.564C46.8765 21.8435 47.1559 22.053 47.3655 22.053H49.8106Z" fill="currentColor"/>
            <path d="M106.258 21.2148C104.442 19.2587 101.857 18.1409 99.1321 18.1409C96.5473 18.1409 93.9625 19.2587 92.3557 20.8655V8.57008C92.3557 8.29064 92.0763 8.08105 91.8667 8.08105H89.5613C89.2818 8.08105 89.0723 8.3605 89.0723 8.57008V28.8994C89.0723 36.4443 94.1022 39.7278 99.0623 39.7278C103.952 39.7278 109.052 36.3745 109.052 28.8994C109.052 25.8954 108.074 23.1709 106.258 21.2148ZM99.0623 36.584C94.1022 36.584 92.2858 32.6719 92.2858 28.9693C92.2858 24.4284 95.0104 21.4244 99.0623 21.4244C103.114 21.4244 105.839 24.4982 105.839 28.9693C105.769 32.6719 104.022 36.584 99.0623 36.584Z" fill="currentColor"/>
            </svg>

            <div class="mt-2 sm:mt-6">
            <p class="text-gray-800 dark:text-neutral-200">
                " Great design and thorough documentation. "
            </p>
            </div>

            <!-- Star -->
            <div class="flex justify-center mt-3 shrink-0 gap-x-1">
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z" fill="currentColor"/>
            </svg>
            <svg class="text-blue-500 size-4" width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M49.6867 20.0305C50.2889 19.3946 49.9878 18.1228 49.0846 18.1228L33.7306 15.8972C33.4296 15.8972 33.1285 15.8972 32.8275 15.2613L25.9032 0.317944C25.6021 0 25.3011 0 25 0V42.6046C25 42.6046 25.3011 42.6046 25.6021 42.6046L39.7518 49.9173C40.3539 50.2352 41.5581 49.5994 41.2571 48.6455L38.5476 32.4303C38.5476 32.1124 38.5476 31.7944 38.8486 31.4765L49.6867 20.0305Z" fill="#cbd5e1"/>
                <path d="M0.313299 20.0305C-0.288914 19.3946 0.0122427 18.1228 0.915411 18.1228L16.2694 15.8972C16.5704 15.8972 16.8715 15.8972 17.1725 15.2613L24.0968 0.317944C24.3979 0 24.6989 0 25 0V42.6046C25 42.6046 24.6989 42.6046 24.3979 42.6046L10.2482 49.9173C9.64609 50.2352 8.44187 49.5994 8.74292 48.6455L11.4524 32.4303C11.4524 32.1124 11.4524 31.7944 11.1514 31.4765L0.313299 20.0305Z" fill="currentColor"/>
            </svg>
            </div>
            <!-- End Star -->
        </div>
        <!-- End Icon Block -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Testimonials -->


    {{-- <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto mb-8 text-center lg:mb-14">
        <h2 class="text-3xl font-bold text-gray-800 lg:text-4xl dark:text-neutral-200">
            Explore tools
        </h2>
        <p class="mt-3 text-gray-800 dark:text-neutral-200">
            The powerful and flexible theme for all kinds of businesses.
        </p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid max-w-3xl grid-cols-3 gap-6 mx-auto lg:gap-8">
        <!-- Icon Block -->
        <div class="text-center">
            <svg class="mx-auto text-gray-800 shrink-0 size-7 md:size-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="10" height="14" x="3" y="8" rx="2"/><path d="M5 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-2.4"/><path d="M8 18h.01"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="font-semibold text-gray-800 sm:text-lg dark:text-neutral-200">
                Responsive
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <svg class="mx-auto text-gray-800 shrink-0 size-7 md:size-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="font-semibold text-gray-800 sm:text-lg dark:text-neutral-200">
                Customizable
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="text-center">
            <svg class="mx-auto text-gray-800 shrink-0 size-7 md:size-9 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
            <div class="mt-2 sm:mt-6">
            <h3 class="font-semibold text-gray-800 sm:text-lg dark:text-neutral-200">
                24/7 Support
            </h3>
            </div>
        </div>
        <!-- End Icon Block -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="grid items-center grid-cols-2 gap-2 mt-10 sm:mt-20 md:grid-cols-4 sm:gap-6 lg:gap-8">
        <div class="w-full h-32">
            <img class="object-cover object-center size-full rounded-xl" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="object-cover object-center size-full rounded-xl" src="https://images.unsplash.com/photo-1587613991119-fbbe8e90531d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="object-cover object-center size-full rounded-xl" src="https://images.unsplash.com/photo-1554295405-abb8fd54f153?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->

        <div class="w-full h-32">
            <img class="object-cover object-center size-full rounded-xl" src="https://images.unsplash.com/photo-1640622300473-977435c38c04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
        </div>
        <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->

    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>

            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>

            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>

            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>

            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>

            <div class="relative bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <img class="w-full h-auto rounded-xl" src="https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Card Image">
                <div class="absolute top-0 start-0 end-0">
                  <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                      Card title
                    </h3>
                    <p class="mt-1 text-gray-800">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                      Last updated 5 mins ago
                    </p>
                  </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
