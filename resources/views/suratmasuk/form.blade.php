@extends('layouts.app')

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
                {{ $data['title'] }}</h3>
        </div>
        <ol class="flex items-center whitespace-nowrap min-w-0">
            <li class="text-[0.813rem] ps-[0.5rem]">
                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="/home">
                    Home
                    <i
                        class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate"
                    href="{{ route('suratmasuk.index') }}">
                    Surat Masuk
                    <i
                        class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
            </li>
            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
                aria-current="page">
                {{ $data['type'] }}
            </li>
        </ol>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="xl:col-span-12 col-span-12">
            <div class="box custom-box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        {{ $data['title'] }}
                    </div>

                    {{-- <div class="prism-toggle">
                        
                                    <a href="javascript:save();" class="form-control ti-btn !text-white !bg-primary ti-btn-wave" data-hs-overlay="#data-modal"><i class="bx bx-plus"></i>Tambah</a>
                        
                    </div> --}}
                </div>
                <div class="box-body">

                    <form action="/surat_masuk/{{ $suratmasuk->id }}" method="POST" class="space-y-6" novalidate enctype="multipart/form-data">
                        @if ($suratmasuk->id)
                            @method('PUT')
                        @else
                            @method('POST')
                        @endif
                        @csrf
                        <div class="mb-4">
                            <label for="jenissurat_id" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                            <select name="jenissurat_id" id="jenissurat_id"
                                class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="">Pilih Jenis Surat</option>
                                @foreach ($jenis_surat as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_surat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="perihal_masuk" class="block text-sm font-medium text-gray-700">Perihal Masuk</label>
                            <input type="text" name="perihal_masuk" id="perihal_masuk"
                                class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Masukkan perihal masuk">
                            @error('perihal_masuk')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tgl_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat"
                                class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            @error('tgl_surat')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="file_upload" class="block text-sm font-medium text-gray-700">File Upload</label>
                            <input type="file" name="file_upload" id="file_upload"
                                class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            @error('file_upload')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="asal_surat" class="block text-sm font-medium text-gray-700">Asal Surat</label>
                            <input type="text" name="asal_surat" id="asal_surat" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm"></input>
                            @error('asal_surat')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="ti-btn !text-white !bg-primary ti-btn-wave"><i class="bx bx-plus"></i>
                            {{ $data['btn_submit'] }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
