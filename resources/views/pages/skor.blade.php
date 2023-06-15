<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Skor</h3>
                {{-- <p class="text-subtitle text-muted">This is the main page.</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Skor</li>
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
                        <h4 class="card-title">Daftar Skor Kandidat
                    </h4>
                    <div class="col-sm-3">
                        <form action="/skor" method="GET">
                            <input type="search" class="form-control" name="search" placeholder="Search nama..">
                        </form>
                    </div>
                    </div>
                    <div class="card-body">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Komunikasi</th>
                                        <th>Kerjasama</th>
                                        <th>Kejujuran</i></th>
                                        <th>Interpersonal</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $index => $i)
                                    <tr>
                                        <td scope="row">{{ $index + $item->firstItem() }}</td>
                                        <td class="text-bold-500">{{ $i->nama }}</td>
                                        <td>{{ $i->komunikasi }}</td>
                                        <td>{{ $i->kerjasama }}</td>
                                        <td>{{ $i->kejujuran }}</td>
                                        <td>{{ $i->interpersonal }}</td>
                                        <td>
                                            <form action="/skor/{{ $i->id }}" method="POST">
                                                <a type='button' href="/skor/{{ $i->id }}/edit" class="btn btn-warning btn-rounded btn-icon btn-sm">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $item->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</x-app-layout>
