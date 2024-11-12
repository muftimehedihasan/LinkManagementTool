Show the form for editing the specified resource.

<!-- resources/views/links/edit.blade.php -->

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
    <div class="container">
        <h1>Edit Link</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('links.update', $link->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="original_url">Original URL</label>
                <input type="text" class="form-control" value="{{ $link->original_url }}" disabled>
            </div>

            <div class="form-group mt-3">
                <label for="custom_domain">Custom Domain (optional)</label>
                <input type="url" name="custom_domain" class="form-control" value="{{ $link->custom_domain }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Link</button>
        </form>
    </div>
{{-- @endsection --}}
