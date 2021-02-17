<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-header.portal />
    </x-slot>

    <h1 class="sr-only">Profile</h1>

    <!-- Main column -->
    <div class="grid grid-cols-1 gap-4">
        <div>
            <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                <option selected="">My Account</option>
                <option>Company</option>
                <option>Team Members</option>
                <option>Billing</option>
            </select>
            </div>
            <div class="hidden sm:block">
            <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">

                <a href="#" aria-current="page" class="text-gray-900 rounded-l-lg  group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                    <span>Selling</span>
                    <span aria-hidden="true" class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>

                <a href="#" aria-current="false" class="text-gray-500 hover:text-gray-700  rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10">
                    <span>Buying</span>
                    <span aria-hidden="true" class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"></span>
                </a>

            </nav>
            </div>
        </div>

        <!-- Welcome panel -->
        <section aria-labelledby="profile-overview-title">
            <div class="rounded-lg bg-white overflow-hidden shadow">
                <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                <div class="bg-white p-6">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex sm:space-x-5">
                            <div class="flex-shrink-0">
                                <img class="mx-auto h-16 w-16 rounded-full" src="{{ $this->user->profile_photo_url }}">
                            </div>
                            <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $this->user->name }}</p>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-center sm:mt-0">
                            <a href="{{ route('marketplaceful::portal.profile') }}" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                View profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-mkt-portal>
