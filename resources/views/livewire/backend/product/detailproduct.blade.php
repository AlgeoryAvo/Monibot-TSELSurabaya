<div>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header">
                    Data Produk PerOutlet </div>
                <div class="card-body table-responsive">
                    <table class="table  table-hover table-bordered" id="">
                        <thead class="student-thread">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Terjual</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($product as $row)
                                <?php $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>{{ $row->product }}</td>
                                    <td>{{ $row->terjual }}</td>
                                    <td>{{ number_format($row->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('edit-product', $row->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit text-dark"></i>
                                        </a>
                                        <a wire:click="$emit('triggerDelete',{{ $row->id }})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash text-light"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="alert alert-info" role="alert">
                        <strong>Total Penjualan : </strong> {{ number_format($product->sum('price'), 0, ',', '.') }}
                    </div>
                    <div class="d-flex justify-content-center">
                        {{-- {{ $product->links() }} --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                @this.on('triggerDelete', id => {
                    Swal.fire({
                        title: 'Hapus data ini?',
                        text: "Data yang sudah dihapus tidak dapat kembali!",
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @this.call('delete', id)
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
