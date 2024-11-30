@extends('Layouts.Main')

@section('title', 'Dashboard')

@section('css')
    <style>
        .card {
            min-height: 180px;
        }

        .card-body h5 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .card-body h3 {
            font-size: 2rem;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <h4 class="mb-4">Dashboard</h4>
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-university fa-3x text-primary"></i>
                        </div>
                        <div>
                            <h5>Perguruan Tinggi</h5>
                            {{-- <h3>{{ $perguruanTinggi }}</h3> --}}
                            <p class="text-muted">Jumlah perguruan tinggi di wilayah 7</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-graduation-cap fa-3x text-success"></i>
                        </div>
                        <div>
                            <h5>Program Studi</h5>
                            {{-- <h3>{{ $programStudi }}</h3> --}}
                            <p class="text-muted">Jumlah program studi di wilayah 7</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-building fa-3x text-warning"></i>
                        </div>
                        <div>
                            <h5>Bentuk Perguruan Tinggi</h5>
                            <p class="text-muted">Jumlah bentuk perguruan tinggi di wilayah 7</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-map-marker-alt fa-3x text-orange"></i>
                        </div>
                        <div>
                            <h5>Wilayah</h5>
                            <p class="text-muted">Jumlah kota/kabupaten di wilayah 7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Grafik Perguruan Tinggi</h5>
                        <p>Jumlah Berdasarkan Bentuk Lembaga</p>
                        <canvas id="chartPerguruanTinggi"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Grafik Program Studi</h5>
                        <p>Jumlah Berdasarkan Bentuk Lembaga</p>
                        <canvas id="chartProgramStudi"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Grafik Program Studi</h5>
                        <p>Jumlah Berdasarkan Program Pendidikan</p>
                        <canvas id="chartProgramPendidikan"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Evaluasi</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © LLDIKTI 7.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Develop by Tim Kelembagaan MSIB 7
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>
@endsection
