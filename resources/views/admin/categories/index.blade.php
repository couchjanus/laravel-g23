<h2>Categories List</h2>
<a href="/categories/create"><button>Add new category</button></a>
<table>
    <tr>
        <th>Category Id</th>
        <th>Category Name</th>
        <th>Action</th>
    </tr>
<?php foreach ($categories as $category):?>
    <tr>
        <td>{{$category->id}}</td> 
        <td>{{$category->name}}</td>
        <td><a href="/category/{{ $category->id }}/edit"><button>Edit</button></a></td>
    </tr>
<?php endforeach?>
</table>