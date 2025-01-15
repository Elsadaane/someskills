<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('writer/css/styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-md p-3">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <main class="py-4">
            <header>
                <div class="container mb-5">
                    <div class="profile">
                        <div class="profile-image me-5">
                            <img src="{{ asset(Auth::guard('writer')->user()->image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="profile-user-settings">
                            <h1 class="profile-user-name">{{ Auth::guard('writer')->user()->name }}</h1>
                            <a href="{{ route('home') }}" class="btn profile-edit-btn">{{ __('back.back') }}</a>
                            <a href="#" class="btn profile-edit-btn" data-bs-toggle="modal" data-bs-target="#add_post">
                                <i class="fas fa-plus" aria-hidden="true"></i> {{ __('back.add_new_post') }}
                            </a>
                            <a href="{{ route('writer.edit', Auth::guard('writer')->user()->id) }}"
                                class="btn profile-settings-btn" aria-label="profile settings">
                                <i class="fas fa-cog" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="profile-stats my-3">
                            <ul>
                                <li><span class="profile-stat-count">{{ $date->count() }}</span> posts</li>
                                <li><span class="profile-stat-count">188</span> followers</li>
                                <li><span class="profile-stat-count">206</span> following</li>
                            </ul>
                        </div>

                        <div class="profile-bio">
                            <p><span class="profile-real-name">{{ Auth::guard('writer')->user()->bio }}</span></p>
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <div class="container">
                    <div class="gallery">
                        <div class="row">
                            @foreach ($date as $data)
                            <div class="gallery-item col-md-4" tabindex="0">
                                <a href="{{ route('posts_writer_detils', $data->id) }}">
                                    <div class="outer position-relative">
                                        <img src="{{ asset($data->image) }}" class="gallery-image img-fluid" alt="">

                                        @if ($data->status == 1)
                                            <span class="badge bg-success position-absolute top-0 start-0 m-2 p-2 text-white">
                                                تمت الموافقة عليه
                                            </span>
                                        @elseif ($data->status == 0)
                                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 p-2 text-white">
                                                لم تتم الموافقة عليه
                                            </span>
                                        @endif

                                        <div class="inner">
                                            <ul>
                                                <li><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                                                <li>
                                                    <i class="fas fa-comment" aria-hidden="true"></i>
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
                </div>
            </main>

            <!-- Modal -->
       <!-- Modal -->
<div class="modal fade" id="add_post" tabindex="-1" aria-labelledby="add_post" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="add_post">{{ __('back.add_post') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('writer.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <!-- Categories and Titles -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="posts_category_id" class="form-label">{{ __('back.category') }}</label>
                            <select class="form-select" id="posts_category_id" name="posts_category_id">
                                <option value="" disabled selected>{{ __('back.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ app()->getLocale() == 'ar' ? $category->name_category_ar : $category->name_category_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="title_ar" class="form-label">{{ __('back.title_ar') }}</label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder="عنوان المقال">
                        </div>
                        <div class="col-md-6">
                            <label for="title_en" class="form-label">{{ __('back.title_en') }}</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Post Title">
                        </div>
                    </div>

                    <!-- Content Areas -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-12">
                            <label for="content_ar" class="form-label">{{ __('back.content_ar') }}</label>
                            <textarea class="form-control" id="content_ar" name="content_ar" rows="4" placeholder="محتوى المقال"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="content_en" class="form-label">{{ __('back.content_en') }}</label>
                            <textarea class="form-control" id="content_en" name="content_en" rows="4" placeholder="Post Content"></textarea>
                        </div>
                    </div>

                    <!-- Image and Tags -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-12">
                            <label for="image" class="form-label">{{ __('back.image') }}</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="col-md-12">
                            <label for="tags" class="form-label">{{ __('back.tags') }}</label>
                            <select name="tags[]" id="tags" class="form-select" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success">{{ __('back.create_post') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
