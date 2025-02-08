<div class="page-menu">
    <div class="container">
        <nav>
            <ul>
                <li class="dropdown"><a href="#">Artikel</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('adminIndex') }}">Index Artikel</a></li>
                        <li><a href="{{ route('form_tambah_artikel') }}">Tambah Artikel</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Banner</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('form_banner') }}">Ganti Banner</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Pesan Masuk</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('listPesan') }}">Index Pesan</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Portofolio</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('list_portofolio') }}">Index Portofolio</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">User Management</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('form_tambah_user') }}">Tambah User</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="pageMenu-trigger">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>
