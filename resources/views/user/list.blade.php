<x-layout.app>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-tl-lg sm:rounded-tr-lg flex flex-row items-center justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-4/5">
                    User list
                </div>
                <div class="p-6 w-1/5 ">
                    <a href="{{route('users.create')}}" class="px-2 py-1 border border-2 border-purple-400 rounded-md text-[12px] text-purple-400 hover:bg-purple-400 hover:text-white">
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
                        <th>User</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-t-2 text-[10px] border-gray-900 text-white uppercase">
                            <td class="p-2">
                                {{$user->name}}
                            </td>
                            <td class="p-2">{{$user->email}}</td>
                            <td class="p-2">
                                <div class="flex flex-row gap-2 items-center justify-center">
                                    <span class="block text-[9px] p-2 rounded-md shadow-md @if($user->ldap == 'si') bg-purple-600 @else bg-slate-800 text-slate-400 @endif "> {{ $user->ldap ? 'LDAP':'LOCAL'}} </span>
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
