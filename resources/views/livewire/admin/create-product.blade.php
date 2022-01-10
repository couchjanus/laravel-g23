
<div class="mt-5 pt-4">
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
    <form wire:submit.prevent="save">

        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white sm:p-6">

                <div class="md:grid grid-cols-6 md:gap-6">

                    <div class="col-span-3 sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Product name</label>
                        <input type="text" wire:model="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">Product price</label>
                        <input type="text" wire:model="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            Product description
                        </label>
                        <div class="mt-1">
                            <textarea id="about" wire:model="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Product description"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Brief description for your product.
                        </p>
                    </div>



                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Cover photo
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

                            <div class="space-y-1 text-center">
                                <div class="mx-3 flex mb-3">
                                    @if($pictures)
                                        @foreach($pictures as $picture)
                                            <img src="{{ $picture->temporaryUrl()   }}" width="120">
                                        @endforeach
                                    @endif

                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                </div>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Upload a file</span>

                                        <input id="file-upload" name="file-upload" type="file" wire:model="pictures" class="sr-only" multiple>
                                    </label>
                                    <p class="ml-3  text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>

                                    @error('pictures.*') <span class="error">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-span-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" wire:model="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Choose one of them...</option>
                            @foreach($categories as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                        <select id="brand" wire:model="brand_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Choose one of them...</option>
                            @foreach($brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                        <select id="tags" wire:model="tagids" multiple class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Choose one or more of them...</option>
                            @foreach($tags as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="col-span-6">
                        <fieldset>
                            <div>
                                <legend class="text-base font-medium text-gray-900">Product status</legend>

                            </div>
                            <div class="mt-4 space-y-4">
                                @foreach($pstatus as $key => $value)
                                    <div class="flex items-center">
                                        <input value="{{$key}}" wire:model="status" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">
                                            {{$value}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>

                </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" role="submit"  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create product
                        </button>
                    </div>

            </div>
        </div>
    </form>
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

</div>

