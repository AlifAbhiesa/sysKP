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
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>nrp</th>
                                <th>Instansi</th>
                                <th>Judul Kp</th>
                                <th>D.Pembimbing</th>
                                <th>Jadwal Sidang Kp</th>
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
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nmmhsw" placeholder="Nama Mahasiswa...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="nrp ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Instansi</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="instansi" placeholder="Instansi ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Judul Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKp" placeholder="Judul Kp ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>D.pembimbing</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="dpmbg" placeholder="Dosen Pembimbing ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Jadwal Sidang Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="jdwlSdng" placeholder="Jadwal Sidang Kerja Praktik ...">
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
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnmmhsw" placeholder="Nama Mahasiswa ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnrp" placeholder="nrp ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Instansi</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updinstansi" placeholder="Instansi ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Judul Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjudulKp" placeholder="Judul Kerja Praktik ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>D.pembimbing</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="upddpmbg" placeholder="Dosen Pembimbing ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Jadwal Sidang Kp</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjdwlSdng" placeholder="Jadwal Sidang Kerja Praktik ...">
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

        var nmmhsw = document.getElementById("nmmhsw").value;
        var nrp = document.getElementById("nrp").value;
        var instansi = document.getElementById("instansi").value;
        var judulKp= document.getElementById("judulKp").value;
        var dpmbg = document.getElementById("dpmbg").value;
        var jdwlSdng = document.getElementById("jdwlSdng").value;

        $.ajax({
            url: "<?php echo base_url('Pengujian/addData'); ?>",
            type: "post",
            data: {
                nmmhsw: nmmhsw,
                nrp: nrp,
                instansi: instansi,
                judulKp: judulKp,
                dpmbg: dpmbg,
                jdwlSdng: jdwlSdng,
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
                document.getElementById("updjdwlSdng").value = response[0]['jdwlSdng'];
                document.getElementById("upddpmbg").value = response[0]['dpmbg'];
                document.getElementById("updjudulKp").value = response[0]['judulKp'];
                document.getElementById("updinstansi").value = response[0]['instansi'];
                document.getElementById("updnrp").value = response[0]['nrp'];
                document.getElementById("updnmmhsw").value = response[0]['nmmhsw'];
                document.getElementById("idPengujian").value = response[0]['id'];

                showModal();
            }
        });

    }

    function updateData() {

        var id = document.getElementById("idPengujian").value;
        var nmmhsw = document.getElementById("updnmmhsw").value;
        var nrp = document.getElementById("updnrp").value;
        var instansi = document.getElementById("updinstansi").value;
        var judulKp = document.getElementById("updjudulKp").value;
        var dpmbg = document.getElementById("upddpmbg").value;
        var jdwlSdng = document.getElementById("updjdwlSdng").value;

        $.ajax({
            url: "<?php echo base_url('Pengujian/updateData'); ?>",
            type: "post",
            data: {
                id: id,
                nmmhsw: nmmhsw,
                nrp: nrp,
                instansi: instansi,
                judulKp: judulKp,
                dpmbg: dpmbg,
                jdwlSdng: jdwlSdng,

            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script> 