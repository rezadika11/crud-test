<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
       <!-- Card Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="mb-5 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                <span id="hs-soft-color-danger-label" class="font-bold">Error</span> {{ session('error') }}
              </div>
            @endif

            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-800">
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Name
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9 mb-4">
                        <div class="sm:flex">
                        <input id="af-account-full-name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg sm:mt-0 sm:first:ms-0 text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" name="name" placeholder="Name">
                        </div>
                        @error('name')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{ $message }}</p>
                        @enderror

                    </div>
                    <!-- End Col -->
                </div>
                <button type="submit" class="py-1 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-emerald-800 text-white hover:bg-emerald-900 focus:outline-none focus:bg-emerald-900 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
                <a href="{{ route('departments.index') }}" class="ml-1 mt-3 py-1 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:outline-none focus:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none">
                    Back
                  </a>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
