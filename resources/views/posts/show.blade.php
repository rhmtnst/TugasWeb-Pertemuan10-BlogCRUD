@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h1>{{ $post->title }}</h1>

    <p>
        {{ $post->body }}
    </p>

    <hr>

    <a class="btn" href="{{ route('posts.edit', $post) }}">
        Edit Post
    </a>

<form
    method="POST"
    action="{{ route('posts.destroy', $post) }}"
    style="display: inline;"
>
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-danger"
        onclick="return confirm('Yakin ingin menghapus post ini?')"
    >
        Hapus Post
    </button>
</form>

    <a href="{{ route('posts.index') }}">
        Kembali
    </a>

@endsection