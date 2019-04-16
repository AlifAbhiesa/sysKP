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
                    <h3 class="box-title">User Mahasiswa</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-primary dt-responsive" id="myData" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>ID Dosen Wali</th>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Transkrip</th>
                            </tr>
                        </thead>
                    </table>
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
                <label class="border-bottom border-gray pb-2">Add Mahasiswa</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>ID Dosen Wali</label>
                        <select style="border-top: none; border-left: none; border-right: none" class="form-control" id="idDosenWali">
                            <option> ---- Pick ----</option>
                            <?php foreach ($list_dosen as $row) : ?>
                                <option value="<?php echo $row['idDosen'] ?>"> <?php echo $row['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nama" placeholder="nama ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="nomer registrasi pokok ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>No HP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nohp" placeholder="No Hp ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Transkrip</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="transkrip" placeholder="transkrip ...">
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
                <label class="border-bottom border-gray pb-2">Update Mahasiswa</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>ID Dosen Wali</label>
                        <select style="border-top: none; border-left: none; border-right: none" class="form-control" id="updidDosenWali">
                            <option> ---- Pick ----</option>
                            <?php foreach ($list_dosen as $row) : ?>
                                <option value="<?php echo $row['idDosen'] ?>"> <?php echo $row['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Nama</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnama" placeholder="nama ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NRP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnrp" placeholder="nomer registrasi pokok ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>No HP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnohp" placeholder="No Hp ...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Transkrip</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updtranskrip" placeholder="transkrip ...">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="text" id="idMahasiswa" hidden>
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
                "url": "<?php echo site_url('Mahasiswa/getAll') ?>",
                "async": false,
                "type": "POST"
            },


        });

    };

    function AddData() {

        var idDosenWali = document.getElementById("idDosenWali").value;
        var nama = document.getElementById("nama").value;
        var nrp = document.getElementById("nrp").value;
        var nohp = document.getElementById("nohp").value;
        var transkrip = document.getElementById("transkrip").value;

        $.ajax({
            url: "<?php echo base_url('Mahasiswa/addData'); ?>",
            type: "post",
            data: {
                idDosenWali: idDosenWali,
                nama: nama,
                nrp: nrp,
                nohp: nohp,
                transkrip: transkrip,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });
    }

    function deleteMahasiswa(idMahasiswa) {



        $.ajax({
            url: "<?php echo base_url('Mahasiswa/deleteData'); ?>",
            type: "post",
            data: {
                idMahasiswa: idMahasiswa,
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

    function getOne(idMahasiswa) {
        $.ajax({
            url: "<?php echo base_url('Mahasiswa/getOne'); ?>",
            type: "post",
            data: {
                idMahasiswa: idMahasiswa,
            },
            cache: false,
            success: function(response) {
                response = JSON.parse(response);

                document.getElementById("updtranskrip").value = response[0]['transkrip'];
                document.getElementById("updidDosenWali").value = response[0]['idDosenWali'];
                document.getElementById("updnohp").value = response[0]['nohp'];
                document.getElementById("updnama").value = response[0]['nama'];
                document.getElementById("updnrp").value = response[0]['nrp'];
                document.getElementById("idMahasiswa").value = response[0]['idMahasiswa'];

                showModal();
            }
        });

    }

    function updateData() {
        var idDosenWali = document.getElementById("updidDosenWali").value;
        var nrp = document.getElementById("updnrp").value;
        var idMahasiswa = document.getElementById("idMahasiswa").value;
        var nama = document.getElementById("updnama").value;
        var nohp = document.getElementById("updnohp").value;
        var transkrip = document.getElementById("updtranskrip").value;

        $.ajax({
            url: "<?php echo base_url('Mahasiswa/updateData'); ?>",
            type: "post",
            data: {
                idMahasiswa: idMahasiswa,
                idDosenWali: idDosenWali,
                nrp: nrp,
                nama: nama,
                nohp: nohp,
                transkrip: transkrip,

            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script>