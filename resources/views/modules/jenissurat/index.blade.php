@extends('layouts.app')

@section('title', 'Jenis Surat')

@push('styles')
@endpush
 
@section('content')
        <!-- Page Header -->
        <div class="block justify-between page-header md:flex">
            <div>
                <h3
                    class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">
                    Jenis Surat</h3>
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
                <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
                    aria-current="page">
                    Jenis Surat
                </li>
            </ol>
        </div>
        <!-- Page Header Close -->    
        <div class="grid grid-cols-12 gap-6">
            <div class="xl:col-span-12 col-span-12">
                <div class="box custom-box">
                    <div class="box-header justify-between">
                        <div class="box-title">
                            Semua Jenis Surat
                        </div>

                        <div class="prism-toggle">
                            
                            <a href="{{ route('jenissurat.create')}}" class="form-control ti-btn !text-white !bg-primary ti-btn-wave" data-hs-overlay="#data-modal"><i class="bx bx-plus"></i>Tambah</a>
                            
                        </div>
                    </div>
                    <div class="box-body">
                        @include('layouts.partials._flash')
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush