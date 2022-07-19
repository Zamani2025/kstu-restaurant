<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p2">
                <a href="{{ route('admin.categories.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-xl text-white">New Category</a>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Image
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                
                                <td class="py-4 px-6">
                                    {{ $category->name }}
                                </td>
                                <td class="py-4 px-6">
                                    <img src="{{ Storage::url($category->image) }}" class="w-16 h016 rounded" />
                                </td>
                                <td class="py-4 px-6">
                                    {{ $category->description }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex space-x-2">
                                        
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="px-4 py-2 bg-blue-300 hover:bg-blue-500 text-white rounded-lg">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                        class="px-4 py-2 bg-red-300 hover:bg-red-500 text-white rounded-lg"
                                        method="post" onsubmit="return confirm('Are you sure?');" >
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">Delete</button>
                                    
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
