<!DOCTYPE html>
<html lang="en">

@include('master.head')

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light">
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
                                    <li><a href="{{ route('home') }}">Home</a></li>
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
        <!-- end: Page title -->
        <!-- Page Content -->
        <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-lg-9">
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="{{ asset('images/' . $data->foto) }}">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <h2>{{ $data->judul }}</h2>
                                        <div class="post-meta">
                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $data->created_at->format('d M Y') }}</span>
                                            <span class="post-meta-comments"><i class="fa fa-comments-o"></i>33 Comments</a></span>
                                            <span class="post-meta-category"><i class="fa "></i>Kategori : {{ $data->kategori }}</a></span>
                                            {{-- <div class="post-meta-share">
                                                <a class="btn btn-xs btn-slide btn-facebook" href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <span>Facebook</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-twitter" href="#" data-width="100">
                                                    <i class="fab fa-twitter"></i>
                                                    <span>Twitter</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-instagram" href="#" data-width="118">
                                                    <i class="fab fa-instagram"></i>
                                                    <span>Instagram</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:#" data-width="80">
                                                    <i class="icon-mail"></i>
                                                    <span>Mail</span>
                                                </a>
                                            </div> --}}
                                        </div>
                                        <p>{{ $data->text }}</p>
                                        {{-- <div class="blockquote">
                                            <p>The world is a dangerous place to live; not because of the people who are evil, but because of the people who don't do anything about it.</p>
                                            <small>by <cite>Albert Einstein</cite></small>
                                        </div> --}}
                                    </div>
                                    <!-- Comments -->
                                    <div class="comments" id="comments">
                                        <div class="comment_number">
                                            Comments <span>({{ count($comments) }})</span>
                                        </div>
                                        <div class="comment-list">
                                            <!-- Comment -->
                                            @foreach ($komen as $komen)
                                            <div class="comment" id="comment-1">
                                                <div class="image"><img alt="" src="images/blog/author.jpg" class="avatar"></div>
                                                <div class="text">
                                                    <h5 class="name">{{$komen->nama}}</h5>
                                                    <span class="comment_date">Posted at {{$komen->created_at}}</span>
                                                    <div class="text_holder">
                                                        <p>{{$komen->komentar}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- end: Comment -->
                                        </div>
                                    </div>
                                    <!-- end: Comments -->
                                    <div class="respond-form" id="respond">
                                        <div class="respond-comment">
                                            Tinggalkan <span>Komentar</span></div>
                                            @if (count($comments) <=10)
                                            <form class="form-gray-fields" action="{{ route('proses_komentar', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_artikel" value="{{ $data->id }}">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="upper" for="name">Nama</label>
                                                            <input class="form-control required" name="nama" placeholder="Masukkan nama" id="" aria-required="true" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label class="upper" for="email">Email</label>
                                                            <input class="form-control required email" name="email" placeholder="Masukan email" id="" aria-required="true" type="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="upper" for="comment">Komentar anda</label>
                                                            <textarea class="form-control required" name="komentar" rows="9" placeholder="Masukkkan komentar" id="comment" aria-required="true"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group text-center">
                                                            <button class="btn btn-primary" type="submit">Submit Comment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @else
                                            <p>Maaf Komentar sudah dibatasi</p>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post single item-->
                        </div>
                    </div>
                    <!-- end: content -->
                    <!-- Sidebar-->
                    <div class="sidebar sticky-sidebar col-lg-3">
                        <div class="widget">
                            <div class="tabs">
                                <ul class="nav nav-tabs" id="tabs-posts" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Teknologi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="false">Tutorial</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tabs-posts-content">
                                    <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="{{ asset('assets/images/banner.jpg') }}">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">A true story, that never been told!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 6m ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Technology</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/8.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">New costs and rise of the economy!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                                        <div class="post-thumbnail-list">
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/7.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">The most happiest time of the day!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/8.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">New costs and rise of the economy!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 11h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail-entry">
                                                <img alt="" src="images/blog/thumbnail/6.jpg">
                                                <div class="post-thumbnail-content">
                                                    <a href="#">Beautiful nature, and rare feathers!</a>
                                                    <span class="post-date"><i class="icon-clock"></i> 24h ago</span>
                                                    <span class="post-category"><i class="fa fa-tag"></i> Lifestyle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End: Tabs with Posts-->
                    </div>
                    <!-- end: Sidebar-->
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

