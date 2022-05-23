<div>
    <div class="container">
        <img class="rounded mx-auto d-block max-width: 25%; and height: auto" src="{{ asset('img/ermc2.png') }}"
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
                    <h5 class="card-header">{{ $drug->tradename }} <small class="text-danger">{{ $drug->note }}</small></h5>
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

                            <div class="col-4 text-end">
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
                            </div>
                            {{-- <div class="has-text-right m-2">
                                <a href="/drug/{{ $drug->id }}"><button
                                        class="card-header-icon button is-info is-light is-rounded">More Info</button></a>
                            </div> --}}

                    
                            {{-- <div class="col">
                                <!-- Button trigger modal -->
                                {{-- <div class="text-end">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        SIDE EFFECTS
                                    </button>
                                </div> --}}


                            <!-- Modal -->
                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ $drug->scientificname }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $drug->se }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
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
                <h6>This index was Designed and Developed by the Department of Clinical Pharmacy, Railway Hospital
                    <a href="https://ermcpharma.online/"> ERMCPharma.online</a>
                </h6>
                <h6>© ERMC | Clinical Pharmacy Department 2022</h6>
            </div>
        </footer>



    </div>
</div>
