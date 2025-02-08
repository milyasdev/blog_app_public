@extends('admin.component.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

@endsection

@section('content')
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4">Index Artikel > Tambah Artikel</span>
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
                                    <label for="deskripsi">Isi Artikel</label>
                                    <textarea id="deskripsion" name="text" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="category">Kategori</label>
                                        <select id="category" name="kategori" class="form-control">
                                            <option value="Blog">Blog</option>
                                            <option value="Teknologi">Teknologi</option>
                                            <option value="Tutorial">Tutorial</option>
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
@endsection

@section('js')
{{-- Fungsi konfirmasi SweetAlert Delete --}}
<script>
    function confirmHapus(href) {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Apakah anda yakin akan hapus data ini?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Ya Hapus',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL penghapusan
                window.location.href = href;
            }
        });
    }
</script>

<script>
    $('#deskripsion').summernote({
      placeholder: 'Tulis disini',
      tabsize: 2,
      height: 900
    });
</script>

@endsection
