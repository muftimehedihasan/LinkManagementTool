<!-- resources/views/links/create.blade.php -->

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <div class="container">
        <h1>Create New Link</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('links.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="original_url">Original URL</label>
                <input type="url" name="original_url" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="custom_domain">Custom Domain (optional)</label>
                <input type="url" name="custom_domain" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Shorten Link</button>
        </form>
    </div>
{{-- @endsection --}}
