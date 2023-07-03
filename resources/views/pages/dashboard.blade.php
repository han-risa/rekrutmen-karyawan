<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                {{-- <p class="text-subtitle text-muted"></p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Selamat Datang {{ Auth::user()->name }} !!</h4>
            </div>
            <div class="card-body">
                Halo {{ Auth::user()->name }} !! Ini adalah halaman dashboard.
                Silahkan bernavigasi menggunakan sidebar.
            </div>
        </div>
    </section>
</x-app-layout>
