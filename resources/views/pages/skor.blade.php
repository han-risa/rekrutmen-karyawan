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
                        <li class="breadcrumb-item active" aria-current="page">Kandidat</li>
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
                            <a href="/kandidat/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">
                                <button type="button" class="btn btn-primary"><i class="bi bi-plus-circle-fill" width="16" height="16"></i> Tambah</button>
                            </a>
                        </h4>

                    </div>
                    <div class="card-content">
                        <!-- table striped -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Komunikasi</th>
                                        <th>Kerjasama</th>
                                        <th>Kejujuran</i></th>
                                        <th>Interpersonal</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $i)
                                    <tr>
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
                                                @method("delete")
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-rounded btn-icon btn-sm">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
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
    <!-- Striped rows end -->
</x-app-layout>
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="assets/scss/pages/simple-datatables.scss">

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/static/js/pages/simple-datatables.js"></script>
