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
					<h3 class="box-title">User List</h3>
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>No Hp</th>
							<th>CP</th>
							<th>No TelponCp</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
						Add New Perusahaan
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
				<label class="border-bottom border-gray pb-2">Add Goods</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nama</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nip" placeholder="nip ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Alamat</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nidn" placeholder="nidn ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nama" placeholder="nama ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>CP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="alamat" placeholder="alamat ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No TelponCp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tempatTglLhr" placeholder="Tempat Tanggal Lahir ...">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Perusahaan
				</button>
			</div>
		</div>
	</div>
</div>
<!-- end of modal insert --->


<script>
	showData()
	function showData() {
		//datatables
		table = $('#myData').DataTable({
			"columnDefs": [ {
				"targets": 0,
				"width": "50px"
			},
				{
					"targets": [1,2,3],
					"width": "200px"
				}],
			"ordering": false,
			"destroy": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('Dosen/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var nip = document.getElementById("nip").value;
		var nidn = document.getElementById("nidn").value;
		var nama = document.getElementById("nama").value;
		var alamat = document.getElementById("alamat").value;
		var tempatTglLhr = document.getElementById("tempatTglLhr").value;
		var gender = document.getElementById("gender").value;
		var urutanAkademik = document.getElementById("urutanAkademik").value;
		var noHp = document.getElementById("noHp").value;

		$.ajax({
			url: "<?php echo base_url('Dosen/addData'); ?>",
			type: "post",
			data: {
				nip:nip,
				nidn:nidn,
				nama:nama,
				alamat:alamat,
				tempatTglLhr:tempatTglLhr,
				gender:gender,
				urutanAkademik:urutanAkademik,
				noHp:noHp,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
