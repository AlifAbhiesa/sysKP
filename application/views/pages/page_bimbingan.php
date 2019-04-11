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
                    <h3 class="box-title">User Dosen Bimbingan</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>

                    <div class="form-group">
                        <div class="md-input-wrapper">
                            <label>NRP</label>
                            <input type="text" class="form-control" id="nrp" placeholder="nomer registrasi pokok ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="md-input-wrapper">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="md-input-wrapper">
                            <label>Judul Kp</label>
                            <input type="text" class="form-control" id="judulKp" placeholder="Judul kerja Praktik ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="md-input-wrapper">
                            <label>Pengajuan Kp</label>
                            <input type="text" class="form-control" id="pengajuankp" placeholder="Pengajuan Kerja praktik ...">
                        </div>
                    </div>

                    <hr>
                    <table class="table table-bordered table-primary dt-responsive" id="myData" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Id_Bimbingan</th>
                                <th>Materi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                    <br>
                    <button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
                        Add New Dosen Bimbingan
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
                <label class="border-bottom border-gray pb-2">Add Bimbingan</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id_Bimbingan</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="id_bimbingan" placeholder="Id_Bimbingan ...">
                    </div>
                </div>


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Materi</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="materi" placeholder="Materi ...">
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
                <label class="border-bottom border-gray pb-2">Update Dosen Bimbingan</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Id_Bimbingan</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updid_bimbingan" placeholder="Id_Bimbingan ...">
                    </div>
                </div>


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Materi</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updmateri" placeholder="Materi ...">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="text" id="idDosen" hidden>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                </button>
                <button onclick="updateData()" type="button" class="btn btn-outline">Update
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
                "url": "<?php echo site_url('Bimbingan/getAll') ?>",
                "async": false,
                "type": "POST"
            },


        });

    };

    function AddData() {

        var nrp = document.getElementById("id_bimbingan").value;
        var nama = document.getElementById("materi").value;

        $.ajax({
            url: "<?php echo base_url('Bimbingan/addData'); ?>",
            type: "post",
            data: {
                id_bimbingan: id_bimbingan,
                materi: materi,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });
    }

    function deleteBbg(id) {



        $.ajax({
            url: "<?php echo base_url('Bimbingan/deleteData'); ?>",
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
            url: "<?php echo base_url('Bimbingan/getOne'); ?>",
            type: "post",
            data: {
                id: id,
            },
            cache: false,
            success: function(response) {
                response = JSON.parse(response);

                document.getElementById("updmateri").value = response[0]['materi'];
                document.getElementById("updid_bimbingan").value = response[0]['id_bimbingan'];
                document.getElementById("idDosen").value = response[0]['id'];

                showModal();
            }
        });

    }

    function updateData() {

        var id_bimbingan = document.getElementById("updid_bimbingan").value;
        var id = document.getElementById("idDosen").value;
        var materi = document.getElementById("updmateri").value;


        $.ajax({
            url: "<?php echo base_url('Bimbingan/updateData'); ?>",
            type: "post",
            data: {
                id_bimbingan: id_bimbingan,
                id: id,
                materi: materi,

            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script>