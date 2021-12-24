<x-admin-layout>
    <div class="block w-full overflow-x-auto">
        <!-- Categories table -->
        <h2 class=" pt-12">Categories List</h2>
        <a href="{{ route('admin.categories.create') }}"><button>Add new category</button></a>
        <table class="items-center w-full bg-transparent border-collapse">
            <thead class="thead-light">
              <tr>
                <th
                  class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                  Category Id

                </th>
                <th
                  class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                  Category Name
                </th>
                <th
                  class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                  style="min-width:140px">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category):?>

              <tr>
                <th
                  class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                  {{$category->id}}
                </th>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    {{$category->name}}
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <a href="/category/{{ $category->id }}/edit"><button>Edit</button></a>
                </td>
              </tr>
              <?php endforeach?>
            </tbody>
          </table>
    </div>
</x-admin-layout>
