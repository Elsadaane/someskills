<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- External CSS Files -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-md p-3">
            <div class="container">
                <h1>

                    <a style="font-size: 20px" class="navbar-brand" href="">
                        <i class="fab fa-instagram"></i> edit profile
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="contianer mt-5">
                <div class=" w-75 mx-auto text-center">
                    <div>
                        <img src="{{ asset($data->image) }}" class="img-fluid" style="height: 400px" alt="">
                    </div>
                    <div class="mt-5 w-75 mx-auto">
                        <form action="{{ route('writer.update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="text" placeholder="change Title" value="{{ $data->name }}" name="name"
                                class="form-control form-control-lg text-center">
                            <input type="text" placeholder="change Title" value="{{ $data->bio }}" name="bio"
                                class="form-control form-control-lg text-center">
                            <input type="file" placeholder="change Title" name="image"
                                class="form-control form-control-lg text-center">
                            <button type="submit" class="btn profile-edit-btn mt-5">Update</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>
    </div>



    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
