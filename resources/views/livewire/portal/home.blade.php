<div>
    <h1 class="sr-only">Profile</h1>
    <!-- Main column -->
    <div class="grid grid-cols-1 gap-4">
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
                            <a href="#" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                View profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
