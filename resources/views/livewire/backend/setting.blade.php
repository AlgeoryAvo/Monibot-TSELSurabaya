@foreach($setting as $row)

<div>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header ">
                    Website Information
                </div>
                <div class="card-body table-responsive">
                    <center>
                        <a href="javascript:void(0);"><img alt="" src="{{ asset('storage/'.$old_image) }}" width="150"
                                class="img-fluid"></a>
                    </center>
                    <br>
                    <table class="table table-bordered">
                        @foreach ($setting as $setting)

                        <tr>
                            <td>Nama Website</td>
                            <td>{{ $setting->web }}</td>
                            <td>Keyword</td>
                            <td>{{ $setting->keyword }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Email</td>
                            <td>{{ $setting->email }}</td>
                            <td>No.HP</td>
                            <td>{{ $setting->telp }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>{{ $setting->alamat }}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header  " >
                            Konfigurasi Logo Website
                        </div>
                        <div class="card-body table-responsive">
                            @error('photo')<div class="alert alert-danger">
                                {{ $message }}
                            </div> @enderror
                            @if (session()->has('msg'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('msg') }}</strong>
                            </div>

                            @endif
                            <br>

                            <form wire:submit.prevent='update'>
                                @csrf
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td colspan="4">
                                                @if ($new_image)
                                                <center>
                                                    <img src="{{$new_image->temporaryUrl()}}" width="250"
                                                        class="img mb-3 img-fluid img-thumbnail " alt="">
                                                </center>

                                                @endif
                                                <input type="file" wire:model='new_image' class="form-control"
                                                    id="customFile">
                                                <br>
                                                <span class="badge bg-warning text-dark">Kosongkan jika tidak
                                                    diubah..</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                    <div wire:loading wire:target="update" wire:key="update"><i
                                                            class="fa fa-spinner fa-spin"></i></div> Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header  " >
                            Konfigurasi Website
                        </div>
                        <div class="card-body table-responsive">

                            <form wire:submit.prevent='store'>
                                @csrf
                                <div class="table-responsive">
                                    <table class='table table-sm'>
                                        <tr>
                                            <td>Nama Website</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" wire:model='web' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keywords</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" wire:model='keyword' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" wire:model='telp' id=""
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Email</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" wire:model='email'
                                                        aria-describedby="helpId" placeholder="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Alamat</td>
                                            <td>
                                                <div class="form-group">
                                                    <textarea wire:model='alamat' id="" cols="30" rows="2"
                                                        class="form-control"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary ">
                                                    <div wire:loading wire:target="store" wire:key="store"><i
                                                            class="fa fa-spinner fa-spin"></i></div> Simpan
                                                </button>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="content-backdrop fade"></div>
    </div>
</div>


@if (session()->has('successlogo'))
<script>
    Swal.fire(
        "Informasi",
        "{{ session('successlogo') }}",
        "success"
    );

</script>
@endif
@if (session()->has('ubah'))
<script>
    Swal.fire(
        "Informasi",
        "{{ session('ubah') }}",
        "success"
    );

</script>
@endif
@if (session()->has('lat'))
<script>
    Swal.fire(
        "Informasi",
        "{{ session('lat') }}",
        "success"
    );

</script>
@endif

@error('image')
{{ $message }}
<script>
    Swal.fire(
        "Informasi",
        "{{ $message }}",
        "warning"
    );

</script>
@enderror
@endforeach
