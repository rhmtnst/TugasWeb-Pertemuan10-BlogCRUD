@extends('layouts.app')

@section('title', 'Buat Post')

@section('content')

    <h1>Buat Post Baru</h1>

    @if ($errors->any())
        <x-alert type="danger">
            Periksa kembali data yang dimasukkan.
        </x-alert>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

        @csrf

        <label for="title">Judul</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="body">Isi Post</label>
        <textarea
            id="body"
            name="body"
            rows="8"
        >{{ old('body') }}</textarea>

        <label for="image">Gambar</label>

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
            Simpan Post
        </button>

        <a href="{{ route('posts.index') }}">
            Batal
        </a>

    </form>

@endsection