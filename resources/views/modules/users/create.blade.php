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
                    Form Tambah Baru
                </div>

            </div>
            <div class="box-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4 gap-6">
                    @csrf
                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required>

                        <!-- error message untuk name -->
                        @error('name')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="email">Email Pengguna</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required>

                        <!-- error message untuk email -->
                        @error('email')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- photo --}}
                    <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="photo">Foto Pengguna</label>
                        {{-- preview selected here no photo path online --}}
                        <div class="flex items center">
                            <img src="{{ asset("eofficeadmin/images/authentication/default.png") }}" id="photo-preview" alt="photo" class="w-20 h-20 rounded-full">
                        </div>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                               name="photo" accept="image/*" id="photo">

                        <!-- error message untuk photo -->
                        @error('photo')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                    <div class="col-span-12 mb-4 sm:mb-0">        
                        <label for="jabatan_id">Pilih Jabatan</label>
                        <select class="form-control" id="jabatan_id" name="jabatan_id">
                            @foreach ($jabatans as $jabatan)
                               <option value="{{ old('jabatan_id',$jabatan->id) }}" required>{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                         </select>
                        @error('jabatan_id')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- peran --}}
                    <div class="col-span-12 mb-4 sm:mb-0">        
                        <label for="peran">Pilih Peran</label>
                        <select class="form-control" id="peran" name="peran" required>
                            @foreach ($roles as $role)
                               <option value="{{ old('roles',$role->name) }}">{{ $role->name }}</option>
                            @endforeach
                         </select>
                        @error('peran')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required>

                        <!-- error message untuk password -->
                        @error('password')
                        <div class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                     <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control"
                               name="password_confirmation" required>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // image preview
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photo-preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#photo").change(function() {
                readURL(this);
            });
        });
    </script>
@endpush