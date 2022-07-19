<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p2">
                <a href="{{route("admin.tables.index")}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-xl text-white">All Tables</a>
            </div>
            <div class="p-6 m-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form action="{{route("admin.tables.update", $table->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="sm:col-span-12">      
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <div class="mt-1 mb-2">
                                    <input type="text" id="name" value="{{$table->name}}" aria-describedby="helper-text-explanation" class="@error('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" placeholder="table name">
                               </div>
                               @error('name')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror 
                            </div>
                            <div class="sm:col-span-12">      
                                <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guest Number</label>
                                <div class="mt-1 mb-2">
                                    <input type="number" value="{{$table->guest_number}}" id="guest_number" aria-describedby="helper-text-explanation" class="@error('guest_number') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="guest number" name="guest_number">
                               </div>
                               @error('guest_number')
                                   <div class="text-red-500 text-small">{{$message}}</div> 
                                @enderror 
                            </div>
                            <div class="sm:col-span-12">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                                <select id="status" name="status" class="form-multiselect block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="status">
                                    @foreach(App\Enums\TableStatus::cases() as $status)
                                    <option value="{{$status->value}}" @selected($table->status->value == $status->value)>{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:col-span-12">
                                <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Location</label>
                                <select id="location" name="location" class=" block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="status">
                                    @foreach(App\Enums\TableLocation::cases() as $location)
                                    <option value="{{$location->value}}" @selected($table->location->value == $location->value)>{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-6 p-2">
                                
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Create Table</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
