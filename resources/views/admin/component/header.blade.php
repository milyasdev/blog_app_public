<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header id="header" data-fullwidth="true">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo"> <a href="{{ route('adminIndex') }}"><span class="logo-default">ADMIN</span><span class="logo-dark">ADMIN</span></a> </div>
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
                <div id="mainMenu">
                    <div class="container">
                        <nav>
                            <ul>

                                <li><button onclick="confirmLogout('{{ route('proses_logout') }}')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Keluar</button></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>
{{-- Fungsi konfirmasi SweetAlert Delete --}}
<script>
    function confirmLogout(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Yakin Mau Logout?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL penghapusan
                window.location.href = href;
            }
        });
    }
</script>
