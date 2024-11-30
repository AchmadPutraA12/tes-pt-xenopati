@extends('Layouts.Main')

@section('title', 'Presensi')

@section('content')
    <div class="container-fluid">
        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Presensi</h5>
                            </div>
                            <div class="mb-2">
                                {{-- @can('Import Badan Penyelenggara')
                                    <button class="btn btn-success btn-sm me-2" data-bs-toggle="modal"
                                        data-bs-target="#importExcel">
                                        Import Excel
                                    </button>
                                @endCan
                                @can('Create Badan Penyelenggara')
                                    <a href="{{ route('badan-penyelenggara.create') }}" class="btn btn-primary btn-sm">
                                        Tambah Badan Penyelenggara
                                    </a>
                                @endCan --}}
                            </div>
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="dom_jq_event"
                                    class="table-striped table-bordered display text-nowrap table border"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Waktu Datang</th>
                                            <th>Waktu Checkout</th>
                                            <th>Terlambat</th>
                                            <th>Pulang Cepat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($presensis as $presensi)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{$presensi->employee->name}}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($presensi->check_in)->format('d-m-Y H:i:s') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($presensi->check_out)->format('d-m-Y H:i:s') }}
                                                </td>
                                                <td>
                                                    {{$presensi->late_in}}
                                                </td>
                                                <td>
                                                    {{$presensi->early_out}}
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#dom_jq_event')) {
                $('#dom_jq_event').DataTable().destroy();
            }

            $('#dom_jq_event').DataTable({
                "columnDefs": [{
                    "targets": 0,
                    "orderable": false,
                    "searchable": false,
                }],
                "drawCallback": function(settings) {
                    var api = this.api();
                    api.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }
            });
        });
    </script>
@endsection
