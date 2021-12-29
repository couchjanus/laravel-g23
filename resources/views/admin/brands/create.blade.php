<x-admin-layout>

    <h2 class=" pt-12">Create brand</h2>

    <!-- Create by joker banny -->
    <div class="h-screen bg-indigo-100 flex justify-center items-center">
        <div class="w-full">
            <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="POST" action="/admin/brands">
                @csrf
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Create brand</h1>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Name</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name"
                        id="name" placeholder="brand name" />
                </div>
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Description</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="description" id="name" placeholder="brand description" />
                </div>
                <hr class="mt-4">
                <div class="flex flex-row-reverse p-3">

                    <div class="flex-initial">
                        <button type="submit"
                            class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">

                            <span class="pl-2 mx-1">Create</span>
                        </button>
                    </div>
                </div>
        </div>

        </form>
    </div>
    </div>


    </form>

</x-admin-layout>
