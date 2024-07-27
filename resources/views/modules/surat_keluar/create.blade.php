@extends('layouts.app')

@section('title', 'Tambah Surat Keluar Baru')

@push('styles')
    <style>
        .dt-length {
            display: none;
        }
    </style>
@endpush

@section('content')
<!-- Page Header -->
<div class="block justify-between page-header md:flex">
    <div>
        <h3
            class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">
            Tambah Surat Keluar Baru</h3>
    </div>
    <ol class="flex items-center whitespace-nowrap min-w-0">
        <li class="text-[0.813rem] ps-[0.5rem]">
            <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate"
                href="javascript:void(0);">
                Data
                <i
                    class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
            </a>
        </li>
        <li class="text-[0.813rem] ps-[0.5rem]">
            <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate"
                href="{{ route('surat_keluar.index') }}">
                Surat Keluar
                <i
                    class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
            </a>
        </li>
        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
            aria-current="page">
            Tambah Surat Keluar Baru
        </li>
    </ol>
</div>
<!-- Page Header Close -->
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Form Tambah Baru
                    </div>

                </div>
                <div class="box-body">
                    <form action="{{ route('surat_keluar.store') }}" method="POST" enctype="multipart/form-data" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4">
                        @csrf
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('kode_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="kode_surat">Kode Surat</label>
                            <input type="text" name="kode_surat" id="kode_surat" placeholder="Masukan kode surat" class="form-control" required>
                            @error('kode_surat')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('no_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="no_surat">No Surat</label>
                            <input type="text" name="no_surat" id="no_surat" placeholder="Masukan nomor surat" class="form-control" required>
                            @error('no_surat')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('nama_penerima') ? ' !border-red' : '' }}">
                            <label class="form-label" for="nama_penerima">Nama Penerima</label>
                            <input type="text" name="nama_penerima" id="nama_penerima" placeholder="Masukan nama penerima" class="form-control">
                            @error('nama_penerima')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('perihal') ? ' !border-red' : '' }}">
                            <label class="form-label" for="perihal">Perihal</label>
                            <input type="text" name="perihal" id="perihal" placeholder="Masukan perihal" class="form-control">
                            @error('perihal')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('tgl_keluar') ? ' !border-red' : '' }}">
                            <label class="form-label" for="tgl_keluar">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" id="tgl_keluar" placeholder="Masukan tanggal keluar" class="form-control">
                            @error('tgl_keluar')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('tgl_diterima') ? ' !border-red' : '' }}">
                            <label class="form-label" for="tgl_keluar">Tanggal Diterima</label>
                            <input type="date" name="tgl_diterima" id="tgl_diterima" placeholder="Masukan tanggal diterima" class="form-control">
                            @error('tgl_diterima')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('status_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="status_surat">Status Surat</label>
                            <select class="ti-form-select rounded-sm !py-2 !px-3" id="status_surat" name="status_surat" required>
                                <option value="1">Draft</option>
                                <option value="2">Terkirim</option>
                                <option value="3">Selesai</option>
                            </select>
                            @error('status_surat')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('tujuan_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="tujuan_surat">Tujuan Surat</label>
                            <input type="text" name="tujuan_surat" id="tujuan_surat" placeholder="Masukan tujuan surat" class="form-control">
                            @error('tujuan_surat')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="col-span-12 mb-4 sm:mb-0">
                            <label for="file_upload" class="sr-only">Upload File (PDF)</label>
                            
                            <input type="file"  id="file_upload" name="file_upload" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50
                            file:border-0
                           file:bg-light file:me-4
                           file:py-3 file:px-4
                           dark:file:bg-black/20 dark:file:text-white/50">
                           <small class="form-text text-muted">
                            * Hanya format PDF yang diperbolehkan. 
                            Maksimum ukuran file: 2MB.
                            </small>
                        </div>

                        <div class="col-span-12">
                            <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 mt-4">Simpan</button>
                            <a href="{{ route('surat_keluar.index') }}" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
