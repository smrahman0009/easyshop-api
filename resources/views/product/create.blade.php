  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex mb-4 px-4">
        @include('include.leftmenu')
        <div class="w-3/4 bg-gray-100 h-12 ml-4">
        <form class="w-full max-w-sm" enctype="multipart/form-data" action="{{route('products.store')}}" method="post" >
            @csrf
                <div class="w-full md:items-center mb-6">
                   <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                      Name
                    </label>
                  </div>
                  <div class="md:w-3/2">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                    id="name" name="name" type="text" @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Product name is required!</p>
                        </div>
                    @enderror
                  </div>
                  <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="price">
                      Price
                    </label>
                  </div>
                  <div class="md:w-3/2">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                    id="price" name="price" type="text" @error('price') is-invalid @enderror">
                    @error('price')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Product price is required!</p>
                        </div>
                    @enderror
                  </div>
                  <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="discount">
                      Discount
                    </label>
                  </div>
                  <div class="md:w-3/2">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                    id="discount" name="discount" type="text" @error('discount') is-invalid @enderror">
                    @error('discount')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Product discount is required!</p>
                        </div>
                    @enderror
                  </div>
                  <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="quantity">
                      Quantity
                    </label>
                  </div>
                  <div class="md:w-3/2">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                    id="quantity" name="quantity" type="text" @error('quantity') is-invalid @enderror">
                    @error('quantity')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Product quantity is required!</p>
                        </div>
                    @enderror
                  </div>
                  <div class="md:w-auto mt-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category_id">
                      Color
                    </label>
                    <div class="relative">
                        <select name="category_id" id="category_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach ($colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                </div>   
                  <div class="md:w-auto mt-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="size_id">
                      Sizes
                    </label>
                    <div class="relative">
                        <select name="size_id" id="size_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach
                        </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                </div>   
                <div class="md:w-auto mt-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Subcategory
                  </label>
                  <div class="relative">
                      <select name="category_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                          @foreach ($subCategories as $subCategory)
                              <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                          @endforeach
                      </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
                <div class="md:w-1/2">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="image">
                    images
                  </label>
                </div>
                <div class="md:w-3/2">
                  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                                  id="image" name="images[]" type="file" @error('image') is-invalid @enderror" multiple>
                  @error('image')
                      <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                        <p>Product image is required!</p>
                      </div>
                  @enderror
                </div>   
                  <div class="md:w-1/2">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                      Description
                    </label>
                  </div>
                  <div class="md:w-3/2">
                    <textarea class="resize-x border rounded focus:outline-none focus:shadow-outline"
                                    name="description" id="description" @error('description') is-invalid @enderror" cols="50" rows="10">
                                  </textarea>
                    @error('description')
                        <div class="bg-orange-100 border-orange-500 text-orange-700 p-4" role="alert">
                          <p>Product description is required!</p>
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="md:flex md:items-center">
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
