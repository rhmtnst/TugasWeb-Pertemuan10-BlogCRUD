<div style="
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
">

@if ($post->image)
    <img
        src="{{ asset('storage/' . $post->image) }}"
        alt="{{ $post->title }}"
        style="
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        "
    >
@endif

    <h2>{{ $post->title }}</h2>

    <p>
        {{ \Illuminate\Support\Str::limit($post->body, 150) }}
    </p>

    <a class="btn" href="{{ route('posts.show', $post) }}">
        Baca Selengkapnya
    </a>
</div>