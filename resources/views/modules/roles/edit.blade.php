@extends('layouts.app')

@section('title', 'Edit Role')

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
            Edit Peran</h3>
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
        <li class="text-[0.813rem] ps-[0.5rem]">
            <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate"
                href="{{ route('role.index') }}">
                Peran
                <i
                    class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
            </a>
        </li>
        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 "
            aria-current="page">
            Edit Peran
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
                    <form action="{{ route('role.update', $role->id) }}" method="POST" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4">
                        @csrf
                        @method('PUT')
                        <div class="col-span-12 mb-4 sm:mb-0 {{ $errors->has('name') ? ' !border-red' : '' }}">
                            <label class="form-label" for="autoSizingInput">Nama Peran</label>
                            <input type="text" name="name" id="name" placeholder="Masukan Nama Role" value="{{ old('name', $role->name) }}" class="form-control">
                            @error('name')
                            <span class="text-red-500 text-xs hidden" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="col-span-12 mb-4 sm:mb-0">
                            <div class="flex flex-wrap">                        
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->permissions->contains($permission) ? 'checked' : '' }}> 
                                        <label class="form-check-label" for="">
                                        {{ $permission->name }}
                                        </label>&nbsp;&nbsp;
                                    </div>
                                @endforeach
                            </div>                
                        </div>
                        <div class="col-span-12">
                            <button type="submit" class="ti-btn ti-btn-primary-full !mb-0 mt-4">Update</button>
                            <a href="{{ route('role.index') }}" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
