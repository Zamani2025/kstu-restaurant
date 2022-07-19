<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p2">
                <a href="{{ route('admin.reservation.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-xl text-white">All Reservations</a>
            </div>
            <div class="p-6 m-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form action="{{ route('admin.reservation.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="sm:col-span-12">
                            <label for="fname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First
                                Name</label>
                            <div class="mt-1 mb-2">
                                <input type="text" value="{{ $reservation->first_name }}" id="fname"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('first_name') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="first_name" placeholder="first name">
                            </div>
                            @error('first_name')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="lname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last
                                Name</label>
                            <div class="mt-1 mb-2">
                                <input type="text" id="lname" value="{{ $reservation->last_name }}"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('last_name') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="last_name" placeholder="last name">
                            </div>
                            @error('last_name')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                            <div class="mt-1 mb-2">
                                <input type="email" id="email" value="{{ $reservation->email }}"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('email') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="email" placeholder="email">
                            </div>
                            @error('email')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone
                                Number</label>
                            <div class="mt-1 mb-2">
                                <input type="tel" id="phone" value="{{ $reservation->tel_number }}"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('tel_number') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="phone number" name="tel_number">
                            </div>
                            @error('tel_number')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="res_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Reservation
                                Date</label>
                            <div class="mt-1 mb-2">
                                <input type="datetime-local" value="{{ $reservation->res_date->format('Y-m-d\TH:i:s') }}" id="res_date"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('res_date') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="res_date">
                            </div>
                            @error('res_date')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="guest_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guest
                                Number</label>
                            <div class="mt-1 mb-2">
                                <input type="number" value="{{ $reservation->guest_number }}" id="guest_number"
                                    aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 @error('guest_number') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="guest_number">
                            </div>
                            @error('guest_number')
                                <div class="text-red-500 text-small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-12">
                            <label for="table_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Table</label>
                            <select id="table_id" name="table_id"
                                class="form-multiselect block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="status">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }} @selected($table->id == $reservation->table_id)">{{ $table->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-6 p-2">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Create
                                Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
