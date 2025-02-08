@extends('admin.component.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4">Index Artikel > Edit : {{$data->judul}}</span>
                    </div>
                    <div class="card-body">
                        <form id="form1" action="{{ route('proses_edit_artikels', $data->id) }}" class="form-validate" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" value="{{ old('judul', $data->judul) }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Foto</label>
                                    <input type="file" class="form-control" name="foto" placeholder="Foto">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="summernote">Isi Artikel</label>
                                    <textarea id="deskripsi" name="text" class="form-control" cols="30" rows="10"></textarea>
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
@endsection
