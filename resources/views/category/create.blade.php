<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex mb-4 px-4">
        @include('include.leftmenu')
        <div class="w-3/4 bg-gray-100 h-12 ml-4">
        <form class="w-full max-w-sm" action="{{route('category.store')}}" method="post">
            @csrf
                <div class="md:flex md:items-center mb-6">
                  <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                      Category Name
                    </label>
                  </div>
                  <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                    id="name" name="name" type="text" @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Category name is required!</p>
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="md:flex md:items-center">
                  <div class="md:w-1/2"></div>
                  <div class="md:w-2/3">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                      Create
                    </button>
                  </div>
                </div>
              </form>
        </div>
    </div>
</x-app-layout>
