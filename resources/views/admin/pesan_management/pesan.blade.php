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
                <h4>Daftar Pesan</h4>
                <p>Berikut adalah pesan yang masuk</p>
            </div>
            <div class="col-lg-6 text-end">
                <div id="export_buttons" class="mt-2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Terima</th>
                            <th>Pengirim</th>
                            <th>Email</th>
                            <th>No Wa</th>
                            <th>Pesan Konten</th>
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
                            <td>{{ $item->nama_pengirim }}</td>
                            <td style="color: blue">{{ $item->email_pengirim }}</td>
                            <td>{{ $item->wa_pengirim }}</td>
                            <td>{{ $item->pesan_pengirim }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="#" data-bs-toggle="tooltip" data-bs-original-title=""><i class="fas fas-pencil"></i>detail</a>
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
