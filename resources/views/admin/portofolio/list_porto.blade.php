@extends('admin.component.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
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
