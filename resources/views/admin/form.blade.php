<!DOCTYPE html>
<html lang="en">

@include('master.head')

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo"> <a href="index.html"><span class="logo-default">ADMIN</span><span class="logo-dark">ADMIN</span></a> </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
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
                        <div id="mainMenu">
                            <div class="container">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li class="dropdown"><a href="#">Kategori</a>
                                            <ul class="dropdown-menu">
                                                <li class=""><a href="#">POST</a>
                                                </li>
                                                <li class=""><a href="#">Teknologi</a>
                                                </li>
                                                <li class=""><a href="#">Tutorial</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>|</li>
                                        <li><a href="index.html">Log Out</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Page title -->

        <!-- end: Page title -->
        <!-- Page Menu -->
        <div class="page-menu">
            <div class="container">
                <nav>
                    <ul>
                        <li class="dropdown"><a href="#">Basic</a>
                            <ul class="dropdown-menu">
                                <li><a href="component-datatable.html">Zero Configuration</a></li>
                                <li><a href="component-datatable-complex-headers.html">Complex Headers</a></li>
                                <li><a href="component-datatable-scrollable.html">Scrollable</a></li>
                                <li><a href="component-datatable-pagination-option.html">Alternative pagination</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Advanced</a>
                        </li>
                        <li class="dropdown"><a href="#">Data sources</a>
                        </li>
                        <li class="dropdown"><a href="#">Search Options</a>
                        </li>
                        <li class="dropdown"><a href="#">Extensions</a>
                        </li>
                    </ul>
                </nav>
                <div id="pageMenu-trigger">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
        <!-- end: Page Menu -->
        <!-- Page Content -->
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="h4">Form Tambah Data Artikel</span>
                            </div>
                            <div class="card-body">
                                <form id="form1" action="{{ route('proses_tambah_artikel') }}" class="form-validate" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Judul</label>
                                            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Foto</label>
                                            <input type="file" class="form-control" name="foto" placeholder="Foto" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="summernote">Isi Artikel</label>
                                            <textarea id="summernote" name="text" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="category">Kategori</label>
                                                <select id="category" name="kategori" class="form-control">
                                                    <option value="blog">Blog</option>
                                                    <option value="teknologi">Teknologi</option>
                                                    <option value="tutorial">Tutorial</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn m-t-50 mt-3">Submit</button>
                                            <a href="{{ route('adminIndex') }}" class="btn m-t-50 mt-3 btn-light">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end: Page Content -->
        <!-- Footer -->
        @include('master.footer')
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
    </script>
    <!--Plugins-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('assets/js/functions.js')}}"></script>

    <!--Datatables plugin files-->
    <script src='{{ asset('assets/plugins/datatables/datatables.min.js') }}'></script>




</body>

</html>
