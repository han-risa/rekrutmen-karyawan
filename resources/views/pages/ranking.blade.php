<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Entropy</h3>
                {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Entropy</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <!-- Striped rows start -->
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Normalisasi</h4>
                    </div>
                    <div class="card-body">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>PosFlow</th>
                                        <th>NegFlow</th>
                                        <th>NetFlow</i></th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($item); $i++)
                                        <tr>
                                            <td class="text-bold-500">{{ $result[0][$i] }}</td>
                                            <td>{{ round($result[1][$i], 3) }}</td>
                                            <td>{{ round($result[2][$i], 3) }}</td>
                                            <td>{{ round($result[3][$i], 3) }}</td>
                                            <td>{{ ($result[4][$i]) }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</x-app-layout>
