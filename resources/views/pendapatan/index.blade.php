@extends('layouts.master')
@section('menu', 'Daftar Laporan')
@section('title', 'Laporan Pendapatan')
@push('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@section('content')
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center pt-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">

                <form class="" action="{{ route('pendapatan.index') }}" method="get" {{-- enctype="multipart/form-data" --}}
                    data-tonggle="validator">
                    @csrf
                    {{-- @method('get') --}}
                    <!--begin::Input group-->
                    <div class="row mb-8">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Tanggal Awal</span>
                            </label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                value="{{ request('tanggal_awal') }}" required autofocus>
                        </div>
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Tanggal Akhir</span>
                            </label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}" required>
                        </div>
                        <div class="col mt-8">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label" style="width:100px;"><i class="fa fa-search"
                                        aria-hidden="true"></i> Cari</span>
                            </button>
                        </div>
                        <div class="col mt-8">
                            <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank"
                                class="btn btn-dark" style="width:140px">
                                <i class="bi bi-file-pdf" aria-hidden="true"></i> Export PDF
                            </a>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <!--end::Actions-->
                </form>

            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-10px"> No </th>
                        <th class="min-w-50px">Tanggal</th>
                        <th class="min-w-70px">Penjualan</th>
                        <th class="min-w-70px">Pembelian</th>
                        <th class="min-w-70px">Pendapatan</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--begin::Body-->
                <!--begin::Table body-->
                <!--end::Table body-->
            </table>
        </div>
        <!--end::Table container-->
    </div>
@endsection

@push('scripts')
    </script>
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'penjualan'
                    },
                    {
                        data: 'pembelian'
                    },
                    {
                        data: 'pendapatan'
                    }
                ],
                dom: 'Brt',
                bSort: false,
                bPaginate: false
            });

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });

        });

        function updatePeriode() {
            $('#modal-form').modal('show');
        }

        // Mendapatkan referensi ke elemen input tanggal_awal dan tanggal_akhir
        const tanggalAwalInput = document.getElementById('tanggal_awal');
        const tanggalAkhirInput = document.getElementById('tanggal_akhir');

        // Menambahkan event listener pada tanggal_awal saat nilai berubah
        tanggalAwalInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const minDate = selectedDate.toISOString().split('T')[0];
            tanggalAkhirInput.min = minDate;
        });

        const today = new Date();
        const maxDate = today.toISOString().split('T')[0];
        tanggalAwalInput.max = maxDate;
        tanggalAkhirInput.max = maxDate;
    </script>
@endpush
