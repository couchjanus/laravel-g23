<x-admin-layout>



<h2 class=" pt-12">Create Category</h2>


<!-- Create by joker banny -->
<div class="h-screen bg-indigo-100 flex justify-center items-center">
	<div class="w-full">
		<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="POST" action="/admin/category">
            @csrf
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Create Category</h1>
			<div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="username">Name</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name" id="name" placeholder="Category name" />
      </div>
      <div class="flex items-center pt-3"><input type="checkbox" class="w-4 h-4 text-black bg-gray-300 border-none rounded-md focus:ring-transparent" name="status"><label for="status" class="block ml-2 text-sm text-gray-900">Status</label></div>
      <hr class="mt-4">
      <div class="flex flex-row-reverse p-3">

         <div class="flex-initial">
            <button type="submit" class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md  hover:bg-red-200 hover:fill-current hover:text-red-600  focus:outline-none  transition duration-300 transform active:scale-95 ease-in-out">

               <span class="pl-2 mx-1">Create</span>
            </button>
         </div>
      </div>
   </div>

		</form>
	</div>
</div>

<form method="POST" action="/category">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div>
        <label>Name:</label>
        <input name="name" placeholder="Enter category name">
    </div>
    <div>
        <label>Status:</label>
        <input name="status" type="checkbox" checked>
    </div>
    <div>

        <input name="submit" type="submit">
    </div>
</form>

</x-admin-layout>
