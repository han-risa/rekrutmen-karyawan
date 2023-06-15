<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kandidat</h3>
                <p class="text-subtitle text-muted">Silahkan edit data kandidat.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/skor">Skor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Data Kandidat</h4>
                </div>
                <form method="POST" action="/skor/{{ $item->id }}">
                    {{ @method_field('PUT') }}
                    @csrf
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Nama Lengkap</label>
                                            <input type="text" class="form-control" placeholder="Nama Lengkap"
                                                name="nama" value="{{ $item->nama }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="mobile-id-vertical">Email</label>
                                            <div class="position-relative">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    name="email" value="{{ $item->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="mobile-id-vertical">No. Handphone</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="No. Handphone"
                                                    name="noHp" value="{{ $item->noHp }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="jenisKelamin" disabled>
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="3" disabled>{{ $item->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="invalid-state">Komunikasi</label>
                                            <input type="text" class="form-control" name="komunikasi"
                                                value="{{ $item->komunikasi }}" placeholder="Nilai" min="0"
                                                max="40">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Masukkan nilai antara 0 - 40
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="invalid-state">Kerjasama</label>
                                            <input type="text" class="form-control" name="kerjasama"
                                                value="{{ $item->kerjasama }}" placeholder="Nilai" min="0"
                                                max="40">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Masukkan nilai antara 0 - 40
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="invalid-state">Kejujuran</label>
                                            <input type="text" class="form-control" name="kejujuran"
                                                value="{{ $item->kejujuran }}" placeholder="Nilai" min="0"
                                                max="40">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Masukkan nilai antara 0 - 40
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="invalid-state">Interpersonal</label>
                                            <input type="text" class="form-control" name="interpersonal"
                                                value="{{ $item->interpersonal }}" placeholder="Nilai" min="0"
                                                max="40">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Masukkan nilai antara 0 - 40
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end mb-1">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
