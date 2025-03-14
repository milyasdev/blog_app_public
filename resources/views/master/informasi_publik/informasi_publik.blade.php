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
                        <h2 style="font-size:40px" data-caption-animate="zoom-out">Temukan Wawasan Baru Yang Menarik</h2>
                        <p>"MyArtikel" adalah portal yang saya buat untuk anda jelajahi. Temukan berbagai <br>artikel yang informatif yang bisa menambah insight anda.</p>
                        {{-- <div><a href="#welcome" class="btn btn-primary scroll-to">Explore more</a></div> --}}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <section id="page-title">
            <div class="container">
                <div class="page-title">
                    <h1>Prakiraan Cuaca Jabodetabek</h1>
                    <span>Data dibawah ini diambil dari Badan Meteorologi, Klimatologi dan Geofisika (BMKG)</span>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Page Content -->
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <form id="form1" class="form-validate">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="state">Lokasi</label>
                                                <select name="region" class="form-select" required>
                                                    <option value="" selected disabled>-- Pilih Daerah --</option>
                                                    @foreach ($dataRegion as $item)
                                                    <option value="{{ $item->kode_region }}">{{ $item->nama_region }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button type="submit" class="btn m-t-30 mt-3">Lihat</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <!--call-to-action dark -->
                        <div class="call-to-action call-to-action-dark">
                            <h3>
                                Join by April 27 and <span>Win $200</span> in Programs and Services
                            </h3>
                            <p>
                                This is a simple hero unit, a simple call-to-action-style component for calling extra attention to featured content.
                            </p>
                            <a class="btn btn-primary" href="#">Call us now!</a>
                        </div>
                        <!--END: call-to-action dark -->
                    </div>
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

