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
        <section id="page-content" class="no-sidebar">
            <div class="container">
                <!-- DataTable -->
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <h4>Daftar Artikel</h4>
                        <p>Silahkan tambah artikel di list dibawah ini</p>
                    </div>
                    <div class="col-lg-6 text-end">
                        <a href="{{ route('form_tambah_artikel') }}" class="btn btn-light">Tambah Artikel</a>
                        <div id="export_buttons" class="mt-2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Upload</th>
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>Jumlah Komentar</th>
                                    <th>Kategori</th>
                                    <th class="noExport">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no = $no + 1 }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->judul }} | <span class="badge badge-pill bg-success">Active</span></td>
                                    <td><img src="{{ asset('images/' . $item->foto) }}" alt="Gambar" width="100" height="auto"></td>
                                    <td>3</td>
                                    <td><span class="badge badge-pill bg-primary">{{ $item->kategori }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-light" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fas fas-pencil"></i>non aktif</a>
                                        <a class="btn btn-sm btn-warning" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fas fas-pencil"></i>edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fas fa-trash-alt"></i></a>
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
        <!-- end: Page Content -->
        <!-- Footer -->
        @include('master.footer')
        <!-- end: Footer -->
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
