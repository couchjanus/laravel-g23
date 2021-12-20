<h2>Edit Category</h2>

<form method="POST" action="{{ route('category.update', $category->id)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <div>
        <label>Name:</label>
        <input name="name" value="{{$category->name}}">
    </div>
    <div>
        <label>Status:</label>
        <input name="status" type="checkbox" <?= $category->name? 'checked':''?>>
    </div>
    <div>
        
        <input name="submit" type="submit">
    </div>
</form>