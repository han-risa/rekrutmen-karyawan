<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Entropy</h3>
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
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <strong>Normalisasi</strong>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- table striped -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>K1</th>
                                                        <th>K2</th>
                                                        <th>K3</th>
                                                        <th>K4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <tr>
                                                            @for ($j = 0; $j < 4; $j++)
                                                                <td>{{ round($c[$j][$i], 3) }}</td>
                                                            @endfor
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <strong>Preferensi</strong>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- table striped -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>K1</th>
                                                        <th>K2</th>
                                                        <th>K3</th>
                                                        <th>K4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <tr>
                                                            @for ($j = 0; $j < 4; $j++)
                                                                <td>{{ round($cnor[$j][$i], 3) }}</td>
                                                            @endfor
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        <strong>Hasil Nilai Entropy</strong>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- table striped -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>K1</th>
                                                        <th>K2</th>
                                                        <th>K3</th>
                                                        <th>K4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <tr>
                                                            @for ($j = 0; $j < 4; $j++)
                                                                <td>{{ round($ctor[$j][$i], 3) }}</td>
                                                            @endfor
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        <strong>Hasil Bobot Entropy</strong>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- table striped -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>K1</th>
                                                        <th>K2</th>
                                                        <th>K3</th>
                                                        <th>K4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @for ($j = 0; $j < 4; $j++)
                                                            <td>{{ round($entWeight[$j], 3) }}</td>
                                                        @endfor
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Striped rows end -->
</x-app-layout>
