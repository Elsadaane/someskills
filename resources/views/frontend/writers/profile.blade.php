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
    <link href="css/app.css" rel="stylesheet">
    <!-- External CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('writer/css/styles.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-md p-3">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                </div>
            </div>
        </nav>

        <main class="py-4">

            <header>

                <div class="container" style="margin-bottom: 100px;">

                    <div class="profile">

                        <div class="profile-image mr-5">

                            <img src="{{ asset($writer->image) }}" class="img-fluid" alt="">


                        </div>

                        <div class="profile-user-settings">

                            <h1 class="profile-user-name">{{ $writer->name }}</h1>

                        </div>

                        <div class="profile-stats" style="margin: 30px 0px;">

                            <ul>

                                <li><span class="profile-stat-count">{{ $data->count() }}</span> posts</li>

                                <li><span class="profile-stat-count">188</span> followers</li>
                                <li><span class="profile-stat-count">206</span> following</li>
                            </ul>

                        </div>

                        <div class="profile-bio">

                            <p><span class="profile-real-name">{{ $writer->bio }}</span>
                            </p>

                        </div>

                    </div>
                    <!-- End of profile section -->

                </div>
                <!-- End of container -->

            </header>

            <main>

                <div class="container">

                    <div class="gallery">
                        <div class="row">

                            @foreach ($data as $data)
                                <div class="gallery-item col-md-4" tabindex="0">
                                    <a href="{{ route('posts_writer_detils', $data->id) }}">
                                        <div class="outer">

                                            <img src="{{ asset($data->image) }}" class="gallery-image img-fluid"
                                                alt="">
                                            <div class="inner">
                                                <ul>
                                                    <li class=""><i class="fas fa-heart" aria-hidden="true"></i>
                                                        56
                                                    </li>
                                                    <li class=""><i class="fas fa-comment" aria-hidden="true"></i>
                                                        {{ app()->getLocale() == 'ar' ? $data->title_ar : $data->title_en }}
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </a>


                                </div>
                            @endforeach



                        </div>
                    </div>
                    <!-- End of gallery -->


                </div>
                <!-- End of container -->

            </main>


    </div>



    <script src="{{ asset('writer/js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('writer/js/popper.min.js') }}"></script>
    <script src="{{ asset('writer/js/bootstrap.min.js') }}"></script>
</body>

</html>
