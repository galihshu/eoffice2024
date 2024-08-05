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
                    Form Ganti Password
                </div>

            </div>
            <div class="box-body">
                <form  action="{{ route('simpangantiPassword') }}" method="POST" class="sm:grid grid-cols-12 block gap-y-2 gap-x-4 items-center mb-4" enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="new_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="col-span-12 mb-4 sm:mb-0">
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
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