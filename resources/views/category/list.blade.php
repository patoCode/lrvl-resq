<x-layout.app>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-tl-lg sm:rounded-tr-lg flex flex-row items-center justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-4/5">
                    Category list
                </div>
                <div class="p-6 w-1/5 ">
                    <a href="{{route('categories.create')}}" class="px-2 py-1 border border-2 border-purple-400 rounded-md text-[12px] text-purple-400 hover:bg-purple-400 hover:text-white">
                        Nuevo
                    </a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 px-6 pt-2 pb-6">
                @if(session('success'))
                    <div class="border border-green-800 bg-green-200 text-green-800 font-extrabold p-2 rounded-md mb-4">
                        {{session('success')}}
                    </div>
                @endif
                    <table class="table w-full">
                        <thead>
                            <tr class="p-2 bg-gray-900 text-gray-500">
                                <th>Category</th>
                                <th>Code</th>
                                <th>Options</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr class="border-t-2 text-[10px] border-gray-900 text-white uppercase">
                                <td class="p-2">{{$category->name}}</td>
                                <td class="p-2">{{$category->code}}</td>
                                <td class="p-2">
                                    <div class="flex flex-row gap-2 items-start justify-start">
                                        <span class="block text-[9px] px-2 rounded-sm shadow-md @if($category->is_public) bg-purple-600 @else bg-slate-500 text-gray-800 @endif">Publico</span>
                                        <span class="block text-[9px] px-2 rounded-sm shadow-md @if($category->is_schedulable) bg-indigo-600 @else bg-slate-500 text-gray-800 @endif">Cronogramable</span>
                                        <span class="block text-[9px] px-2 rounded-sm shadow-md @if($category->is_promediable) bg-sky-600 @else bg-slate-500 text-gray-800 @endif">Promediable</span>
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="flex flex-col items-center justify-between gap-2">
                                        <a href="" class="border border-purple-400 rounded-md px-2 py-1 text-[12px] text-purple-400 w-full hover:bg-purple-400 hover:text-white">Edit</a>
                                        <a href="" class="border border-purple-400 rounded-md px-2 py-1 text-[12px] text-purple-400 w-full hover:bg-purple-400 hover:text-white">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</x-layout.app>
