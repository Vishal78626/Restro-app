<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end p-2 m-2">
                <a href="{{ route('admin.menus.create') }}" style="background-color: rgb(99, 99, 241);"  class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">New Menu</a>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $menu->name }}
                                </th>
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ Storage::url($menu->image) }}" class="w-16 h-16 rounded" />
                                </th>
                                <th
                                    class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $menu->price }}
                                </th>
                                <th
                                    class="px-4 py-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-500 rounded-lg text-white">Edit</a>

                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-500 rounded-lg text-white"
                                            method="POST"
                                            action="{{ route('admin.menus.destroy', $menu->id) }}"
                                            onsubmit="return confirm('Are you sure?');"
                                            >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
