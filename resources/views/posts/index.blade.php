@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')

    <h1>Blog CRUD</h1>

    @if (session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @endif

    @if (session('error'))
    <x-alert type="danger">
        {{ session('error') }}
    </x-alert>
@endif

    @if ($errors->any())
        <x-alert type="danger">
            Periksa kembali data yang dimasukkan.
        </x-alert>
    @endif

    <a class="btn" href="{{ route('posts.create') }}">
        + Buat Post
    </a>


    <form method="GET" action="{{ route('posts.index') }}" style="margin-top: 15px;">

    <input
        type="text"
        name="search"
        placeholder="Cari judul atau isi post..."
        value="{{ $search ?? '' }}"
        style="width: 70%; display: inline-block;"
    >

    <button type="submit" class="btn">
        🔍 Cari
    </button>

    @if (!empty($search))
        <a href="{{ route('posts.index') }}" style="margin-left: 10px;">
            Reset
        </a>
    @endif

</form>
    <hr>

    @forelse ($posts as $post)

        <x-card :post="$post" />

    @empty

        <p>Belum ada post.</p>

    @endforelse

<div class="pagination">

    @if ($posts->onFirstPage())
        <span class="disabled">« Previous</span>
    @else
        <a href="{{ $posts->previousPageUrl() }}">« Previous</a>
    @endif

    @for ($page = 1; $page <= $posts->lastPage(); $page++)

        @if ($page == $posts->currentPage())
            <span class="active">{{ $page }}</span>
        @else
            <a href="{{ $posts->url($page) }}">{{ $page }}</a>
        @endif

    @endfor

    @if ($posts->hasMorePages())
        <a href="{{ $posts->nextPageUrl() }}">Next »</a>
    @else
        <span class="disabled">Next »</span>
    @endif

</div>

@endsection