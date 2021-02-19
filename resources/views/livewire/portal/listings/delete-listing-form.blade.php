<div class="w-full max-w-lg mx-auto">
    <div class="bg-white shadow-sm sm:rounded-lg border-gray-200 border">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Remove
            </h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>
                    Mark your listing as sold or remove it from sale.
                </p>
            </div>
            <div class="mt-5 max-w-xl text-sm text-gray-900 font-semibold">
                <p>
                    Are you sure you want to remove this listing?
                </p>
            </div>
            <div class="mt-2">
                <button wire:click="deleteListing" wire:loading.attr="disabled" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                    Yes, remove
                </button>
            </div>
        </div>
    </div>
</div>
