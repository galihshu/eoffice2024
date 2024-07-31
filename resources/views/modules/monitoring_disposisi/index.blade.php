@extends('layouts.app')

@section('title', 'Disposisi')

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
                Tracking Disposisi</h3>
        </div>
        <ol class="flex items-center whitespace-nowrap min-w-0">
            <li class="text-[0.813rem] ps-[0.5rem]">
                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="/home">
                    Home
                    <i
                        class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
            </li>
            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
                aria-current="page">
                Tracking Disposisi
            </li>
        </ol>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header justify-between">
                    <div class="box-title">
                         Cari Disposisi
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('monitoring_disposisi.show') }}" method="POST">
                        @csrf
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('no_surat') ? ' !border-red' : '' }}">
                            <label class="form-label" for="no_surat">No Surat</label>
                            <input type="text" name="monitoring_disposisi" id="no_surat" placeholder="Masukan nomor surat"
                                class="form-control" required>
                            @error('no_surat')
                                <span class="text-red-500 text-xs hidden" style="display: block;">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-span-12">
                            <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 mt-4">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

