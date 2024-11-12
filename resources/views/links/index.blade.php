{{-- Display a list of all links for the authenticated user --}}

<h1>Link Management Tool</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('links.create') }}">Create a New Link</a>

<ul>
    @foreach($links as $link)
        <li>
            <p>Original URL: {{ $link->original_url }}</p>
            <p>Short URL: <a href="{{ url($link->short_url) }}">{{ url($link->short_url) }}</a></p>
            <p>Clicks: {{ $link->click_count }}</p>
            <a href="{{ route('links.edit', $link) }}">Edit</a>
            <form action="{{ route('links.destroy', $link) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

