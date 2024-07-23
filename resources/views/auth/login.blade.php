@extends('layouts.auth')

@section('content')
<div class="xxl:col-span-7 xl:col-span-7 lg:col-span-12 col-span-12">
    <div class="flex justify-center items-center h-full">
      <div class="xxl:col-span-3 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-2"></div>
      <div class="xxl:col-span-6 xl:col-span-6 lg:col-span-6 md:col-span-6 sm:col-span-8 col-span-12">
            <div class="p-[3rem]">
                <div class="mb-4">
                    <a aria-label="anchor" href="{{ url('/login') }}">
                        <img src="{{ asset('eofficeadmin/images/brand-logos/logo-eoffice.png') }}" alt="" class="authentication-brand desktop-logo" width="250">
                        <img src="{{ asset('eofficeadmin/images/brand-logos/logo-eoffice-dark.png') }}" alt="" class="authentication-brand desktop-dark" width="250">
                    </a>
                </div>
                <p class="h5 font-semibold mb-2">Login</p>
                <p class="mb-4 text-[#8c9097] dark:text-white/50 opacity-[0.7] font-normal">Mohon Masukkan informasi akun Anda untuk mulai menggunakan e-Office BPKAD Provinsi Lampung</p>

                <div class="grid grid-cols-12 gap-y-4">
                    <form class="xl:col-span-12 col-span-12" method="POST" action="{{ route('login') }}">
                        
                        @csrf
                        
                        <div class="xl:col-span-12 col-span-12 mt-0 mb-4">
                            <label for="email" class="form-label text-default">{{ __('Email Address') }}</label>
                            <input type="email" id="email" class="form-control form-control-lg w-full !rounded-md @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="user name">

                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="xl:col-span-12 col-span-12 mb-4">
                            <label for="password" class="form-label text-default block">{{ __('Password') }}</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control form-control-lg !rounded-e-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                <button aria-label="button" type="button" class="ti-btn ti-btn-light !rounded-s-none !mb-0" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>
                            <div class="mt-2">
                                <div class="form-check !ps-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-[#8c9097] dark:text-white/50 font-normal" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="xl:col-span-12 col-span-12 grid mt-2">
                            <button type="submit" class="ti-btn ti-btn-lg bg-primary text-white !font-medium dark:border-defaultborder/10"> {{ __('Login') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="xxl:col-span-3 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-2"></div>
    </div>
</div>
<div class="xxl:col-span-5 xl:col-span-5 lg:col-span-5 col-span-12 xl:block hidden px-0">
    <div class="authentication-cover">
        <div class="aunthentication-cover-content rounded">
            <div class="swiper keyboard-control">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="text-white text-center p-[3rem] flex items-center justify-center">
                            <div>
                                <div class="mb-[3rem]">
                                    <img src="{{ asset('eofficeadmin/images/authentication/office1.png') }}" class="authentication-image" alt="">
                                </div>
                                <h6 class="font-semibold text-[1rem]">Quote hari ini</h6>
                                <p class="font-normal text-[.875rem] opacity-[0.7]"> "Kesuksesan bukanlah akhir, kegagalan bukanlah fatal: yang terpenting adalah keberanian untuk terus melangkah." - Winston Churchill</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-white text-center p-[3rem] flex items-center justify-center">
                            <div>
                                <div class="mb-[3rem]">
                                    <img src="{{ asset('eofficeadmin/images/authentication/office4.png') }}" class="authentication-image" alt="">
                                </div>
                                <h6 class="font-semibold text-[1rem]">Quote hari ini</h6>
                                <p class="font-normal text-[.875rem] opacity-[0.7]"> "Jangan pernah meremehkan kekuatan dari semangat dan dedikasi. Mereka adalah kunci untuk meraih impianmu."</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="text-white text-center p-[3rem] flex items-center justify-center">
                            <div>
                                <div class="mb-[3rem]">
                                    <img src="{{ asset('eofficeadmin/images/authentication/office3.png') }}" class="authentication-image" alt="">
                                </div>
                                <h6 class="font-semibold text-[1rem]">Quote hari ini</h6>
                                <p class="font-normal text-[.875rem] opacity-[0.7]"> "Jangan biarkan tantangan menghentikan langkahmu. Anggaplah mereka sebagai batu loncatan menuju pencapaian yang lebih besar."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
@endsection
