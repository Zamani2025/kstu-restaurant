<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p2">
                <a href="{{route("admin.categories.index")}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-xl text-white">All Categories</a>
            </div>
            <div class="p-6 m-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form enctype="multipart/form-data" method="POST" action="{{route("admin.categories.update", $category->id)}}">
                            @csrf
                            @method("PUT")
                            <div class="sm:col-span-12">      
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <div class="mt-1 mb-2">
                                    <input type="text" id="name" name="name" value="{{$category->name}}" aria-describedby="helper-text-explanation" class="@error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="category name">
                               </div>
                               @error('name')
                                  <div class="text-red-500 text-small">{{$message}}</div> 
                               @enderror
                            </div>
                            <div class="sm:col-span-12">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image">Upload file</label>
                                <div>
                                    <img src="{{Storage::url($category->image)}}" class="w-32 h-32 rounded-xl mb-2" />
                                </div>
                                <div class="mt-1 mb-2">       
                                <input class="@error('image') border-red-500 @enderror block w-full max-w-screen-2xl text-sm text-gray-900 bg-gray-50  rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" name="image" type="file">
                                </div> 
                                @error('image')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror                              
                            </div>
                            <div class="sm:col-span-12">
                                <label for="editors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                                <textarea id="editors" rows="5" class="@error('description') border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="category description" name="description">{{$category->description}}</textarea>
                                @error('description')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror 
                            </div>
                            <div class="mt-6 p-2">
                                
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update Category</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
