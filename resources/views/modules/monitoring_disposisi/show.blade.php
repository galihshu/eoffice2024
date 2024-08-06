@extends('layouts.app')

@section('title', 'Tracking Disposisi')

@push('styles')
@endpush

@section('content')
@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp

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
                    Data
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
                        Nomor Surat Masuk: {{ $no_surat }}
                    </div>
                </div>
                <div class="box-body mb-12">
                <ul class="timeline list-none text-[0.813rem] text-defaulttextcolor">
                    @foreach ($data as $item)
                    <li>
                        <div class="timeline-time text-end">
                        <span class="date">{{ \Carbon\Carbon::parse($item['tgl_disposisi'])->translatedFormat('l') }}</span>
                        <span class="time inline-block">{{ Carbon::parse($item['tgl_disposisi'])->translatedFormat('d F Y') }}</span>
                        </div>
                        <div class="timeline-icon">
                        <a aria-label="anchor" href="javascript:void(0);"></a>
                        </div>
                        <div class="timeline-body">
                            <div class="flex items-start timeline-main-content flex-wrap mt-0">
                                <div class="avatar avatar-md online me-3 avatar-rounded md:mt-0 mt-6">
                                    @if ($item['status_disposisi'] == 1)
                                        <span class="avatar avatar-rounded bg-warning">
                                            <i class="ri-mail-send-line text-[1rem] text-white"></i>
                                        </span>
                                    @elseif($item['status_disposisi'] == 2)
                                        <span class="avatar avatar-rounded bg-success">
                                            <i class="ri-mail-check-line text-[1rem] text-white"></i>
                                        </span>
                                    @elseif($item['status_disposisi'] == 3)
                                        <span class="avatar avatar-rounded bg-secondary">
                                            <i class="ri-mail-download-line  text-[1rem] text-white"></i>
                                        </span>
                                    @elseif($item['status_disposisi'] == 4)
                                        <span class="avatar avatar-rounded bg-primary">
                                            <i class="ri-inbox-archive-line text-[1rem] text-white"></i>
                                        </span>
                                    @elseif($item['status_disposisi'] == 5)
                                        <span class="avatar avatar-rounded bg-danger">
                                            <i class="ri-mail-close-line text-[1rem] text-white"></i>
                                        </span>
                                    @endif

                                </div>
                                <div class="flex-grow">
                                    <div class="flex items-center">
                                        @if ($item['user_tujuan'] !== null)
                                            <div class="sm:mt-0 mt-2">
                                                <p class="mb-0 text-[.875rem] font-semibold">
                                                    @if ($item['status_disposisi'] == 1)
                                                    Didistribusikan kepada: 
                                                    @elseif($item['status_disposisi'] == 2)
                                                    Didisposisikan kepada: 
                                                    @elseif($item['status_disposisi'] == 3)
                                                    Diteruskan kepada: 
                                                    @endif
                                                    {{ $item['user_tujuan']['name'] }}</p>
                                                    @if ($item['user_tujuan']['jabatan'] !== null)
                                                        <p class="mb-0 text-[#6a6d71] dark:text-white/50">{{ $item['user_tujuan']['jabatan']['nama_jabatan'] }}</p>
                                                    @endif
                                                <p class="mb-0 text-[#8c9097] dark:text-white/50">Pengirim: {{ $item['user']['name'] }}
                                                    @if ($item['user']['jabatan'] !== null)
                                                        - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                    @endif
                                                </p>
                                            </div>
                                        @elseif ($item['status_disposisi'] == 5)
                                            <div class="sm:mt-0 mt-2">
                                                <p class="mb-0 text-[.875rem] font-semibold">Surat Ditolak
                                                </p>
                                                <p class="mb-0 text-[#8c9097] dark:text-white/50">Ditolak oleh: {{ $item['user']['name'] }}
                                                    @if ($item['user']['jabatan'] !== null)
                                                        - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                    @endif
                                                </p>
                                            </div>
                                        @elseif ($item['status_disposisi'] == 4)
                                            <div class="sm:mt-0 mt-2">
                                                <p class="mb-0 text-[.875rem] font-semibold"> Surat Ditandai Selesai
                                                </p>
                                                <p class="mb-0 text-[#8c9097] dark:text-white/50">Ditandai selesai oleh: {{ $item['user']['name'] }}
                                                    @if ($item['user']['jabatan'] !== null)
                                                        - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                    @endif
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
     </div>
@endsection
