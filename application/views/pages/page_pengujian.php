<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 23:13
 */
?>


<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listUser">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">User Pengujian</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-primary dt-responsive" id="myData" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Id Bimbingan</th>
                                <th>Id Kp</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Judul Kp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
                        Add New Pengujian
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!--- Modal Insert --->
<div class="modal modal-success fade" id="AddModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Pengujian</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id Bimbingan</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idBmbg" placeholder="Id Bimbingan...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idKp" placeholder="Id Kerja Praktek ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="Nomor Registrasi Pokok ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nama" placeholder="Nama ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Judul Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKp" placeholder="Judul Kp ...">
                    </div>
</div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                </button>
                <button onclick="AddData()" type="button" class="btn btn-outline">Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end of modal insert --->

<!--- Modal update --->
<div class="modal modal-success fade" id="UpdateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Pengujian</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

            <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id Bimbingan</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidBmbg" placeholder="Id Bimbingan...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidKp" placeholder="Id Kerja Praktek ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnrp" placeholder="Nomor Registrasi Pokok ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnama" placeholder="Nama ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Judul Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjudulKp" placeholder="judul kerja praktik ...">
                    </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <input type="text" id="idPengujian" hidden>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                </button>
                <button onclick="updateData()" type="button" class="btn btn-outline">update Pengujian
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end of modal update --->


<script>
    showData()

    function showData() {
        //datatables
        table = $('#myData').DataTable({
            "columnDefs": [{
                    "targets": 0,
                    "width": "50px"
                },
                {
                    "targets": [1, 2, 3],
                    "width": "200px"
                }
            ],
            "ordering": false,
            "destroy": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Pengujian/getAll') ?>",
                "async": false,
                "type": "POST"
            },


        });

    };

    function AddData() {

        var idBmbg = document.getElementById("idBmbg").value;
        var idKp = document.getElementById("idKp").value;
        var nrp = document.getElementById("nrp").value;
        var nama = document.getElementById("nama").value;
        var judulKp = document.getElementById("judulKp").value;

        $.ajax({
            url: "<?php echo base_url('Pengujian/addData'); ?>",
            type: "post",
            data: {
                idBmbg: idBmbg,
                idKp: idKp,
                nrp: nrp,
                nama: nama,
                judulKp: judulKp,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }

    function deletePengujian(id) {

        $.ajax({
            url: "<?php echo base_url('Pengujian/deleteData'); ?>",
            type: "post",
            data: {
                id: id,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }

    function showModal() {
        $('#UpdateModal').modal('show');
    }

    function getOne(id) {
        $.ajax({
            url: "<?php echo base_url('Pengujian/getOne'); ?>",
            type: "post",
            data: {
                id: id,
            },
            cache: false,
            success: function(response) {
                response = JSON.parse(response);
                document.getElementById("updidBmbg").value = response[0]['idBmbg'];
                document.getElementById("updjudulKp").value = response[0]['judulKp'];
                document.getElementById("updnama").value = response[0]['nama'];
                document.getElementById("updnrp").value = response[0]['nrp'];
                document.getElementById("updidKp").value = response[0]['idKp'];
                document.getElementById("idPengujian").value = response[0]['id'];

                showModal();
            }
        });

    }

    function updateData() {

        var id = document.getElementById("idPengujian").value;
        var nama = document.getElementById("updnama").value;
        var nrp = document.getElementById("updnrp").value;
        var idKp = document.getElementById("updidKp").value;
        var judulKp = document.getElementById("updjudulKp").value;
        var idBmbg = document.getElementById("updidBmbg").value;
        
        $.ajax({
            url: "<?php echo base_url('Pengujian/updateData'); ?>",
            type: "post",
            data: {
                id: id,
                idBmbg: idBmbg,
                idKp: idKp,
                nrp: nrp,
                nama: nama,
                judulKp: judulKp,
                
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script>