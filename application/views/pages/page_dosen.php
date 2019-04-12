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
                    <h3 class="box-title">User Dosen</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-primary dt-responsive" id="myData" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
                        Add New Dosen
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
                <label class="border-bottom border-gray pb-2">Add Dosen</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>NIP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nip" placeholder="nip ...">
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
                        <label>Email</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="email" placeholder="email ...">
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
                        <label>NIP</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnip" placeholder="nip ...">
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
                        <label>Email</label>
                        <input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updemail" placeholder="email ...">
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
                "url": "<?php echo site_url('Dosen/getAll') ?>",
                "async": false,
                "type": "POST"
            },


        });

    };

    function AddData() {

        var nip = document.getElementById("nip").value;
        var nama = document.getElementById("nama").value;
        var email = document.getElementById("email").value;
       

        $.ajax({
            url: "<?php echo base_url('Dosen/addData'); ?>",
            type: "post",
            data: {
                nip: nip,
                nama: nama,
                email: email,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });
    }

    function deleteDosen(idDosen) {



        $.ajax({
            url: "<?php echo base_url('Dosen/deleteData'); ?>",
            type: "post",
            data: {
                idDosen: idDosen,
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

    function getOne(idDosen) {
        $.ajax({
            url: "<?php echo base_url('Dosen/getOne'); ?>",
            type: "post",
            data: {
                idDosen: idDosen,
            },
            cache: false,
            success: function(response) {
                response = JSON.parse(response);

                document.getElementById("updemail").value = response[0]['email'];
                document.getElementById("updnama").value = response[0]['nama'];
                document.getElementById("updnip").value = response[0]['nip'];
                document.getElementById("idDosen").value = response[0]['idDosen'];

                showModal();
            }
        });

    }

    function updateData() {

        var nip = document.getElementById("updnip").value;
        var idDosen = document.getElementById("idDosen").value;
        var nama = document.getElementById("updnama").value;
        var email = document.getElementById("updemail").value;

        $.ajax({
            url: "<?php echo base_url('Dosen/updateData'); ?>",
            type: "post",
            data: {
                idDosen: idDosen,
                nip: nip,
                nama: nama,
                email: email,

            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script>