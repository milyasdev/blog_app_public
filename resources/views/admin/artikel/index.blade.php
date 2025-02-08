@extends('admin.component.master')

@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<section id="page-content" class="no-sidebar">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- DataTable -->
        <div class="row mb-3">
            <div class="col-lg-6">
                <h4>Index Artikel</h4>
                <p>Silahkan tambah artikel di list dibawah ini</p>
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
                            <th>Tgl Upload</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Dilihat</th>
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
                            <td style="word-wrap: break-word; word-break: break-word; max-width: 200px;">{{ $item->judul }} |
                                @if ($item->status == '1')
                                <span class="badge badge-pill bg-success">Active</span>
                                @else
                                <span class="badge badge-pill bg-danger">Offline</span>
                                @endif
                            </td>
                            <td><img src="{{ asset('storage/photos/' . $item->foto) }}" alt="Gambar" width="100" height="auto"></td>
                            <td>{{ $item->view_count }}</td>
                            <td><span class="badge badge-pill bg-primary">{{ $item->kategori }}</span>
                            </td>
                            <td>
                                @if ($item->status == '1')
                                    <a class="btn btn-sm btn-success" href="{{ route('switch', $item->id) }}" data-bs-toggle="tooltip" data-bs-original-title=""><i class="fas fa-toggle-on"></i></a>
                                @elseif ($item->status == '2')
                                    <a class="btn btn-sm btn-light" href="{{ route('switch', $item->id) }}" data-bs-toggle="tooltip" data-bs-original-title=""><i class="fas fa-toggle-on"></i></a>
                                @endif
                                <a class="btn btn-sm btn-warning" href="{{ route('form_edit_artikel', $item->id) }}" data-bs-toggle="tooltip" data-bs-original-title=""><i class="fas fa-edit"></i></a>
                                <button onclick="confirmHapus('{{ route('prosesHapus', ['id'=>$item->id]) }}')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
