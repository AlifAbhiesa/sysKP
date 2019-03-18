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
							<th>NRP</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Gender</th>
							<th>Tempat, Tanggal Lahir</th>
							<th>Angkatan</th>
							<th>No Hp</th>
							<th>Action</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
						Add New Mahasiswa
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
						<label>NRP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="nrp ...">
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
						<label>Alamat</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="alamat" placeholder="alamat ...">
					</div>
				</div>
				
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Gender</label>
					<select class="form-control" id="gender">
						<option value="MALE">Male</option>
						<option value="FEMALE">Female</option>
					</select>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>TTL</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tempatTglLhr" placeholder="Tempat Tanggal Lahir ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Angkatan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="angkatan" placeholder="angkatan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="noHp" placeholder="No Hp ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Mahasiswa
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
				"url": "<?php echo site_url('Mahasiswa/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var nrp = document.getElementById("nrp").value;
		var nama = document.getElementById("nama").value;
		var alamat = document.getElementById("alamat").value;
		var gender = document.getElementById("gender").value;
		var tempatTglLhr = document.getElementById("tempatTglLhr").value;
		var angkatan = document.getElementById("angkatan").value;
		var noHp = document.getElementById("noHp").value;

		$.ajax({
			url: "<?php echo base_url('Mahasiswa/addData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				nama:nama,
				alamat:alamat,
				gender:gender,
				tempatTglLhr:tempatTglLhr,
				angkatan:angkatan,
				noHp:noHp,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
	}
		});

	}
	
	function deleteMahasiswa(id) {

		

		$.ajax({
			url: "<?php echo base_url('Mahasiswa/deleteData'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>