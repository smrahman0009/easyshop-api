<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex mb-4 px-4">
        @include('include.leftmenu')
        <div class="w-3/4 bg-gray-100 h-12 ml-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <a href="{{route('category.create')}}" style="text-decoration:none">
                    Create
                </a>
            </button>
            <hr>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Category Name</th>
                        <th class="px-4 py-2">Edit</th>
                        <th class="px-4 py-2">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                <td class="border px-4 py-2">{{$category->name}}</td>
                <td class="border px-4 py-2">
                    <a href="{{route('category.edit',$category->id)}}" 
                        class="bg-green-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
                        Edit
                    </a>
                </td>
                <td class="border px-4 py-2">
                <form action="{{route('category.destroy',$category->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" 
                        class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">
                        Delete
                    </button>
                </form>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-app-layout>
