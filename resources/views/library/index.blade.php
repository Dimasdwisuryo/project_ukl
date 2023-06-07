@extends('template.default')

@php
  $title = 'Semua Data Perpustakaan';
  $preTitle = 'Data Peminjaman Buku Perpustakaan';
@endphp

@push('page-action')
  <a href="{{ route('library.create') }}" class="btn btn-primary">Tambah Data</a>
  
@endpush

@section('Content')
<div class="card">
  <form action="" method="get">
    <input type="text" name="search" class="border border-gray-300 shadow  rounded p-3" placeholder="Cari data..." value="{{ request('search') }}">
</form>
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Nama Buku</th>
            <th>Foto Buku</th>
            <th>Tanggal Peminjaman</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($librarys as $library)
          <tr>
            <td>{{ $library->NISN }}</td>
            <td>{{ $library->Nama_Lengkap }}</td>
            <td>{{ $library->Kelas }}</td>
            <td>{{ $library->Nama_Buku }}</td>
            <td>
              <img src="{{ asset('storage/' . $library->photo) }}" height="100px" alt="">
            </td>
            <td>{{ $library->Tanggal_Peminjaman }}</td>
          <td>
            <a href="{{ route('library.edit', $library->id) }}"  class="btn btn-danger btn-sn">Edit</a>
            <form action="{{ route('library.destroy', $library->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" value="Hapus" class="btn btn-danger btn-sn">
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection