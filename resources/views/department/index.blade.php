<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-5 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                <span id="hs-soft-color-success-label" class="font-bold">Success </span> {{ session('success') }}
              </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('departments.create') }}" class="ml-3 mt-3 py-1 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Add New
                  </a>
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                          <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-700">
                                  <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">No</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                  </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($departments as $department )
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $department->name }}</td>
                                        <td class="flex px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            <a href="{{ route('departments.edit', $department->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="ml-3">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                                            </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
