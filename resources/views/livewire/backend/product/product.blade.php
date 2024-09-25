<div>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header">
                    Data Produk Outlet
                </div>
                <div class="card-body table-responsive">
                    <a href="{{ route('form-product') }}" class="btn btn-primary">Tambah Data Produk Outlet</a>
                    <div class="col-auto text-end float-end ms-auto download-grp">
                        <input type="text" wire:model="search" class="form-control" autocomplete="off"
                            placeholder="Cari data">
                    </div>
                    <br>
                    <br>
                    <table class="table  table-hover table-bordered" id="">
                        <thead class="student-thread">
                            <tr>
                                <th>No</th>
                                <th>Outlet</th>
                                <th>Lokasi</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($outlet as $row)
                                <?php $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->user->location }}</td>
                                    <td>
                                        <a href="{{ route('detail-product', $row->user_id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-eye text-dark"></i>
                                        </a>
                                        <a wire:click="$emit('triggerDelete',{{ $row->user_id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash text-light"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-center">
                        {{ $outlet->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('triggerDelete', user_id => {
                    Swal.fire({
                        title: 'Hapus data ini?',
                        text: "Data yang sudah dihapus tidak dapat kembali!",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('delete', user_id)
                        }
                    });
                });
            })
        </script>
    @endpush

    @if (session()->has('hapus'))
        <script>
            Swal.fire(
                "Informasi",
                "{{ session('hapus') }}",
                "success"
            );
        </script>
    @endif

</div>
