@extends('Layouts.Main')

@section('title', 'Gaji')

@section('content')
    <div class="container-fluid">
        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Gaji</h5>
                            </div>
                            <form method="GET" action="{{ route('perhitungan-gaji.index') }}">
                                <div class="d-flex mb-2">
                                    <div class="me-3">
                                        <label for="bulan">Pilih Bulan</label>
                                        <select name="bulan" id="bulan" class="form-control"
                                            onchange="this.form.submit()">
                                            <option value="" {{ $bulan == '' ? 'selected' : '' }}>-- Semua Bulan --
                                            </option>
                                            <option value="1" {{ $bulan == 1 ? 'selected' : '' }}>Januari</option>
                                            <option value="2" {{ $bulan == 2 ? 'selected' : '' }}>Februari</option>
                                            <option value="3" {{ $bulan == 3 ? 'selected' : '' }}>Maret</option>
                                            <option value="4" {{ $bulan == 4 ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ $bulan == 5 ? 'selected' : '' }}>Mei</option>
                                            <option value="6" {{ $bulan == 6 ? 'selected' : '' }}>Juni</option>
                                            <option value="7" {{ $bulan == 7 ? 'selected' : '' }}>Juli</option>
                                            <option value="8" {{ $bulan == 8 ? 'selected' : '' }}>Agustus</option>
                                            <option value="9" {{ $bulan == 9 ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ $bulan == 10 ? 'selected' : '' }}>Oktober</option>
                                            <option value="11" {{ $bulan == 11 ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ $bulan == 12 ? 'selected' : '' }}>Desember</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="tahun">Pilih Tahun</label>
                                        <select name="tahun" id="tahun" class="form-control"
                                            onchange="this.form.submit()">
                                            <option value="" {{ $tahun == '' ? 'selected' : '' }}>-- Semua Tahun --
                                            </option>
                                            @for ($i = date('Y') - 5; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <!-- Pesan informasi bahwa proses sedang berlangsung -->
                            @if (isset($message))
                                <div class="alert alert-info">
                                    {{ $message }}
                                </div>
                            @endif

                            <!-- Tabel Gaji -->
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="dom_jq_event"
                                    class="table-striped table-bordered display text-nowrap table border"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Gaji Pokok</th>
                                            <th>Bonus</th>
                                            <th>BPJS</th>
                                            <th>JP</th>
                                            <th>Cicilan</th>
                                            <th>Total Gaji</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gajis as $index => $gaji)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $gaji->employee->name }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('m', $gaji->month)->format('F') }}
                                                </td>
                                                <td>{{ $gaji->year }}</td>
                                                <td>Rp {{ number_format($gaji->basic_salary, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($gaji->bpjs, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($gaji->jp, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($gaji->loan, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format($gaji->total_salary, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                <strong>Total Gaji yang Akan Dibayar: </strong>
                                <span>Rp {{ number_format($totalGaji, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
