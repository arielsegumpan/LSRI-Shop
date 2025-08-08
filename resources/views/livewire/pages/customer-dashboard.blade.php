<div>
    <div class="max-w-[60rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-12 mx-auto">

        <div class="text-center mx-auto mb-5">
            <h2 class="text-2xl text-gray-800 dark:text-white flex flex-row gap-x-2 items-center align-middle justify-center">
                <svg class="size-7 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>

                {{ __('Dashboard') }}
            </h2>
        </div>

        <div class="flex justify-center">

            <div
                class="flex bg-gray-100 hover:bg-gray-200 rounded-lg transition p-1 dark:bg-neutral-700 dark:hover:bg-neutral-600">
                <nav class="flex justify-center gap-x-2" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 dark:hs-tab-active:bg-gray-800 py-3 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm text-gray-500 hover:text-gray-700 focus:outline-hidden focus:text-gray-700 font-medium rounded-lg hover:hover:text-neutral-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-white dark:focus:text-white active"
                        id="segment-item-1" aria-selected="true" data-hs-tab="#segment-1" aria-controls="segment-1"
                        role="tab">

                        <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        {{ __('Orders') }}

                    </button>
                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 dark:hs-tab-active:bg-gray-800 py-3 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm text-gray-500 hover:text-gray-700 focus:outline-hidden focus:text-gray-700 font-medium rounded-lg hover:hover:text-neutral-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-white dark:focus:text-white"
                        id="segment-item-2" aria-selected="false" data-hs-tab="#segment-2" aria-controls="segment-2"
                        role="tab">

                        <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                        {{ __('Request') }}

                    </button>
                    <button type="button"
                        class="hs-tab-active:bg-white hs-tab-active:text-gray-700 hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 dark:hs-tab-active:bg-gray-800 py-3 px-4 inline-flex items-center gap-x-2 bg-transparent text-sm text-gray-500 hover:text-gray-700 focus:outline-hidden focus:text-gray-700 font-medium rounded-lg hover:hover:text-neutral-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-white dark:focus:text-white"
                        id="segment-item-3" aria-selected="false" data-hs-tab="#segment-3" aria-controls="segment-3"
                        role="tab">

                        <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                        {{ __('Logout') }}

                    </button>
                </nav>
            </div>
        </div>

        <div class="mt-3">

            <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">

                 <div
                    class="flex flex-row align-items-center items-center justify-between gap-x-3 text-gray-800 dark:text-neutral-200 mb-5">

                    <h4 class="font-semibold">
                        {{ __('Your orders') }}
                    </h4>

                    <a href="{{ route('page.shop') }}" class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-red-500 border border-transparent rounded-lg gap-x-2 hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">

                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        {{ __('Get Order') }}
                    </a>
                </div>


                <!--Order Tab-->
                <div class="flex">
                    <div class="border-e-2 border-gray-200 dark:border-neutral-700">
                        <nav class="flex flex-col space-y-2 md:space-y-4 lg:space-y-5" aria-label="Tabs" role="tablist"
                            aria-orientation="vertical">

                            <button type="button"
                                class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                                id="vertical-tab-with-border-item-1" aria-selected="true"
                                data-hs-tab="#order-vertical-tab-with-border-1" aria-controls="vertical-tab-with-border-1"
                                role="tab">

                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>

                                {{ __('In Progress') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-amber-500 hs-tab-active:text-amber-600 dark:hs-tab-active:text-amber-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-amber-600 focus:outline-hidden focus:text-amber-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-amber-500"
                                id="vertical-tab-with-border-item-2" aria-selected="false"
                                data-hs-tab="#order-vertical-tab-with-border-2" aria-controls="vertical-tab-with-border-2"
                                role="tab">
                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                </svg>

                                {{ __('Shipped') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-green-500 hs-tab-active:text-green-600 dark:hs-tab-active:text-green-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-green-600 focus:outline-hidden focus:text-green-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-green-500"
                                id="vertical-tab-with-border-item-3" aria-selected="false"
                                data-hs-tab="#order-vertical-tab-with-border-3" aria-controls="vertical-tab-with-border-3"
                                role="tab">
                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                </svg>

                                {{ __('Delivered') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-red-500 hs-tab-active:text-red-600 dark:hs-tab-active:text-red-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-red-600 focus:outline-hidden focus:text-red-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-red-500"
                                id="vertical-tab-with-border-item-3" aria-selected="false"
                                data-hs-tab="#order-vertical-tab-with-border-3" aria-controls="vertical-tab-with-border-3"
                                role="tab">
                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                {{ __('Cancelled') }}
                            </button>
                        </nav>
                    </div>

                    <div class="ms-3 w-full">
                        <div id="order-vertical-tab-with-border-1" class="w-full" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-1">

                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div
                                            class="border border-gray-200 rounded-lg overflow-hidden dark:border-neutral-700">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Name</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Age</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Address</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            John Brown</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            45</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            New York No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            Jim Green</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            27</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            London No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            Joe Black</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            31</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            Sidney No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="order-vertical-tab-with-border-2" class="hidden" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-2">
                            <p class="text-gray-500 dark:text-neutral-400">
                                This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em>
                                item's tab body.
                            </p>
                        </div>
                        <div id="order-vertical-tab-with-border-3" class="hidden" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-3">
                            <p class="text-gray-500 dark:text-neutral-400">
                                This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em>
                                item's tab body.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End of Order Tab-->

            </div>

            <div id="segment-2" class="hidden" role="tabpanel" aria-labelledby="segment-item-2">

                <div
                    class="flex flex-row align-items-center items-center justify-between gap-x-3 text-gray-800 dark:text-neutral-200 mb-5">

                    <div>
                        <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                        <h4 class="font-semibold">
                            {{ __('Your requests') }}
                        </h4>
                    </div>

                    <a href="#!" class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-red-500 border border-transparent rounded-lg gap-x-2 hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">

                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                        {{ __('New request') }}
                    </a>
                </div>

                <!--Request Tab-->
                <div class="flex">
                    <div class="border-e-2 border-gray-200 dark:border-neutral-700">
                        <nav class="flex flex-col space-y-2 md:space-y-4 lg:space-y-5" aria-label="Tabs" role="tablist"
                            aria-orientation="vertical">
                            <button type="button"
                                class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                                id="vertical-tab-with-border-item-1" aria-selected="true"
                                data-hs-tab="#request-vertical-tab-with-border-1" aria-controls="vertical-tab-with-border-1"
                                role="tab">

                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>


                                {{ __('Pending') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-amber-500 hs-tab-active:text-amber-600 dark:hs-tab-active:text-amber-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-amber-600 focus:outline-hidden focus:text-amber-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-amber-500"
                                id="vertical-tab-with-border-item-2" aria-selected="false"
                                data-hs-tab="#vertical-tab-with-border-2" aria-controls="vertical-tab-with-border-2"
                                role="tab">

                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>

                                {{ __('In Progress') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-green-500 hs-tab-active:text-green-600 dark:hs-tab-active:text-green-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-green-600 focus:outline-hidden focus:text-green-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-green-500"
                                id="vertical-tab-with-border-item-3" aria-selected="false"
                                data-hs-tab="#request-vertical-tab-with-border-3" aria-controls="vertical-tab-with-border-3"
                                role="tab">

                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>


                                {{ __('Completed') }}
                            </button>
                            <button type="button"
                                class="hs-tab-active:border-red-500 hs-tab-active:text-red-600 dark:hs-tab-active:text-red-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-red-600 focus:outline-hidden focus:text-red-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-red-500"
                                id="vertical-tab-with-border-item-3" aria-selected="false"
                                data-hs-tab="#request-vertical-tab-with-border-3" aria-controls="vertical-tab-with-border-3"
                                role="tab">
                                <svg class="size-5 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                {{ __('Cancelled') }}
                            </button>
                        </nav>
                    </div>

                    <div class="ms-3 w-full">
                        <div id="request-vertical-tab-with-border-1" class="w-full" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-1">

                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div
                                            class="border border-gray-200 rounded-lg overflow-hidden dark:border-neutral-700">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Name</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Age</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Address</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            John Brown</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            45</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            New York No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            Jim Green</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            27</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            London No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                            Joe Black</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            31</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                            Sidney No. 1 Lake Park</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <button type="button"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-hidden focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">Delete</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div id="request-vertical-tab-with-border-2" class="hidden" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-2">
                            <p class="text-gray-500 dark:text-neutral-400">
                                This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em>
                                item's tab body.
                            </p>
                        </div>
                        <div id="request-vertical-tab-with-border-3" class="hidden" role="tabpanel"
                            aria-labelledby="vertical-tab-with-border-item-3">
                            <p class="text-gray-500 dark:text-neutral-400">
                                This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em>
                                item's tab body.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End of Request Tab-->


            </div>

            <div id="segment-3" class="hidden" role="tabpanel" aria-labelledby="segment-item-3">
                <p class="text-gray-500 dark:text-neutral-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab
                    body.
                </p>
            </div>
        </div>

    </div>
</div>
