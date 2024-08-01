@extends('layouts.app')

@section('title', 'Edit Jenis Surat')

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
            Tambah Jenis Baru</h3>
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
                href="{{ route('jenis_surat.index') }}">
                Jenis Surat
                <i
                    class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
            </a>
        </li>
        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
            aria-current="page">
            Edit Jenis Surat
        </li>
    </ol>
</div>
<!-- Page Header Close -->
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Form Edit
                    </div>

                </div>
                <div class="box-body">
                    <form action="{{ route('jenis_surat.update', $jenissurat->id) }}" method="POST" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4">
                        @csrf
                        @method('PUT')
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('jenis_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="autoSizingInput">Jenis Surat</label>
                            <input type="text" name="jenis_surat" id="jenis_surat" placeholder="Masukan jenis surat" value="{{ old('jenis_surat', $jenissurat->jenis_surat) }}" class="form-control">
                            @error('jenis_surat')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 mt-4">Simpan</button>
                            <a href="{{ route('jenis_surat.index') }}" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
