<!DOCTYPE html>
<html>
    <head>
        <title>Add Item</title>
    </head>
    <body>
        <h1>Add Item</h1>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" required>
            <br>
            <label for="description">description</label>
            <textarea name="description" required></textarea>
            <br>
            <button type="submit">Add</button>
        </form>
        <a href="{{ route('items.index') }}">Back to List</a>
    </body>
</html>