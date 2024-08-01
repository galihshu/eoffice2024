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
                        Tracking Disposisi
                    </div>
                </div>
                <div class="box-body">
                    <div class="space-y-6 border-l-2 border-dashed">
                        @foreach ($data as $item)
                            <div>
                                <div class="space-x-3 flex items-center bg-slate-800 ">
                                    <i class='bx bx-check-circle bx-sm'></i>
                                    @if ($item['user_tujuan'] !== null)
                                        <div class="">
                                            <p class="text-lg">
                                                @if ($item['status_disposisi'] == 1)
                                                Didistribusikan kepada 
                                                @elseif($item['status_disposisi'] == 2)
                                                Didisposisikan kepada 
                                                @endif
                                                {{ $item['user_tujuan']['name'] }}
                                                @if ($item['user_tujuan']['jabatan'] !== null)
                                                    - {{ $item['user_tujuan']['jabatan']['nama_jabatan'] }}
                                                @endif
                                            </p>
                                            <p class="">Didisposisikan oleh {{ $item['user']['name'] }}
                                                @if ($item['user']['jabatan'] !== null)
                                                    - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                @endif
                                            </p>
                                        </div>
                                    @elseif ($item['status_disposisi'] == 5)
                                        <div class="">
                                            <p class="text-lg"> Surat Ditolak
                                            </p>
                                            <p class="">Ditolak oleh {{ $item['user']['name'] }}
                                                @if ($item['user']['jabatan'] !== null)
                                                    - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                @endif
                                            </p>
                                        </div>
                                    @elseif ($item['status_disposisi'] == 4)
                                        <div class="">
                                            <p class="text-lg"> Surat Ditandai Selesai
                                            </p>
                                            <p class="">Ditandai selesai oleh {{ $item['user']['name'] }}
                                                @if ($item['user']['jabatan'] !== null)
                                                    - {{ $item['user']['jabatan']['nama_jabatan'] }}
                                                @endif
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
