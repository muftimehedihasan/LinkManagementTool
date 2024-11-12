Show the form for creating a new resource.

<h1>Create a New Link</h1>

<form action="{{ route('links.store') }}" method="POST">
    @csrf
    <input type="url" name="original_url" placeholder="Enter Original URL" required>
    <button type="submit">Create Short Link</button>
</form>

<a href="{{ route('links.index') }}">Back to Links</a>
