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
                Users</h3>
        </div>
        <ol class="flex items-center whitespace-nowrap min-w-0">
            <li class="text-[0.813rem] ps-[0.5rem]">
                <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate"
                    href="javascript:void(0);">
                    Users
                    <i
                        class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                </a>
            </li>
            <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
                aria-current="page">
                User
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
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4">
                    @csrf
                    @method('PUT')
                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name', $user->name) }}" required>

                        <!-- error message untuk name -->
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="email">Email Pengguna</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email', $user->email) }}" required>

                        <!-- error message untuk email -->
                        @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-span-12 mb-4 sm:mb-0">                        
                        <label for="jabatan_id">Pilih Jabatan</label>
                        <select class="form-control" id="jabatan_id" name="jabatan_id">
                            @foreach ($jabatans as $jabatan)
                               <option value="{{ old('jabatan_id',$jabatan->id) }}">{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                         </select>
                        @error('jabatan_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 mt-4">Simpan</button>
                        <a href="{{ route('user.index') }}" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection