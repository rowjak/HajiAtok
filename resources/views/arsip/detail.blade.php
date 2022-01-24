@extends('layouts.template')
@section('meta')
    @php
        $title = 'Pencarian Arsip';
        $deskripsi = $title;
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
                        <h4 class="mb-sm-0 font-size-18">Pencarian Arsip Keyword : <u>{{ $keyword }}</u></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('') }};">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pencarian</li>
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
                            <h5 class="modal-title" id="ubahLabel"><i class="fa fa-edit"></i> Ubah Arsip</h5>
                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formUpdate" method="post" enctype="multipart/form-data">
                                {{ method_field('put') }}
                                @csrf
                                <input type="hidden" name="kd_arsip" id="kd_arsip">
                                <input type="hidden" name="jenis" id="jenis">
                                <div class="form-group mt-2">
                                    <label for="nama_arsip" class="form-label">Nama Arsip</label>
                                    <input class="form-control" type="text" id="nama_arsip" name="nama_arsip">
                                    <small class="text-danger">Nama Arsip akan menjadi Nama File</small>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" type="text" id="keterangan" name="keterangan"></textarea>
                                    <small>Keterangan tambahan dari File</small>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="kd_tipe_arsip" class="form-label">Tipe Arsip</label>
                                    <select class="form-control select2-ubah" name="kd_tipe_arsip" id="kd_tipe_arsip">
                                        @foreach ($tipe_arsip_all as $item)
                                            <option value="{{ $item->kd_tipe_arsip }}">{{ $item->nama_tipe_arsip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nama_file" class="form-label">Arsip</label>
                                    <input class="form-control" type="file" id="nama_file" name="nama_file">
                                    <small class="text-danger">Jika tidak ingin mengubah Arsip, abaikan Field ini<br/>Mendukung Seluruh Jenis File. Maksimal Ukuran 20MB</small>
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

                <div class="col-12">
                    <div class="card border border-success">
                        <div class="card-header bg-transparent border-success">
                            <h4 class="card-title text-success"><i class="fa fa-search"></i> Hasil Pencarian Arsip</h4>
                        </div>
                        <div class="card-body">
                            <table id="tableArsip" class="table table-bordered
                                dt-responsive w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Arsip</th>
                                        <th>Nama Arsip</th>
                                        <th>Keterangan</th>
                                        <th>Jenis File</th>
                                        <th>Tanggal Upload</th>
                                        <th>User</th>
                                        <th>Unduh</th>
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

            table = $('#tableArsip').DataTable({
                processing: true,
                pageLength: 7,
                ordering: false,
                searching: false,
                responsive: true,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                drawCallback: function( settings ) {
                    $("[data-toggle=tooltip").tooltip();
                },
                order: [],
                serverSide: true,
                ajax: {
                    url: route('arsip.search'),
                    data: function (d) {
                        d.keyword = '{{ $keyword }}'
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false },
                    {
                        data: 'nama_tipe_arsip',
                        name: 'nama_tipe_arsip'
                    },
                    {
                        data: 'nama_arsip',
                        name: 'nama_arsip'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'tgl_upload',
                        name: 'tgl_upload'
                    },
                    {
                        data: 'nama_pegawai',
                        name: 'nama_pegawai'
                    },
                    {
                        data: 'unduh',
                        name: 'unduh'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });

        });

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

        $('#btnUpdate').click(function(e){
            e.preventDefault();
            loadingUpdate(true);

            var config;

            if( document.getElementById("nama_file").files.length != 0 ){
                var fileName = document.querySelector('#nama_file').value;
                var extension = fileName.substring(fileName.lastIndexOf('.') + 1);
                $('#jenis').val(extension);

                var size = document.getElementById("nama_file").files[0].size;
                var totalsize = Math.round(size/(1024*1024));

                config = {
                    onUploadProgress: function(progressEvent) {
                        var percent = Math.round(progressEvent.loaded/(1024*1024));
                        $('#btnUpdate').html('<i class="fa fa-spinner fa-spin"></i> Sedang Memperbarui... ( '+percent+' / '+totalsize+' MB )');
                        $('#btnUpdate').attr('disabled',true);
                    }
                }
            }

            var data = new FormData(document.getElementById("formUpdate"));
            axios.post(route('arsip.update',[$('#kd_arsip').val()]),data,config)
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

        function hapus(kd_arsip){
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
                    axios.delete(route('arsip.destroy',[kd_arsip]))
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

        function ubah(kd_arsip){
            axios.get(route('arsip.edit',[kd_arsip]))
            .then(function (response) {
                var data = response.data;
                $('#modalUbah').modal({backdrop: 'static', keyboard: false})
                $('#modalUbah').modal('toggle');
                $('#kd_arsip').val(data.kd_arsip);
                $('#kd_tipe_arsip').val(data.kd_tipe_arsip).change();
                $('#jenis').val(data.jenis);
                $('#nama_arsip').val(data.nama_arsip);
                $('#keterangan').text(data.keterangan);
            })
            .catch(function (error) {
                notify('danger','Error!',error, 'right');
            });

        }

   </script>
@endpush
