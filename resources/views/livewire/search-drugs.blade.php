<div>
    <div class="container">
        {{-- <img class="rounded mx-auto d-block max-width: 25%; and height: auto" src="{{ asset('svg/ERMC Drug Formulary (150 × 75 px).svg') }}" --}}
            alt="description of myimage">
        {{-- <h1 class="text-center my-3">ERMC Drug Index</h1> --}}
        <div class="input-group mb-2">
            {{-- <span class="input-group-text" id="basic-addon1">Search</span> --}}
            <input wire:model.debounce.300ms="search" type="text" class="form-control"
                placeholder="Search by Brand Name | Active Ingredient | Group" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>
        {{-- <div class="border border-danger p-1">
            <small>The Meaning of The Icon</small>

            <div class="row my-2">
                <div class="col-5">
                    <p class="card-title"><strong><i class="bi bi-card-text"
                                style="font-size: 1rem; color: rgb(253, 11, 11);"></i></strong>
                        Active Ingredients</p>
                </div>

                <div class="col">
                    <p class="card-title"><strong><i class="bi bi-collection"
                                style="font-size: 1rem; color: rgb(0, 24, 238);"></i></strong>
                        Group</p>

                </div>

                <div class="col">
                    <p class="card-text"><i class="bi bi-wallet2 text-success"></i>
                        <strong>Price</strong>
                    </p>
                </div>
            </div>
        </div> --}}



        {{-- <div class="my-2 text-danger text-center border border-danger rounded">
            <small>
                The index contains the medicines available in the Egyptian Railway Hospital -
                Designed and Developed by the Department of Clinical Pharmacy, Railway Hospital.</small>
        </div> --}}






        {{-- Search Results --}}

        @forelse ($drugs as $drug)
            <div class="col-sm-12">

                <div class="card mb-3">
                    <h5 class="card-header">{{ $drug->tradename }} <small
                            class="text-danger">{{ $drug->note }}</small></h5>
                    <div class="card-body">

                        <p class="card-title"><strong><i class="bi bi-card-text"
                                    style="font-size: 1rem; color: rgb(253, 11, 11);"></i></strong>
                            {{ $drug->scientificname }}</p>

                        <p class="card-title"><strong><i class="bi bi-collection"
                                    style="font-size: 1rem; color: rgb(0, 24, 238);"></i></strong>
                            {{ $drug->subgroup }}</p>


                        <div class="row">
                            <div class="col">
                                <p class="card-text"><i class="bi bi-wallet2"
                                        style="font-size: 1rem; color:darkgreen"></i>
                                    <strong>{{ $drug->price }} EGP</strong>
                                </p>
                            </div>
                            {{-- Start Drug availability --}}
                            {{-- <div class="col-4 text-end">
                                @if (str_contains($drug->availability, 'YES'))
                                <span class="border rounded bg-light text-black px-1">
                                    <i class="bi bi-boxes"></i></span>
                                    <span class="border border-success rounded bg-success text-white px-1">
                                        <i class="bi bi-check-circle">
                                            {{ $drug->availability }}</i></span>
                                @else
                                <span class="border rounded bg-light text-black px-1">
                                    <i class="bi bi-boxes"></i></span>
                                    <span class="border border-danger rounded bg-danger text-white px-1">
                                        <i class="bi bi-x-circle"> {{ $drug->availability }}</i></span>
                                @endif
                            </div> --}}
                            {{-- <div class="has-text-right m-2">
                                <a href="/drug/{{ $drug->id }}"><button
                                        class="card-header-icon button is-info is-light is-rounded">More Info</button></a>
                            </div> --}}
                            {{-- End Drug availability --}}


                            <div class="col">
                                <!-- Button Side effects -->
                                <div class="text-end">
                                    <a href="/drug/{{ $drug->id }}"><button type="button" class="btn btn-danger btn-sm">Side Effects</button></a>
                                </div>
                            </div>
                        </div>









                    </div>


                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center text-danger">No Search Results Found</h5>
                        {{-- <h5 class="card-title text-center text-danger">لا يوجد نتائج للبحث</h5> --}}
                    </div>
                </div>
        @endforelse

        <div class="pagination justify-content-center">
            {{ $drugs->links() }}
        </div>

        <footer class="bg-light m-2 p-2 rounded">
            <div class="text-center">
                <h6>ERMC Drug Formulary V 1.0 was Designed and Developed by the Department of Clinical Pharmacy, Railway Hospital
                    <a href="https://ermcpharma.com/"> ERMCPharma.com</a>
                </h6>
                <h6>© ERMC | Clinical Pharmacy Department 2022</h6>
            </div>
        </footer>



    </div>
</div>
