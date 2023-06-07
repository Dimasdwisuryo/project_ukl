@extends('template.default')

@php
  $title = 'Tambah Data Perpustakaan';
  $preTitle = 'Data Peminjaman Buku Perpustakaan';
@endphp

@section('Content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('library.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="NISN" class="form-control 
                    @error('NISN')
                      is-invalid
                    @enderror"
                    name="example-text-input" placeholder="Tulis NISN" value="{{ old('NISN') }}">
                    @error('NISN')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="Nama_Lengkap" class="form-control
                    @error('Nama_Lengkap')
                      is-invalid
                    @enderror" 
                    name="example-text-input" placeholder="Tulis Nama Lengkap" value="{{ old('Nama_Lengkap') }}">
                    @error('Nama_Lengkap')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="Kelas" class="form-control
                    @error('Kelas')
                      is-invalid
                    @enderror" 
                    name="example-text-input" placeholder="Tulis Kelas" value="{{ old('Kelas') }}">
                    @error('Kelas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Nama Buku</label>
                    <input type="text" name="Nama_Buku" class="form-control
                    @error('Nama_Buku')
                      is-invalid
                    @enderror" 
                    name="example-text-input" placeholder="Tulis Nama Buku" value="{{ old('Nama_Buku') }}">
                    @error('Nama_Buku')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="photo" class="form-control 
                    @error('photo')
                      is-invalid
                    @enderror"
                    placeholder="Tulis NISN" value="{{ old('photo') }}">
                    @error('photo')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Tanggal Peminjaman</label>
                    <input type="date" name="Tanggal_Peminjaman" class="form-control
                    @error('Tanggal_Peminjaman')
                      is-invalid
                    @enderror" 
                    name="example-text-input" placeholder="Tulis Tanggal Peminjaman" value="{{ old('Tanggal_Peminjaman') }}">
                    @error('Tanggal_Peminjaman')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <input type="submit" value="simpan" class="btn btn-pink">
                  </div>

            </form>

        </div>
    </div>
@endsection