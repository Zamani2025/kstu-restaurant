<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p2">
                <a href="{{route("admin.menus.index")}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-xl text-white">All Menus</a>
            </div>
            <div class="p-6 m-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form enctype="multipart/form-data" action="{{route("admin.menus.update", $menu->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="sm:col-span-12">      
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <div class="mt-1 mb-2">
                                    <input type="text" value="{{$menu->name}}" id="name" aria-describedby="helper-text-explanation" class="@error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name">
                               </div>
                               @error('name')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror 
                            </div>
                            <div class="sm:col-span-12">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                                <div>
                                    <img src="{{Storage::url($menu->image)}}" alt="" class="w-28 h-28 rounded-lg mb-2">
                                </div>
                                <div class="mt-1 mb-2">       
                                <input class="@error('image') border-red-500 @enderror block w-full text-sm text-gray-900 bg-gray-50  rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" name="image" type="file">
                                </div>
                                @error('image')
                                    <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror                                
                            </div>
                            <div class="sm:col-span-12">      
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                                <div class="mt-1 mb-2">
                                    <input type="number" value="{{$menu->price}}" min="0.00" max="10000.00" step="0.01" id="price" aria-describedby="helper-text-explanation" class=" @error('price') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="price">
                               </div>
                               @error('price')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror
                            </div>
                            <div class="sm:col-span-12">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Categories</label>
                                <div class="mt-1mb-2">
                                    <select id="description" name="categories[]" class="form-multiselect block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @selected($menu->categories->contains($category))>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-12">
                                <label for="editors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                                <textarea id="editors" rows="5" class="block @error('description') border-red-500 @enderror p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="description">{{$menu->description}}</textarea>
                                @error('description')
                                    <div class="text-red-500 text-small">{{$message}}</div> 
                                 @enderror 
                            </div>
                            <div class="mt-6 p-2">  
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update Menu</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
