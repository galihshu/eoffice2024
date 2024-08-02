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
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.1 3C16.0344 3.32311 16 3.65753 16 4C16 4.34247 16.0344 4.67689 16.1 5H4.51146L12.0619 11.662L17.1098 7.14141C17.5363 7.66888 18.0679 8.10787 18.6728 8.42652L12.0718 14.338L4 7.21594V19H20V8.89998C20.3231 8.96557 20.6575 9 21 9C21.3425 9 21.6769 8.96557 22 8.89998V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H16.1ZM21 1C22.6569 1 24 2.34315 24 4C24 5.65685 22.6569 7 21 7C19.3431 7 18 5.65685 18 4C18 2.34315 19.3431 1 21 1Z"></path></svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukBaru }}
                                    </h5>
                                    <!-- <div class="text-danger font-semibold"><i
                                        class="ri-arrow-down-s-fill me-1 align-middle"></i>-1.05%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">SURAT MASUK BARU</p>
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
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22 14H20V7.23792L12.0718 14.338L4 7.21594V19H14V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V14ZM4.51146 5L12.0619 11.662L19.501 5H4.51146ZM19 22L15.4645 18.4645L16.8787 17.0503L19 19.1716L22.5355 15.636L23.9497 17.0503L19 22Z"></path></svg>
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
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50  font-semibold">SURAT MASUK DIPROSES</p>
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
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 3C21.5523 3 22 3.44772 22 4V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V19H20V7.3L12 14.5L2 5.5V4C2 3.44772 2.44772 3 3 3H21ZM8 15V17H0V15H8ZM5 10V12H0V10H5ZM19.5659 5H4.43414L12 11.8093L19.5659 5Z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukDidisposisi }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.165%</div> -->
                                </div>
                                <p class="mb-0  text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">SURAT MASUK DIDISPOSISIKAN</p>
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
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 3L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3H20ZM20 9H4V19H20V9ZM13 10V14H16L12 18L8 14H11V10H13ZM18.7639 5H5.23656L4.23744 7H19.7639L18.7639 5Z"></path></svg>
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
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">SURAT MASUK SELESAI</p>
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
                                <span class="avatar avatar-md p-2 bg-danger">
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M22 14H20V7.23792L12.0718 14.338L4 7.21594V19H15V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V14ZM4.51146 5L12.0619 11.662L19.501 5H4.51146ZM21.4142 19L23.5355 21.1213L22.1213 22.5355L20 20.4142L17.8787 22.5355L16.4645 21.1213L18.5858 19L16.4645 16.8787L17.8787 15.4645L20 17.5858L22.1213 15.4645L23.5355 16.8787L21.4142 19Z"></path></svg>
                                </span>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-1 items-start justify-between">
                                    <h5 class="font-semibold mb-0 leading-none text-[1.25rem]">
                                    {{ $totalSuratMasukDitolak }}
                                    </h5>
                                    <!-- <div class="text-success font-semibold"><i
                                        class="ri-arrow-up-s-fill me-1 align-middle"></i>+0.21%</div> -->
                                </div>
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">SURAT MASUK DITOLAK</p>
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
                                    <svg class="svg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M20 3L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3H20ZM20 9H4V19H20V9ZM12 10L16 14H13V18H11V14H8L12 10ZM18.764 5H5.236L4.237 7H19.764L18.764 5Z"></path></svg>
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
                                <p class="mb-0 text-[0.625rem] opacity-[0.7] text-[#8c9097] dark:text-white/50 font-semibold">SURAT KELUAR</p>
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
                        label: 'Surat Didisposisikan',
                        data: [
                            {{ $disposisiPerKuartal[1] ?? 0 }},
                            {{ $disposisiPerKuartal[2] ?? 0 }},
                            {{ $disposisiPerKuartal[3] ?? 0 }},
                            {{ $disposisiPerKuartal[4] ?? 0 }},
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
        const statusLabels = ['Baru', 'Diproses', 'Disposisi', 'Selesai'];
        const statusData = [
            {{ $persentaseBaru }},
            {{ $persentaseDiproses }},
            {{ $persentaseDidisposisi }},
            {{ $persentaseSelesai }}
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
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
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
