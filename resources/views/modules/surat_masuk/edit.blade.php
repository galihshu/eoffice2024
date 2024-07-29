@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@push('styles')
    <style>
        .dt-length {
            display: none;
        }
    </style>
@endpush

@section('content')
    <div class="block justify-between page-header md:flex">
        <div>
            <h3
                class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">
                Edit Surat Masuk</h3>
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
                    Surat Masuk
                    <i
                        class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
            </li>
            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
                aria-current="page">
                Edit Surat Masuk
            </li>
        </ol>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Form Edit Surat Masuk
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('surat_masuk.update', $suratMasuk->id) }}" method="POST"
                        enctype="multipart/form-data" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4">
                        @csrf
                        @method('PUT')
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('jenis_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="jenis_surat">Jenis Surat</label>
                            <select class="ti-form-select rounded-sm !py-2 !px-3" id="jenis_surat" name="jenis_surat"
                                value="{{ $suratMasuk->jenis_surat_id }}" required>
                                @foreach ($jenis_surat as $item)
                                    <option value={{ $item['id'] }}>{{ $item['jenis_surat'] }}</option>
                                @endforeach
                            </select>
                            @error('jenis_surat')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('status') ? ' !border-red' : '' }}">
                            <label class="form-label" for="status">Status Surat</label>
                            <select class="ti-form-select rounded-sm !py-2 !px-3" id="status" name="status"
                                value="{{ $suratMasuk->status_id }}" required>
                                <option value=2 >Diproses</option>
                                <option value=3 >Selesai</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('no_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="no_surat">No Surat</label>
                            <input type="text" name="no_surat" id="no_surat" placeholder="Masukan nomor surat"
                                class="form-control" value="{{ $suratMasuk->no_surat }}" required>
                            @error('no_surat')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('perihal') ? ' !border-red' : '' }}">
                            <label class="form-label" for="perihal">Perihal Masuk</label>
                            <input type="text" name="perihal" id="perihal" placeholder="Masukan nomor surat"
                                class="form-control" value="{{ $suratMasuk->perihal }}" required>
                            @error('perihal')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('tgl_diterima') ? ' !border-red' : '' }}">
                            <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk" placeholder="Masukan tanggal diterima"
                                value="{{ $suratMasuk->tgl_masuk ? $suratMasuk->tgl_masuk->format('Y-m-d') : '' }}"
                                class="form-control">
                            @error('tgl_masuk')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('tgl_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="tgl_surat">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" placeholder="Masukan tanggal keluar"
                                value="{{ $suratMasuk->tgl_surat ? $suratMasuk->tgl_surat->format('Y-m-d') : '' }}"
                                class="form-control">
                            @error('tgl_surat')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('asal_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="asal_surat">Asal Surat</label>
                            <input type="text" name="asal_surat" id="asal_surat" placeholder="Masukan tujuan surat"
                                value="{{ $suratMasuk->asal_surat }}" class="form-control">
                            @error('asal_surat')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12 mb-4 sm:mb-0">
                            <label for="file_upload" class="sr-only">Upload File (PDF)</label>
                            <input type="file" id="file_upload" name="file_upload" accept=".pdf"
                                class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50
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
                            <a href="{{ route('surat_masuk.index') }}"
                                class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
