@extends('backend.layouts.master')
@section('title', __('back.dashboard'))

@section('content')
@section('PagesTitle', __('back.dashboard'))
<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end ">
                        <!-- item-->
                        <a href="{{ route('Product.index') }}" class="dropdown-item">{{ __('back.all_products') }}</a>
                        <!-- item-->
                        <a href="{{ route('ProductCategoryArchives.index') }}"
                            class="dropdown-item">{{ __('back.archive') }}</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">{{ __('back.product') }}</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70"
                                data-height="70" data-fgcolor="#f05050 " data-bgcolor="#F9B9B9"
                                value="{{ $category_delete }}" data-skin="tron" data-angleoffset="180"
                                data-readonly="true" data-thickness=".15" readonly="readonly"
                                style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(240, 80, 80); padding: 0px; appearance: none;">
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $Product }} </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="{{ 'category.index' }}" class="dropdown-item">{{ __('back.Category') }}</a>
                        <!-- item-->
                        <a href="{{ 'categoryArchives.index' }}" class="dropdown-item">{{ __('back.archive') }}</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">{{ __('back.Category_posts') }}</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70"
                                data-height="70" data-fgcolor="#ffbd4a" data-bgcolor="#FFE6BA"
                                value="{{ $post_delete }}" data-skin="tron" data-angleoffset="180"
                                data-readonly="true" data-thickness=".15" readonly="readonly"
                                style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(255, 189, 74); padding: 0px; appearance: none;">
                        </div>
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $posts_category }} </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->


    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="{{ 'posts.index' }}" class="dropdown-item">{{ __('back.posts') }}</a>
                        <!-- item-->
                        <a href="{{ 'PostArchives.index' }}" class="dropdown-item">{{ __('back.archive') }}</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">{{ __('back.posts') }}</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70"
                                data-height="70" data-fgcolor="#35b8e0 " data-bgcolor="#B8E6F4"
                                value="{{ $posts_category_delete }}" data-skin="tron" data-angleoffset="180"
                                data-readonly="true" data-thickness=".15" readonly="readonly"
                                style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(53, 184, 224); padding: 0px; appearance: none;">
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $post }} </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->


    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="{{ 'CategoryOfProduct.index' }}"
                            class="dropdown-item">{{ __('back.categories') }}</a>
                        <!-- item-->
                        <a href="{{ 'CategoryOfProductArchives.index' }}"
                            class="dropdown-item">{{ __('back.archive') }}</a>
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">{{ __('back.category_product') }}</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div style="display:inline;width:70px;height:70px;"><canvas width="87" height="87"
                                style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70"
                                data-height="70" data-fgcolor="#10c469" data-bgcolor="#AAE2C6"
                                value="{{ $Product_delete }}" data-skin="tron" data-angleoffset="180"
                                data-readonly="true" data-thickness=".15" readonly="readonly"
                                style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(16, 196, 105); padding: 0px; appearance: none;">
                        </div>
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $category }} </h2>
                        <p class="text-muted mb-1">Revenue today</p>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->

</div>
@endsection
