<header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ route('home') }}">
                    <span class="logo-default"><img src="{{ asset('images/milyasdevlogo.png') }}" alt=""
                            width="250" height="auto"></span>
                    <span class="logo-dark"><img src="{{ asset('images/milyasdevlogo.png') }}" alt=""
                            width="250" height="auto"></span>
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
                            {{-- <li class="dropdown"><a href="#">Informasi Publik</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('informasi_publik') }}">BMKG - Prakiraan Cuaca</a></li>
                                </ul>
                            </li> --}}
                            <li class="dropdown"><a href="#">Portofolio</a>
                                <ul class="dropdown-menu">
                                    @foreach ($porto as $item)
                                        <li><a href="{{ $item->url }}" target="_blank">{{ $item->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Koneksi</a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://www.linkedin.com/in/muhammad-ilyas-139403100"
                                            target="_blank">LinkedIn</a></li>
                                    <li><a href="https://www.instagram.com/idmils?igsh=MTZ1djQwenYxMmt6eg=="
                                            target="_blank">Instagram</a></li>
                                    <li><a href="https://github.com/milyasdev" target="_blank">My GitHub</a></li>
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
