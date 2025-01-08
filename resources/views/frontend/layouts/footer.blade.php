<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">Presento</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>{{ app()->getLocale() == 'ar' ? $footerData->name_ar : $footerData->name_en }}</p>
                    <p><strong>Subject : </strong>
                        {{ app()->getLocale() == 'ar' ? $footerData->subject_ar : $footerData->subject_en }}
                    </p>
                    <p class="mt-3"><strong>Phone:</strong> <span>{{ $footerData->phone }}</span></p>
                    <p><strong>Email:</strong> <span>{{ $footerData->email }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}" class="active">{{ __('front.Home') }}<br></a></li>
                    <li><a href="#about">{{ __('front.About') }}</a></li>
                    <li><a href="{{ route('Category') }}">{{ __('front.Blog') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 footer-links">
                <h4 class="text-center">Message</h4>
                <p class="text-center">
                    {{ app()->getLocale() == 'ar' ? $footerData->message_ar : $footerData->message_en }}
                </p>

            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Presento</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://MazonSoftware.com/">MazonSoftware</a> Distributed by <a
                href=“https://MazonSoftware.com>MazonSoftware
        </div>
    </div>

</footer>


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
