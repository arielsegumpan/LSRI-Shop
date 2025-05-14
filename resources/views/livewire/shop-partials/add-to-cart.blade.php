<div>
    <button wire:click.prevent="addToCart" type="button" class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-center text-white align-middle bg-red-600 border border-transparent rounded-lg gap-x-2 hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
        {{ __('Add to cart') }}
         <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
             <path d="m5 11 4-7"></path>
             <path d="m19 11-4-7"></path>
             <path d="M2 11h20"></path>
             <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"></path>
             <path d="m9 11 1 9"></path>
             <path d="M4.5 15.5h15"></path>
             <path d="m15 11-1 9"></path>
         </svg>

        <div wire:loading wire:target="addToCart">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z"><animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
        </div>
     </button>
</div>
