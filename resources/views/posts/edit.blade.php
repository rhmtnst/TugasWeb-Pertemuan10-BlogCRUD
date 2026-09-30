@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <h1>Edit Post</h1>

    @if ($errors->any())
        <x-alert type="danger">
            Periksa kembali data yang dimasukkan.
        </x-alert>
    @endif

   <form
    method="POST"
    action="{{ route('posts.update', $post) }}"
    enctype="multipart/form-data"
>

        @csrf
        @method('PUT')

        <label for="title">Judul</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $post->title) }}"
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="body">Isi Post</label>

        <textarea
            id="body"
            name="body"
            rows="8"
        >{{ old('body', $post->body) }}</textarea>

        <label for="image">Gambar</label>

@if ($post->image)
    <div style="margin-bottom: 10px;">
        <p>Gambar saat ini:</p>

        <img
            src="{{ asset('storage/' . $post->image) }}"
            alt="{{ $post->title }}"
            style="
                width: 200px;
                max-height: 150px;
                object-fit: cover;
                border-radius: 6px;
            "
        >
    </div>
@endif

<input
    type="file"
    id="image"
    name="image"
    accept="image/*"
>

@error('image')
    <div class="error">{{ $message }}</div>
@enderror

        @error('body')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">
            Update Post
        </button>

        <a href="{{ route('posts.show', $post) }}">
            Batal
        </a>

    </form>

@endsection