<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Blog CRUD')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
        }

        nav {
            background: #222;
            padding: 15px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: #222;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-danger {
            background: #c0392b;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .error {
            color: #c0392b;
            font-size: 14px;
        }

        .pagination {
    display: flex;
    gap: 8px;
    align-items: center;
    margin-top: 25px;
    margin-bottom: 30px;
}

.pagination a,
.pagination span {
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none;
    border: 1px solid #ddd;
    color: #222;
    background: white;
}

.pagination a:hover {
    background: #222;
    color: white;
}

.pagination .active {
    background: #222;
    color: white;
    border-color: #222;
}

.pagination .disabled {
    color: #aaa;
    background: #f5f5f5;
}
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('posts.index') }}">Blog</a>
        <a href="{{ route('posts.create') }}">Buat Post</a>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>