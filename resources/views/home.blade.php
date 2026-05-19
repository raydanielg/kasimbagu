@extends('layouts.app')

@section('content')
@include('partials.home.hero_top')
@include('partials.home.hero_video')
@include('partials.home.services')
@include('partials.home.countries')
@include('partials.home.why')
@include('partials.home.testimonials')
@include('partials.home.inquiry')
@include('partials.home.whatsapp')

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    new Swiper('.hero-slider', {
        effect: 'fade',
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        pagination: { el: '.hero-pagination', clickable: true },
    });

    new Swiper('.packages-slider', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.packages-slider .swiper-pagination', clickable: true },
        breakpoints: { 768: { slidesPerView: 2 }, 1200: { slidesPerView: 3 } },
    });

    new Swiper('.destinations-slider', {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: { delay: 3500, disableOnInteraction: false },
        pagination: { el: '.dest-pagination', clickable: true },
        breakpoints: { 576: { slidesPerView: 2 }, 992: { slidesPerView: 3 }, 1200: { slidesPerView: 4 } },
    });

    new Swiper('.testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: { delay: 4500, disableOnInteraction: false },
        pagination: { el: '.testimonials-slider .swiper-pagination', clickable: true },
    });

});
</script>
@endsection
