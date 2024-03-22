    @include('partials.header')


    <div class="page-content-wrapper mt-10">

        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @if ($errors->first('message'))
                                <div class="form-group">
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('message') }}
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="form-group">
                                    <div class="alert alert-info" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="mt-0 header-title">Produk</h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Tambah Produk
                                    </button>
                                </div>
                            </div>






                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukkan Nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no">Harga</label>
                                                    <input type="number" name="harga" class="form-control"
                                                        placeholder="Masukkan Harga">
                                                </div>

                                                <div class="form-group">
                                                    <label for="matkul">Gambar</label>
                                                    <input type="file" name="foto" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <table id="datatable" class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </div> <!-- end col -->
    </div> <!-- end row -->
    @include('partials.footer')
