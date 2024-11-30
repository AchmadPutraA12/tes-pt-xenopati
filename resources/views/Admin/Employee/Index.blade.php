@extends('Layouts.Main')

@section('title', 'Pegawai')

@section('content')
    <div class="container-fluid">
        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Pegawai</h5>
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm">
                                    Tambah Pegawai
                                </a>
                            </div>
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="dom_jq_event"
                                    class="table-striped table-bordered display text-nowrap table border"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $pegawai)
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{ $pegawai->name }}
                                                </td>
                                                <td>
                                                    {{ $pegawai->email }}
                                                </td>
                                                <td>
                                                    {{ $pegawai->address }}
                                                </td>
                                                <td>
                                                    {{ $pegawai->phone }}
                                                </td>
                                                <td>
                                                    <img src="{{ Str::startsWith($pegawai->user_picture, 'https')
                                                        ? $pegawai->user_picture
                                                        : Storage::url($pegawai->user_picture) }}"
                                                        alt="{{ $pegawai->name }}" style="width: 100px; margin-top: 10px;">
                                                </td>

                                                <td>
                                                    <a href="{{ route('employee.edit', $pegawai->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('employee.destroy', $pegawai->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
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
