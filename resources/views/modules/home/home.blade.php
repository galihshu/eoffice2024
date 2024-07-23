@extends('layouts.app')

@section('title', 'Administrator')

@section('content')
<div class="block justify-between page-header md:flex">
    <div>
        <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold"> Dashboards</h3>
    </div>
    <ol class="flex items-center whitespace-nowrap min-w-0">
        <li class="text-[0.813rem] ps-[0.5rem]">
          <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="{{ route('home') }}">
            Dashboards
            <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] px-[0.5rem] overflow-visible dark:text-white/50 rtl:rotate-180"></i>
          </a>
        </li>
        <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">
            Dashboards
        </li>
    </ol>
</div>
<!-- Page Header Close -->

<div class="grid grid-cols-12 gap-x-12">
    <div class="xxxl:col-span-12 col-span-12">
        <div class="grid grid-cols-12 gap-x-6">
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-4 gap-0">
                                <span class="avatar avatar-md p-2 bg-primary">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M21 11h-3V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v14c0 1.654 1.346 3 3 3h14c1.654 0 3-1.346 3-3v-6a1 1 0 0 0-1-1zM5 19a1 1 0 0 1-1-1V5h12v13c0 .351.061.688.171 1H5zm15-1a1 1 0 0 1-2 0v-5h2v5z"></path><path d="M6 7h8v2H6zm0 4h8v2H6zm5 4h3v2h-3z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">10</h5>
                                    <!-- <div class="text-danger font-semibold"><i
                                        class="ri-arrow-down-s-fill me-1 align-middle"></i>-1.05%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-4">
                                <span class="avatar avatar-md p-2 bg-secondary">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" height="24px"
                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <rect fill="none" height="24" width="24" />
                                        <g>
                                            <path d="M5.559 8.855c.166 1.183.789 3.207 3.087 4.079C11 13.829 11 14.534 11 15v.163c-1.44.434-2.5 1.757-2.5 3.337 0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5c0-1.58-1.06-2.903-2.5-3.337V15c0-.466 0-1.171 2.354-2.065 2.298-.872 2.921-2.896 3.087-4.079C19.912 8.441 21 7.102 21 5.5 21 3.57 19.43 2 17.5 2S14 3.57 14 5.5c0 1.552 1.022 2.855 2.424 3.313-.146.735-.565 1.791-1.778 2.252-1.192.452-2.053.953-2.646 1.536-.593-.583-1.453-1.084-2.646-1.536-1.213-.461-1.633-1.517-1.778-2.252C8.978 8.355 10 7.052 10 5.5 10 3.57 8.43 2 6.5 2S3 3.57 3 5.5c0 1.602 1.088 2.941 2.559 3.355zM17.5 4c.827 0 1.5.673 1.5 1.5S18.327 7 17.5 7 16 6.327 16 5.5 16.673 4 17.5 4zm-4 14.5c0 .827-.673 1.5-1.5 1.5s-1.5-.673-1.5-1.5.673-1.5 1.5-1.5 1.5.673 1.5 1.5zM6.5 4C7.327 4 8 4.673 8 5.5S7.327 7 6.5 7 5 6.327 5 5.5 5.673 4 6.5 4z"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">15</h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.40%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50  font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-warning">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="m7.375 16.781 1.25-1.562L4.601 12l4.024-3.219-1.25-1.562-5 4a1 1 0 0 0 0 1.562l5 4zm9.25-9.562-1.25 1.562L19.399 12l-4.024 3.219 1.25 1.562 5-4a1 1 0 0 0 0-1.562l-5-4zm-1.649-4.003-4 18-1.953-.434 4-18z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">10</h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.82%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-success">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" height="24px"
                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <g>
                                            <path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"></path><path d="M8 6h9v2H8z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">13</h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.21%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-pink">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M20 17V7c0-2.168-3.663-4-8-4S4 4.832 4 7v10c0 2.168 3.663 4 8 4s8-1.832 8-4zM12 5c3.691 0 5.931 1.507 6 1.994C17.931 7.493 15.691 9 12 9S6.069 7.493 6 7.006C6.069 6.507 8.309 5 12 5zM6 9.607C7.479 10.454 9.637 11 12 11s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2V9.607zM6 17v-2.393C7.479 15.454 9.637 16 12 16s4.521-.546 6-1.393v2.387c-.069.499-2.309 2.006-6 2.006s-5.931-1.507-6-2z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">08</h5>
                                    <!-- <div class="text-danger font-semibold"><i
                                        class="ri-arrow-down-s-fill me-1 align-middle"></i>-0.153%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-warning">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" height="24px"
                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                            <path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path><path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">20</h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.165%</div> -->
                                </div>
                                <p class="mb-0  text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-danger">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" height="24px"
                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                            <path d="M3 16h2v5H3zm4-3h2v8H7zm4-3h2v11h-2zm4-3h2v14h-2zm4-3h2v17h-2z"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">4000</h5>
                                    <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>Byte</div>
                                </div>
                                <p class="mb-0  text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-3 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-primary">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"
                                        enable-background="new 0 0 24 24" height="24px"
                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm7.931 9h-2.764a14.67 14.67 0 0 0-1.792-6.243A8.013 8.013 0 0 1 19.931 11zM12.53 4.027c1.035 1.364 2.427 3.78 2.627 6.973H9.03c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027zm-3.842.7C7.704 6.618 7.136 8.762 7.03 11H4.069a8.013 8.013 0 0 1 4.619-6.273zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm7.381 6.973C10.049 18.275 9.222 15.896 9.041 13h6.113c-.208 2.773-1.117 5.196-2.603 6.972-.182.012-.364.028-.551.028-.186 0-.367-.016-.55-.027zm4.011-.772c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201z"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">95</h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.165%</div> -->
                                </div>
                                <p class="mb-0  text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DATA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
