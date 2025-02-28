<x-layout.app>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-tl-lg sm:rounded-tr-lg flex flex-row items-center justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-4/5">
                    New Category
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 px-6 pt-2 pb-6">
                @if ($errors->any())
                    <div class="bg-yellow-200 text-yellow-800 font-extrabold p-2 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('categories.store')}}" method="post" class="flex flex-col items-center justify-between w-3/5">
                    @csrf
                    <div class="flex flex-col gap-y-4 items-start justify-between">
                        <div class="w-full max-w-md min-w-[200px]">
                            <input name="name" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Category">
                        </div>
                        <div class="w-full max-w-md min-w-[200px]">
                            <input name="code" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" placeholder="Code">
                        </div>
                    </div>
                    <div class="flex flex-col items-start justify-start w-full ">
                        {{-- INICIO TOGGLE --}}
                        <div class="inline-flex items-center mt-2">
                            <label class="flex items-center cursor-pointer relative" for="check-1">
                                <input type="checkbox" name="promedia" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-1" />
                                <span class="absolute text-white opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                            <label class="cursor-pointer ml-2 text-slate-300 text-sm" for="check-1">
                                Promediable
                            </label>
                        </div>
                        <div class="inline-flex items-center mt-2">
                            <label class="flex items-center cursor-pointer relative" for="check-2">
                                <input type="checkbox" name="publica" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-2" />
                                <span class="absolute text-white opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            </label>
                            <label class="cursor-pointer ml-2 text-white text-sm" for="check-2">
                                Pública
                            </label>
                        </div>
                        <div class="inline-flex items-center mt-2">
                            <label class="flex items-center cursor-pointer relative" for="check-3">
                                <input type="checkbox" name="cronograma" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800" id="check-3" />
                                <span class="absolute text-white opacity-0 pointer-events-none peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            </label>
                            <label class="cursor-pointer ml-2 text-white text-sm" for="check-3">
                                Cronogramable
                            </label>
                        </div>
                        {{-- FIN TOGGLE --}}
                    </div>
                    <button type="submit" class="bg-blue-500 px-2 py-1 rounded-md block mt-2 w-full">Crear</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
