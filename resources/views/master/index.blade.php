<!DOCTYPE html>
<html lang="en">

@include('master.head')

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
            <div class="header-inner">
                <div class="container" style="padding: 0 15px 0 15px">
                    <!--Logo-->
                    <div id="logo">
                        <a href="#">
                            <span class="logo-default">ArtikelHaven</span>
                            <span class="logo-dark">ArtikelHaven</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->

                    <!-- end: search -->
                    <!--Header Extras-->
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li class="dropdown"><a href="#">Kategori</a>
                                        <ul class="dropdown-menu">
                                            <li class=""><a href="#">Blog</a>
                                            </li>
                                            <li class=""><a href="#">Teknologi</a>
                                            </li>
                                            <li class=""><a href="#">Tutorial</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Inspiro Slider -->
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
            <!-- Slide 1 -->
            <div class="slide kenburns" data-bg-image="{{ asset('assets/images/banner.jpg') }}">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-center text-light">
                        <!-- Captions -->
                        <h2 style="font-size:50px" data-caption-animate="zoom-out">Temukan Dunia Baru Lewat Tulisan Saya</h2>
                        <p>Jelajahi berbagai artikel menarik yang telah saya tulis. Temukan wawasan baru dan nikmati bacaan yang inspiratif di sini.</p>
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
                    <h1>MilyasDev Portfolio | ArtikelHaven</h1>
                    <span>Selamat Membaca, Semoga Menemukan Inspirasi.</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Page Content -->
        <section id="page-content">
            <div class="container">
                <div class="row">
                    @foreach ($data as $item)
                        <div class="content col-lg-4">
                            <div class="post-item border">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="{{ asset('assets/images/banner.jpg') }}"></a>
                                        <span class="post-meta-category"><a href="">{{$item->kategori}}</a></span>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{$item->created_at->format('d M Y')}}</span>
                                        <span class="post-meta-comments"><i class="fa fa-comments-o"></i>33
                                                Comments</a></span>
                                        <h2>{{ $item->judul }}</h2>
                                        <p>{{ Str::limit($item->text, 100) }}</p>
                                        <a href="{{ route('detail', $item->id) }}" class="btn btn-primary btn-sm">Selengkap nya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </section>


        <!-- Footer -->
    @include('master.footer')
        <!-- end: Footer -->

    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('assets/js/functions.js') }}"></script>
</body>

</html>

