<!-- profile.blade.php -->

@extends('layouts.app')

@section('title', 'Profile')

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
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">
            Profil</h3>
    </div>
    <ol class="flex items-center whitespace-nowrap min-w-0">
        <li class="text-[0.813rem] ps-[0.5rem]">
            <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="/home">
                Home
                <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
            </a>
        </li>
        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
            Profil
        </li>
    </ol>
</div>
<div class="grid grid-cols-12 gap-6">
    <div class="xl:col-span-12 col-span-12">
        <div class="box custom-box">
            <div class="box-header justify-between">
                <div class="box-title">
                    Detail Profil
                </div>
            </div>
            <div class="box-body">
                {{-- kasih keterangan anda terdaftar pada dan terakhir update --}}
                <div class="flex justify-between mb-4">
                    <div class="text-[0.9rem] text-defaulttextcolor dark:text-white/50">
                        {{-- Anda terdaftar pada @formatDate($user->created_at) --}}
                        Anda terdaftar pada @formatDateTime($user->created_at)
                    </div>
                </div>
                <form class="grid gap-6" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->jabatan_id }}">
                    <div class="form-group">
                        <label for="name" class="font-bold">Nama</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" readonly class="form-control editable">
                    </div>
                    <div class="form-group">
                        {{-- photo --}}
                        <label for="photo" class="font-bold">Foto</label>
                        <div class="flex items center">
                            <img src="{{ asset(Auth::user()->photo) }}" alt="photo" id="photo-preview" class="w-20 h-20 rounded-full editable">
                        </div>
                        <input type="file" id="photo" name="photo" class="form-control editable hidden" accept="image/*">
                    </div>
                    {{-- note double click --}}
                    <small class="text-[0.9rem] !text-danger form-text text-muted">* Double click pada bagian yang ingin diubah untuk mengubah</small>

                    <div class="form-group">
                        <button type="submit" class="ti-btn !text-white !bg-success ti-btn-wave !hidden">Perbarui</button>
                        <button id="batal" type="button" class="ti-btn !text-white !bg-danger ti-btn-wave !hidden">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- script apabila input di double click mode berubah jadi aktif dan tombol perbarui muncul --}}
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
        $('.editable').dblclick(function() {
            // jika select hapus disabled
            if ($(this).is('select')) {
                $(this).prop('disabled', false);
            } else {
                if ($('#photo').is('input')) {
                    $('#photo').removeClass('hidden');
                }
                $(this).prop('readonly', false);
            }
            $(this).addClass('border border-primary');
            $(this).next().removeClass('hidden');
            // if this name jabatan
            if ($(this).attr('id') == 'jabatan-nama') {
                $(this).addClass('hidden');
                $(this).next().removeClass('hidden');
            }
            // show button type submit
            $(this).closest('form').find('button').removeClass('!hidden');

        });
        // batal clicked penanganan khusus jika select diubah select hidden input jabatan show
        $('#batal').click(function() {
            $('.editable').prop('readonly', true);
            $('.editable').removeClass('border border-primary');
            $('.editable').next().addClass('hidden');
            $('.editable').closest('form').find('button').addClass('!hidden');
            //$('#jabatan-nama').removeClass('hidden');
            // hide input photo
            $('#photo').addClass('hidden');

            //$('#jabatan-select').addClass('hidden');
            // $('.mode-edit').remove();
        });
    });

    /*{{-- jabatan-select change --}}
    $('#jabatan-select').change(function() {
        $('#jabatan-nama').val($(this).find('option:selected').text());
        $('#jabatan-input').val($(this).val());
    });
    */

</script>
@endpush
