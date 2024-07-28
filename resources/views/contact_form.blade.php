<!DOCTYPE html>
<html lang="en">

@include('master.head')

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{ route('home') }}">
                            <span class="logo-default">myArtikel</span>
                            <span class="logo-dark">myArtikel</span>
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
                                    <li class="dropdown"><a href="#">Koneksi</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://www.linkedin.com/in/muhammad-ilyas-139403100" target="_blank">LinkedIn</a></li>
                                            <li><a href="https://www.instagram.com/idmils?igsh=MTZ1djQwenYxMmt6eg==" target="_blank">Instagram</a></li>
                                            <li><a href="{{ route('form-contact') }}">Hubungi Saya</a></li>
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
                <div class="card" style="margin-top: 100px; margin-bottom:100px;">
                    <div class="card-header">
                        <span class="h4">Contact | milyasDev</span>
                        <p class="text-muted">Silahkan kirim pesan, saya akan segera membalas pesan anda</p>
                    </div>
                    <div class="card-body">
                        <form id="form2" action="{{ route('prosesContact') }}" method="post" class="form-validate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Anda" value="{{ old('nama_pengirim') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email_pengirim" class="form-control" placeholder="Alamat Email" value="{{ old('email_pengirim') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="wa_pengirim" class="form-control" placeholder="Nomor WhatsApp" value="{{ old('wa_pengirim') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea maxlength="400" name="pesan_pengirim" class="form-control" placeholder="Pesan Anda" style="width: 100%; min-height: 160px;" required>{{ old('pesan_pengirim')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="captcha">
                                            <span style="margin-right: 10px">{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" id="reload-captcha">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" placeholder="Masukkan Captcha" name="captcha">
                                        @error('captcha')
                                            <p style="color: red">Captcha masih salah </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script>
        $('#reload-captcha').click(function(){
            $.ajax({
                type:'GET',
                url:'reload-captcha',
                success:function(data){
                    $(".captcha span").html(data.captcha)
                }

            });
        });
    </script>
</body>

</html>

