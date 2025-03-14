<!DOCTYPE html>
<html lang="en">

@include('master.head')

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        @include('master.header')
        <!-- end: Header -->
        <!-- Inspiro Slider -->
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
            <!-- Slide 1 -->
            <div class="slide kenburns" data-bg-image="{{ asset('storage/photos/' . $banner->banner) }}">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-center text-light">
                        <!-- Captions -->
                        <h2 style="font-size:40px" data-caption-animate="zoom-out">Temukan Wawasan Baru Yang Menarik
                        </h2>
                        <p>"MyArtikel" adalah portal yang saya buat untuk anda jelajahi. Temukan berbagai <br>artikel
                            yang informatif yang bisa menambah insight anda.</p>
                        {{-- <div><a href="#welcome" class="btn btn-primary scroll-to">Explore more</a></div> --}}
                        </span>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
            {{-- <div class="slide" data-bg-video="video/pexels-waves.mp4">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-start text-light">
                        <!-- Captions -->
                        <h1>220+ Laytout Demos</h1>
                        <p class="text-small">POLO is packed with 220+ pre-made layouts that allow you to quickly jumpstart your project. Completely customizable for creating your own designs.</p>
                        <div><a href="#welcome" class="btn btn-primary scroll-to">Explore more</a></div>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div> --}}
        </div>

        <section id="page-title">
            <div class="container">
                <div class="page-title">
                    <h1>Selamat Datang di MyArtikel -- CID/CD TEST 01</h1>
                    <span>Eksplorasi konten saya dan temukan inspirasi yang bermanfaat.</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Page Content -->
        <section id="page-content">
            <div class="container">
                <div class="row">
                    @foreach ($data as $item)
                        @if ($item->status == '1')
                            <div class="content col-lg-4">
                                <div class="post-item border">
                                    <div class="post-item-wrap">
                                        <div class="post-image">
                                            <a href="#">
                                                <img alt="gambar.png" style="width: 340px; height: 210px"
                                                    src="{{ asset('storage/photos/' . $item->foto) }}"></a>
                                            <span class="post-meta-category"><a
                                                    href="">{{ $item->kategori }}</a></span>
                                        </div>
                                        <div class="post-item-description">
                                            <span class="post-meta-date"><i
                                                    class="fa fa-calendar-o"></i>{{ $item->created_at->format('d M Y') }}</span>
                                            <span class="post-meta-comments"><i class="fa fa-comments-o"></i>33
                                                Comments</a></span>
                                            <h2>{{ $item->judul }}</h2>
                                            <p>{!! Str::limit($item->text, 100) !!}</p>
                                            <a href="{{ route('detail', $item->id) }}"
                                                class="btn btn-success btn-sm">Selengkap nya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer -->
        @include('master.footer')
        <!-- end: Footer -->
        <!-- end: Body Inner -->
        @include('master.js')
</body>

</html>
