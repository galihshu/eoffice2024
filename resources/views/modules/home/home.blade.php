@extends('layouts.app')

@section('title', 'Administrator')

@push('styles')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

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
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-4 gap-0">
                                <span class="avatar avatar-md p-2 bg-primary">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z"></path><path d="M14 9h-4v3H7l5 5 5-5h-3z"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukBaru }}
                                    </h5>
                                    <!-- <div class="text-danger font-semibold"><i
                                        class="ri-arrow-down-s-fill me-1 align-middle"></i>-1.05%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL SURAT BARU</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-4">
                                <span class="avatar avatar-md p-2 bg-secondary">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="m21.555 8.168-9-6a1 1 0 0 0-1.109 0l-9 6A1 1 0 0 0 2 9v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V9c0-.334-.167-.646-.445-.832zM12 4.202 19.197 9 12 13.798 4.803 9 12 4.202zM4 20v-9.131l7.445 4.963a1 1 0 0 0 1.11 0L20 10.869 19.997 20H4z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukDiproses }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.40%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50  font-semibold">TOTAL SURAT DIPROSES</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-warning">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="m21.706 5.291-2.999-2.998A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.291A.994.994 0 0 0 2 5.999V19c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5.999a.994.994 0 0 0-.294-.708zM6.414 4h11.172l.999.999H5.415L6.414 4zM4 19V6.999h16L20.002 19H4z"></path><path d="M15 12H9v-2H7v4h10v-4h-2z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukSelesai }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.82%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL SURAT SELESAI</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-success">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z"></path><path d="M7 14h3v3h4v-3h3l-5-5z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratKeluar }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.21%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL SURAT KELUAR</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-pink">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg"><path d="M19 7a1 1 0 0 0-1-1h-8v2h7v5h-3l3.969 5L22 13h-3V7zM5 17a1 1 0 0 0 1 1h8v-2H7v-5h3L6 6l-4 5h3v6z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalDisposisi }}
                                    </h5>
                                    <!-- <div class="text-danger font-semibold"><i
                                        class="ri-arrow-down-s-fill me-1 align-middle"></i>-0.153%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL DISPOSISI</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xxl:col-span-4 md:col-span-6 col-span-12">
                <div class="box">
                    <div class="box-body !pb-[0.9rem]">
                        <div class="flex items-start">
                            <div class="me-3">
                                <span class="avatar avatar-md p-2 bg-warning">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalUser }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.165%</div> -->
                                </div>
                                <p class="mb-0  text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">TOTAL USER</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xxl:col-span-8 md:col-span-8 col-span-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Perbandingan jumlah surat per kuartal</h5>
                    </div>
                    <div class="box-body !pb-[0.9rem]">
                        <canvas id="quarterlyChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="xxl:col-span-4 md:col-span-4 col-span-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">Persentase status surat masuk</h5>
                    </div>
                    <div class="box-body !pb-[0.9rem]">
                        <canvas id="statusPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@push('scripts')
    <script>
        // Data kuartal
        const quarterlyLabels = ['Kuartal 1', 'Kuartal 2', 'Kuartal 3', 'Kuartal 4'];

        // Inisialisasi Bar Chart
        const ctxQuarterly = document.getElementById('quarterlyChart').getContext('2d');
        const quarterlyChart = new Chart(ctxQuarterly, {
            type: 'bar', // Tipe grafik batang
            data: {
                labels: quarterlyLabels,
                datasets: [
                    {
                        label: 'Surat Masuk',
                        data: [
                            {{ $suratMasukPerKuartal[1] ?? 0 }},
                            {{ $suratMasukPerKuartal[2] ?? 0 }},
                            {{ $suratMasukPerKuartal[3] ?? 0 }},
                            {{ $suratMasukPerKuartal[4] ?? 0 }},
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Surat Keluar',
                        data: [
                            {{ $suratKeluarPerKuartal[1] ?? 0 }},
                            {{ $suratKeluarPerKuartal[2] ?? 0 }},
                            {{ $suratKeluarPerKuartal[3] ?? 0 }},
                            {{ $suratKeluarPerKuartal[4] ?? 0 }},
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Disposisi',
                        data: [
                            {{ $disposisiPerKuartal[1] ?? 0 }},
                            {{ $disposisiPerKuartal[2] ?? 0 }},
                            {{ $disposisiPerKuartal[3] ?? 0 }},
                            {{ $disposisiPerKuartal[4] ?? 0 }},
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data untuk Pie Chart
        const statusLabels = ['Baru', 'Diproses', 'Selesai'];
        const statusData = [
            {{ $totalSuratMasukBaru }},
            {{ $totalSuratMasukDiproses }},
            {{ $totalSuratMasukSelesai }}
        ];

        // Inisialisasi Pie Chart
        const ctxStatusPie = document.getElementById('statusPieChart').getContext('2d');
        const statusPieChart = new Chart(ctxStatusPie, {
            type: 'pie', // Tipe grafik lingkaran
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
@endpush
