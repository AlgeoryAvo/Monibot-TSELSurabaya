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
                                        <h3 class="page-title">Form Operator</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <form wire:submit.prevent='store' method="post">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <input type="text" required class="form-control" wire:model='name'
                                                    placeholder="Masukan Nama">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="email" required class="form-control" wire:model='email'
                                                    placeholder="Masukan Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>
                                                <input type="password" required class="form-control"
                                                    wire:model='password' placeholder="Masukan password">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Level</td>
                                            <td>
                                                <select wire:model='level' class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Operator">Operator</option>
                                                    <option value="Atasan">Atasan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="{{ route('operator') }}" class="btn btn-warning"><i
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
