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
                    <div id="logo"> <a href="{{ route('adminIndex') }}"><span class="logo-default">ADMIN</span><span class="logo-dark">ADMIN</span></a> </div>
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
                                        <li>|</li>
                                        <li><a href="{{ route('proses_logout') }}">Log Out</a></li>
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
                        <li class="dropdown"><a href="#">Menu</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('adminIndex') }}">Home</a></li>
                                <li><a href="{{ route('form_banner') }}">Banner</a></li>
                                <li><a href="{{ route('form_tambah_user') }}">Management User</a></li>
                                <li><a href="{{ route('listPesan') }}">Pesan Masuk</a></li>
                                <li><a href="#">Portofolio saya</a></li>
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
        <section id="page-content" class="no-sidebar">
            <div class="container">
                <!-- DataTable -->
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <h4>Daftar Portofolio</h4>
                        <p>Tambah Portofolio dibawah ini</p>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a data-bs-target="#modals" data-bs-toggle="modal" class="btn btn-light">Tambah Portofolio</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Portofolio</th>
                                    <th>URL</th>
                                    <th class="noExport">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($portofolio as $item)
                                    <tr>
                                        <td>{{ $no = $no + 1 }}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->url}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="{{ route('hapusPorto', $item->id) }}" data-bs-toggle="tooltip" data-bs-original-title=""><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end: DataTable -->
            </div>
        </section>

        <div class="modal fade" id="modals" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-label">Masukin URL Portofolio</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('simpan_porto') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama Anda">
                                    </div>
                                    <div class="form-group">
                                        <label for="url">URL:</label>
                                        <input type="text" id="url" name="url" class="form-control" placeholder="Masukkan URL Anda">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>


    <!--Plugins-->
    <script src="{{ asset('assets/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>

    <!--Template functions-->
    <script src="{{ asset('assets/js/functions.js')}}"></script>

    <!--Datatables plugin files-->
    <script src='{{ asset('assets/plugins/datatables/datatables.min.js')}}'></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                buttons: [{
                    extend: 'print',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'pdf',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'excel',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'copy',
                    title: 'Test Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }]
            });
            table.buttons().container().appendTo('#export_buttons');
            $("#export_buttons .btn").removeClass('btn-secondary').addClass('btn-light');
        });
    </script>
</body>

</html>
