<div>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Form Produk</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <form wire:submit.prevent='store' method="post">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td>Produk</td>
                                            <td>
                                                <input type="text" required class="form-control" wire:model='product'
                                                    placeholder="Masukan Produk">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Terjual</td>
                                            <td>
                                                <input type="number" required class="form-control" wire:model='terjual'
                                                    placeholder="Masukan Terjual">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>
                                                <input type="number" required class="form-control"
                                                    wire:model='price' placeholder="Masukan harga">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Outlet</td>
                                            <td>
                                                <select wire:model='iduser' class="form-control">
                                                    <option value="">Pilih</option>
                                                    @foreach ($user as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('product') }}" class="btn btn-warning"><i
                                                        class="fas fa-sync-alt    "></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary ">
                                                    <div wire:loading wire:target="store" wire:key="store"><i
                                                            class="fa fa-spinner fa-spin"></i></div> Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
    @if (session()->has('insert'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('insert') }}",
                "success"
            );
        </script>
    @endif

</div>
