@extends('layouts.template')
@section('meta')
    @php
        $title = 'Data Tipe Arsip - HAJI ATOK';
        $deskripsi = 'Data Tipe Arsip - HAJI ATOK';
        $keywords = '';

    @endphp
    @include('meta::manager', [
        'title'         => $title,
        'description'   => $deskripsi,
        'image'         => asset('aqua/images/logo.png'),
        'keywords'  => $keywords,
        'author' => 'Akim Vaurozi, S.Kom',
        'referrer' => 'origin',
        'type' => 'website',
        'url' => url()->current(),
        'site_name' => $title,
        'site'=> url()->current(),
        'locale' => 'id'
    ])
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center
                        justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Tipe Arsip - HAJI ATOK</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('') }};">Dashboard</a></li>
                                <li class="breadcrumb-item active">Data Tipe Arsip</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div id="modalUbah" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ubahLabel"><i class="fa fa-edit"></i> Ubah Data</h5>
                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formUpdate" method="post">
                                {{ method_field('put') }}
                                @csrf
                                <input type="hidden" name="kd_tipe_arsip" id="kd_tipe_arsip">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="nama_tipe_arsip" class="form-label">Nama Tipe Arsip</label>
                                            <input class="form-control" type="text" id="nama_tipe_arsip" name="nama_tipe_arsip">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="uri" class="form-label">Uri</label>
                                            <input class="form-control" type="text" id="uri" name="uri">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn
                                btn-secondary waves-effect"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" id="btnUpdate" class="btn
                                btn-primary waves-effect
                                waves-light"><i class="fa fa-recycle"></i> Perbarui</button>
                        </div>
                            </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h4 class="card-title text-primary"><i class="fa fa-plus-circle"></i> Form Tambah Data Tipe Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form id="formSimpan" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="nama_tipe_arsip" class="form-label">Nama Tipe Arsip</label>
                                            <input class="form-control" type="text" name="nama_tipe_arsip" placeholder="Nama Tipe Arsip">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="uri" class="form-label">Uri</label>
                                            <input class="form-control" type="text" name="uri" placeholder="perkara-gugatan">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label class="text-white d-none d-md-block">Label Simpan</label>
                                            <div class="d-grid gap-2">
                                                <button id="btnSimpan" type="submit" class="btn btn-success waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h4 class="card-title text-primary"><i data-feather="box"></i> Data Tipe Arsip HAJI ATOK</h4>
                            <p class="card-title-desc">Melihat/ Menambah/ Mengubah/ Menghapus Data Tipe Arsip HAJI ATOK.
                            </p>

                        </div>
                        <div class="card-body">
                            <table id="tableTipeArsip" class="table table-bordered
                                dt-responsive w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tipe Arsip</th>
                                        <th>Uri</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
@push('script')

   <script>
       var table;
       $(function(){
            table = $('#tableTipeArsip').DataTable({
                processing: true,
                pageLength: 7,
                ordering: false,
                responsive: true,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                drawCallback: function( settings ) {
                    $('#btnReset').empty();
                    $('#btnReset').html('<i class="fa fa-recycle"></i> Refresh Data');
                    $('#btnReset').attr('disabled', false);
                    $("[data-toggle=tooltip").tooltip();
                },
                order: [],
                serverSide: true,
                ajax: {
                    url: route('tipe-arsip.index')
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false },
                    {
                        data: 'nama_tipe_arsip',
                        name: 'nama_tipe_arsip'
                    },
                    {
                        data: 'uri',
                        name: 'uri'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

        });

        function loadingSimpan(status){
            if (status) {
                $('#btnSimpan').empty();
                $('#btnSimpan').html('<i class="fa fa-spinner fa-spin"></i> Sedang Menyimpan...');
                $('#btnSimpan').attr('disabled', true);
            }else{
                $('#btnSimpan').empty()
                $('#btnSimpan').html('<i class="fa fa-save"></i> Simpan')
                $('#btnSimpan').attr('disabled', false)
            }
        }

        function loadingUpdate(status){
            if (status) {
                $('#btnUpdate').empty();
                $('#btnUpdate').html('<i class="fa fa-spinner fa-spin"></i> Sedang Memperbarui...');
                $('#btnUpdate').attr('disabled', true);
            }else{
                $('#btnUpdate').empty()
                $('#btnUpdate').html('<i class="fa fa-recycle"></i> Perbarui')
                $('#btnUpdate').attr('disabled', false)
            }
        }

        $('#btnSimpan').click(function(e){
            e.preventDefault();
            loadingSimpan(true);

            var data = new FormData(document.getElementById("formSimpan"));
            axios.post(route('tipe-arsip.store'),data)
            .then(function (response) {
                var data = response.data;
                loadingSimpan(false);

                if (data.status) {
                    notify('success','Berhasil!',data.message, 'right');
                    $('#formSimpan').trigger('reset');
                    $('input').blur();
                    table.draw();
                }else{
                    Swal.fire(
                        {
                            title: "Peringatan",
                            html: data.message,
                            icon: 'warning',
                            confirmButtonColor: '#5156be'
                        }
                    )
                }
            })
            .catch(function (error) {
                loadingSimpan(false);
                notify('danger','Error!',error, 'right');
            });

        });

        $('#btnUpdate').click(function(e){
            e.preventDefault();
            loadingUpdate(true);

            var data = new FormData(document.getElementById("formUpdate"));
            axios.post(route('tipe-arsip.update',[$('#kd_tipe_arsip').val()]),data)
            .then(function (response) {
                var data = response.data;
                loadingUpdate(false);

                if (data.status) {
                    notify('info','Berhasil!',data.message, 'right');
                    $('#modalUbah').modal('toggle');
                    $('#formUpdate').trigger('reset');
                    $('input').blur();
                    table.draw();
                }else{
                    Swal.fire(
                        {
                            title: "Peringatan",
                            html: data.message,
                            icon: 'warning',
                            confirmButtonColor: '#5156be'
                        }
                    )
                }
            })
            .catch(function (error) {
                loadingUpdate(false);
                notify('danger','Error!',error, 'right');
            });

        });

        function hapus(kd_tipe_arsip){
            Swal.fire({
                title: "Apakah anda yakin ?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#2ab57d",
                cancelButtonColor: "#fd625e",
                confirmButtonText: "Ya, saya yakin!"
            }).then(function (result) {
                if (result.value) {
                    // masukkan proses delete disini
                    axios.delete(route('tipe-arsip.destroy',[kd_tipe_arsip]))
                    .then(function (response) {
                        var data = response.data;

                        if (data.status) {
                            Swal.fire("Terhapus!", "Data anda berhasil dihapus!.", "success");
                            table.draw();
                        }else{
                            Swal.fire(
                                {
                                    title: "Peringatan",
                                    html: data.message,
                                    icon: 'warning',
                                    confirmButtonColor: '#5156be'
                                }
                            )
                        }
                    })
                    .catch(function (error) {
                        notify('danger','Error!',error, 'right');
                    });
                }
            });
        }

        function ubah(kd_tipe_arsip){
            axios.get(route('tipe-arsip.edit',[kd_tipe_arsip]))
            .then(function (response) {
                var data = response.data;
                $('#modalUbah').modal({backdrop: 'static', keyboard: false})
                $('#modalUbah').modal('toggle');
                $('#kd_tipe_arsip').val(data.kd_tipe_arsip);
                $('#nama_tipe_arsip').val(data.nama_tipe_arsip);
                $('#uri').val(data.uri);
            })
            .catch(function (error) {
                notify('danger','Error!',error, 'right');
            });

        }


   </script>
@endpush
