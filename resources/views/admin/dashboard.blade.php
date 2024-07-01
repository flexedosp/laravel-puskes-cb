@extends('layouts.admin')
{{-- <x-navbar-admin /> --}}
@section('container-admin')
    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <!-- Navbar Header -->
            <x-navbar-admin />
            <!-- End Navbar -->
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="container py-5">

                    <h3 class="fw-bold text-center mb-4">Selamat Datang di Dashboard Admin!</h3>
                    <div class="d-flex flex-wrap justify-content-center mb-4">
                        <div class="card mb-3 mx-4" style="max-width: 540px;">
                            <div class="row g-0">
                                <div
                                    class="col-md-4 bg-primary rounded-start d-flex justify-content-center align-items-center">
                                    <i class="fas fa-users fs-1 text-white px-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Pengunjung</h5>
                                        <p class="card-text">{{ ($countVisitor >= 1) ? $countVisitor : "0" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 mx-4" style="max-width: 540px;">
                            <div class="row g-0">
                                <div
                                    class="col-md-4 bg-danger rounded-start d-flex justify-content-center align-items-center">
                                    <i class="fas fa-newspaper fs-1 text-white px-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Berita</h5>
                                        <p class="card-text">{{  ($countBerita >= 1) ? $countBerita : "0" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 mx-4" style="max-width: 540px;">
                            <div class="row g-0">
                                <div
                                    class="col-md-4 bg-success rounded-start d-flex justify-content-center align-items-center">
                                    <i class="fas fa-book fs-1 text-white px-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Modul</h5>
                                        <p class="card-text">{{  ($countModul >= 1) ? $countModul : "0" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        <h3 class="text-center mb-4">Grafik Batang Pengunjung Website</h3>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="startDate" class="form-label">Tanggal Awal:</label>
                                <input type="date" id="startDate" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="endDate" class="form-label">Tanggal Akhir:</label>
                                <input type="date" id="endDate" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button id="filterButton" class="btn btn-primary w-100">Terapkan Filter</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <canvas id="visitorChart" style="width: 300px; height:80%"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <x-footer-admin />
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('visitorChart').getContext('2d');
            let chart;

            // Fungsi untuk memformat tanggal ke string 'yyyy-mm-dd'
            function formatDate(date) {
                const d = new Date(date);
                let month = '' + (d.getMonth() + 1);
                let day = '' + d.getDate();
                const year = d.getFullYear();

                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;

                return [year, month, day].join('-');
            }

            // Setel nilai input tanggal dengan default
            const today = new Date();
            const endDateDefault = formatDate(today);
            const startDateDefault = formatDate(new Date(today.setDate(today.getDate() - 9)));

            document.getElementById('startDate').value = startDateDefault;
            document.getElementById('endDate').value = endDateDefault;

            // Fungsi untuk memperbarui atau membuat ulang grafik
            function updateChart(data) {
                const labels = data.map(item => item.access_date);
                const jumlah = data.map(item => item.jumlah);

                if (chart) {
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = jumlah;
                    chart.update();
                } else {
                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Pengunjung',
                                data: jumlah,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category',
                                    title: {
                                        display: true,
                                        text: 'Tanggal'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Pengunjung'
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // Inisialisasi grafik dengan data statis dari PHP
            const visitorData = <?=  json_encode($visitorGroup); ?>;
            updateChart(visitorData);

            // Fungsi untuk memfilter data berdasarkan tanggal
            function filterData(startDate, endDate) {
                const filteredData = visitorData.filter(item => {
                    const itemDate = item.access_date;
                    return (!startDate || itemDate >= startDate) && (!endDate || itemDate <= endDate);
                });

                updateChart(filteredData);
            }

            // Event listener untuk tombol filter
            document.getElementById('filterButton').addEventListener('click', function() {
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;
                filterData(startDate, endDate);
            });
        });
        </script>
    </div>
@endsection
