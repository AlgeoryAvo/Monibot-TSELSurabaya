<div>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="alert alert-info" role="alert">
                <strong>Selamat Datang</strong> {{ auth()->user()->name }}
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div>

                            </div>
                            <span class="fw-semibold d-block mb-1">Produk</span>
                            <h3 class="card-title mb-2">{{ $produk->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                        class="rounded" />
                                </div>

                            </div>
                            <span>Outlet</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $outlet->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-backdrop fade"></div>
        </div>
    </div>
</div>
