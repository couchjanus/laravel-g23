<h2>Create Category</h2>

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