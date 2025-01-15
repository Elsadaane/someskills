<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- External CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-toggler-icon {
            background-color: #000;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            color: #007bff;
        }

        .btn {
            border-radius: 20px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #007bff;
            color: #fff;
        }

        .form-control {
            border-radius: 10px;
        }

        .com1 {
            margin-bottom: 1rem;
        }

        ul.list-group {
            padding: 0;
        }

        ul.list-group li {
            background-color: #fff;
            margin-bottom: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul.list-group li img {
            margin-right: 1rem;
        }

        ul.list-group li p {
            margin: 0;
        }

        .rounded-circle {
            border: 2px solid #007bff;
        }

        .img-fluid {
            border-radius: 10px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-md p-3">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container w-75 mx-auto mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <img src="{{ asset($data->image) }}" class="img-fluid" style="height:600px;" alt="">
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset(Auth::guard('writer')->user()->image) }}" width="50"
                                        class="rounded-circle p-3" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <h3 class="text-left mt-4">{{ Auth::guard('writer')->user()->name }}</h3>
                                </div>

                                @if (Auth::guard('writer')->check() && Auth::guard('writer')->id() === $data->writer_id)
                                    <div class="col-md-3">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('writer-edit_post', $data->id) }}">Edit</a>
                                        <form action="{{ route('writer.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mt-2" type="submit">Delete</button>
                                        </form>
                                    </div>
                                @endif


                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ Auth::guard('writer')->user()->name }}</h5>
                                <p class="card-text">
                                    {{ app()->getLocale() == 'ar' ? $data->title_ar : $data->title_en }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li>
                                    <div class="pr-2 pl-2 pt-3">
                                        <p>
                                            <img src="https://png.pngtree.com/element_our/20200610/ourmid/pngtree-character-default-avatar-image_2237203.jpg"
                                                class="rounded-circle p-3" width="50" alt="...">
                                            Comments User
                                        </p>
                                        <p>Some quick example text to comment.</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="com1">
                                        <input placeholder="Write a comment ..." type="text" name="comment"
                                            class="form-control lg">
                                    </div>
                                    <div class="com1">
                                        <select name="" id="" class="form-control lg">
                                            <option>😂</option>
                                            <option>🙂</option>
                                            <option>♥️</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
