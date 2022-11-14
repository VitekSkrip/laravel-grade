@props(['banners'])

<section class="bg-white">
    <div data-slick-carousel>
        @foreach ($banners as $banner) 
            <x-bannersSection.banner :banner="$banner"/>
        @endforeach
    </div>
</section>