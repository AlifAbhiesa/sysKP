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
                    <h3 class="box-title">Pengajuan</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <table class="table table-bordered table-primary dt-responsive" id="myData" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2" style="text-align: center">Perusahaan</th>
                                <th colspan="3" style="text-align: center">Aproval</th>
                            </tr>
						<tr>
							<th style="text-align: center">Wali</th>
							<th style="text-align: center">Perusahaan</th>
							<th style="text-align: center">Koordinator</th>
						</tr>

                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
                        Ajukan Kerja Praktek
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
                <label class="border-bottom border-gray pb-2">Ajukan Kerja Praktek</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">


               <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>ID Perusahaan</label>
                        <select style="border-top: none; border-left: none; border-right: none" class="form-control" id="idPerusahaan">
                            <option> ---- Pick ----</option>
                        <?php foreach ($list_perusahaan as $row) : ?>
                           <option value="<?php echo $row['idPerusahaan'] ?>"> <?php echo $row['namaPerusahaan'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>


                 <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>ID Dosen</label>
                        <select style="border-top: none; border-left: none; border-right: none" class="form-control" id="idDosen">
                            <option> ---- Pick ----</option>
                        <?php foreach ($list_dosen as $dsn) : ?>
                           <option value="<?php echo $dsn['idDosen'] ?>"> <?php echo $dsn['nama'] ?></option>
                        <?php endforeach; ?>
                        </select>
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
                <label class="border-bottom border-gray pb-2">Approval</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div class="md-input-wrapper">
                        <label>Approve Perusahaan</label>
                        <select id="approvalPerusahaan" style="border-top: none; border-left: none; border-right: none" class="form-control">
							<option value="Y">Approve</option>
							<option value="N">Reject</option>
						</select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="text" id="idPengajuan" hidden>
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
                "url": "<?php echo site_url('Pengajuan/getAll') ?>",
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

    function showModal() {
        $('#UpdateModal').modal('show');
    }

    function getOne(id) {

       document.getElementById("idPengajuan").value = id;

       showModal();
    }

    function updateData() {

        var idPengajuan = document.getElementById("idPengajuan").value;
        var status = document.getElementById("approvalPerusahaan").value;

        $.ajax({
            url: "<?php echo base_url('Pengajuan/saveApprovePerusahaan'); ?>",
            type: "post",
            data: {
				idPengajuan:idPengajuan,
				status:status,
            },
            cache: false,
            success: function(response) {
                // alert(response);
                location.reload();
            }
        });

    }
</script>
