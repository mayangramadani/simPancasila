<x-app-layout>
    <div class="pagetitle">
        <h1>Activity Log</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="#">Log Aktivitas</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 recent-sales overflow-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Log Aktivitas</h5>
                        <p>Kumpulan Log Aktivitas.</p>

                        <div class="tab-content pt-2" id="myTabContent">
                            <div class="table-responsive">
                                <table id="myTable1" class="datatable hover display compact nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">No.</th>
                                            @if (Auth::user()->role == 'admin')
                                                <th scope="col">Nama</th>
                                            @endif

                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Waktu</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($Aktivitas as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                @if (Auth::user()->role == 'admin')
                                                    <td class="text-center">{{ $item->causer['name'] }}</td>
                                                @endif
                                                <td class="text-center">{{ $item->description }}</td>
                                                <td class="text-center">{{ $item->created_at }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
                $('#myTable1').DataTable();
                $('#myTable2').DataTable();
            });
        </script>
    @endpush
</x-app-layout>
