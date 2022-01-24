@extends('layouts.template')
@section('meta')
    @php
        $title = 'Arsip '.$tipe_arsip->nama_tipe_arsip;
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
                        <h4 class="mb-sm-0 font-size-18">Arsip Dokumen {{ $tipe_arsip->nama_tipe_arsip }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('') }};">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $tipe_arsip->nama_tipe_arsip }}</li>
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
                            <h5 class="modal-title" id="ubahLabel"><i class="fa fa-edit"></i> Ubah Arsip {{ $tipe_arsip->nama_tipe_arsip }}</h5>
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


            <div id="modalTambah" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fa fa-file-upload"></i> Unggah Arsip {{ $tipe_arsip->nama_tipe_arsip }}</h5>
                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formSimpan" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="kd_tipe_arsip" id="kd_tipe_arsip" value="{{ $tipe_arsip->kd_tipe_arsip }}">
                                <input type="hidden" name="jenis" id="fjenis">
                                <div class="form-group mt-2">
                                    <label for="nama_arsip" class="form-label">Nama Arsip</label>
                                    <input class="form-control" type="text" name="nama_arsip" placeholder="Nama Arsip">
                                    <small class="text-danger">Nama Arsip akan menjadi Nama File</small>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" type="text" name="keterangan" placeholder="Keterangan Tambahan Arsip" rows="3"></textarea>
                                    <small class="text-danger">Keterangan tambahan dari File</small>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nama_file" class="form-label">Arsip</label>
                                    <input class="form-control" type="file" name="nama_file" id="fnama_file">
                                    <small class="text-danger">Mendukung Seluruh Jenis File. Maksimal Ukuran 20MB</small>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn
                                btn-secondary waves-effect"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" id="btnSimpan" class="btn
                                btn-success waves-effect
                                waves-light"><i class="fa fa-save"></i> SIMPAN</button>
                        </div>
                            </form>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card border border-info">
                        <div class="card-header bg-transparent border-info py-2">
                            <h4 class="card-title text-info"><i class="fa fa-search"></i> Pencarian/ Filter</h4>
                        </div>
                        <div class="card-body">
                            <form id="formSearch">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="snama_arsip" class="form-label">Nama Arsip</label>
                                        <input type="text" id="snama_arsip" class="form-control" placeholder="Nama Arsip">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sjenis" class="form-label">Tipe File</label>
                                        <select class="form-control select2" name="sjenis" id="sjenis">
                                            <option value="" selected disabled>Pilih Tipe File</option>
                                            @foreach ($tipe_file as $item)
                                                <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">
                                            Berdasarkan Range Tanggal Input
                                        </label>
                                        <input type="text" class="form-control" id="tglInput" name="tglInput" placeholder="01/01/2022 - 31/12/2022">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="sketerangan" class="form-label">Keterangan Arsip</label>
                                        <input type="text" id="sketerangan" class="form-control" placeholder="Keterangan Arsip">
                                        {{-- <textarea id="sketerangan" class="form-control" placeholder="Keterangan Arsip"></textarea> --}}
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label for="suser" class="form-label">Diupload Oleh :</label>
                                        <select class="form-control select2" name="suser" id="suser">
                                            <option value="" selected disabled>Pilih User</option>
                                            @foreach (DB::table('users')->select('kd_user','nama_pegawai')->cursor() as $row)
                                                <option value="{{ $row->kd_user }}">{{ $row->nama_pegawai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="text-white d-none d-md-block">Label</label>
                                        <div class="d-grid gap-2">
                                            <button id="btnReset" class="btn btn-info waves-effect waves-light"><i class="fa fa-recycle"></i> Reset Pencarian</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border border-success">
                        <div class="card-header bg-transparent border-success">
                            <h4 class="card-title text-success"><i data-feather="box"></i> Data Arsip {{ $tipe_arsip->nama_tipe_arsip }} - HAJI ATOK</h4>
                            <p class="card-title-desc">Melihat/ Menambah/ Mengubah/ Menghapus Arsip {{ $tipe_arsip->nama_tipe_arsip }} HAJI ATOK.
                            </p>

                        </div>
                        <div class="card-body">
                            <button id="btnTambah" class="btn btn-primary"><i class="fa fa-file-upload"></i> Tambah Arsip</button>
                            <hr>
                            <table id="tableArsip" class="table table-bordered
                                dt-responsive w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
        var table, dateStart, dateEnd;
        $(function(){

            table = $('#tableArsip').DataTable({
                processing: true,
                pageLength: 7,
                ordering: false,
                searching: false,
                responsive: true,
                lengthMenu: [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                drawCallback: function( settings ) {
                    loadingReset(false);
                    $("[data-toggle=tooltip").tooltip();
                },
                order: [],
                serverSide: true,
                ajax: {
                    url: route('arsip.show',['{{ $tipe_arsip->uri }}']),
                    data: function (d) {
                        d.nama_arsip = $('#snama_arsip').val(),
                        d.jenis = $('#sjenis').val(),
                        d.dateStart = dateStart,
                        d.dateEnd = dateEnd,
                        d.keterangan = $('#sketerangan').val(),
                        d.kd_user = $('#suser').val()
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false },
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
                        data: 'user.nama_pegawai',
                        name: 'user.nama_pegawai'
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

            flatpickr('#tglInput', {
                locale: 'id',
                dateFormat: "d/m/Y",
                mode: "range",
                onClose:function(selectedDates){
                    var _this=this;
                    var dateArr=selectedDates.map(function(date){return _this.formatDate(date,'Y-m-d');});
                    dateStart = dateArr[0];
                    dateEnd = dateArr[1];

                    table.draw();
                },
            });

        });

        $("#snama_arsip").keyup(function(){
            delay(function(){
                table.draw();
            }, 250);
        });

        $("#sketerangan").keyup(function(){
            delay(function(){
                table.draw();
            }, 250);
        });

        $('#sjenis').on('select2:select',function(e){
            table.draw();
        });

        $('#suser').on('select2:select',function(e){
            table.draw();
        });

        $('#btnReset').click(function(e){
            e.preventDefault();
            loadingReset(true);
            $('#formSearch').trigger('reset');
            $('#sjenis').val(null).change();
            $('#suser').val(null).change();
            dateStart = '';
            dateEnd = '';
            table.draw();
        })

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

        function loadingReset(status){
            if (status) {
                $('#btnReset').empty();
                $('#btnReset').html('<i class="fa fa-spinner fa-spin"></i> Sedang Memuat...');
                $('#btnReset').attr('disabled', true);
            }else{
                $('#btnReset').empty()
                $('#btnReset').html('<i class="fa fa-recycle"></i> Refresh Pencarian')
                $('#btnReset').attr('disabled', false)
            }
        }

        $('#btnTambah').click(function(e){
            $('#modalTambah').modal({backdrop: 'static', keyboard: false})
            $('#modalTambah').modal('toggle');
        });

        $('#btnSimpan').click(function(e){
            e.preventDefault();
            loadingSimpan(true);

            var config;

            if( document.getElementById("fnama_file").files.length != 0 ){
                var fileName = document.querySelector('#fnama_file').value;
                var extension = fileName.substring(fileName.lastIndexOf('.') + 1);
                $('#fjenis').val(extension);

                var size = document.getElementById("fnama_file").files[0].size;
                var totalsize = Math.round(size/(1024*1024));

                config = {
                    onUploadProgress: function(progressEvent) {
                        var percent = Math.round(progressEvent.loaded/(1024*1024));
                        $('#btnSimpan').html('<i class="fa fa-spinner fa-spin"></i> Sedang Mengunggah... ( '+percent+' / '+totalsize+' MB )');
                        $('#btnSimpan').attr('disabled',true);
                    }
                }
            }

            var data = new FormData(document.getElementById("formSimpan"));
            axios.post(route('arsip.store'),data,config)
            .then(function (response) {
                var data = response.data;
                loadingSimpan(false);

                if (data.status) {
                    notify('success','Berhasil!',data.message, 'right');
                    $('#modalTambah').modal('toggle');
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
