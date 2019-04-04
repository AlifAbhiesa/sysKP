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
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>NRP</th>
							<th>Nama</th>
							<th>No HP</th>
							<th>Tanggal Daftar</th>
							<th>Tempat Usulan KP</th>
							<th>Tahun Ajaran</th>
							<th>Semester</th>
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
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="noHp" placeholder="No Hp ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tanggal Daftar</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tanggalDftr" placeholder="tanggal Daftar ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tempat Usulan KP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tempatUslnKp" placeholder="Tempat Usulan KP ...">
					</div>
				</div> 

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tahun Ajaran</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tahunAjrn" placeholder="Tahun Ajaran ...">
					</div>
				</div>

				<div class="form-group">
						<label class="border-bottom border-gray pb-2">Semester</label>
						<select class="form-control" id="semester">
							<option value="Genap">Genap</option>
							<option value="Ganjil">Ganjil</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Dosen
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
				<label class="border-bottom border-gray pb-2">Add Dosen</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>NRP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnrp" placeholder="nrp ...">
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
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnoHp" placeholder="No Hp ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tanggal Daftar</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updtanggalDftr" placeholder="tanggal Daftar ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tempat Usulan KP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updtempatUslnKp" placeholder="Tempat Usulan KP ...">
					</div>
				</div> 

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Tahun Ajaran</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updtahunAjrn" placeholder="Tahun Ajaran ...">
					</div>
				</div>

				<div class="form-group">
						<label class="border-bottom border-gray pb-2">Semester</label>
						<select class="form-control" id="updsemester">
							<option value="Genap">Genap</option>
							<option value="Ganjil">Ganjil</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idDosen" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">update Dosen
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

		var nrp = document.getElementById("nrp").value;
		var nama = document.getElementById("nama").value;
		var noHp = document.getElementById("noHp").value;
		var tanggalDftr = document.getElementById("tanggalDftr").value;
		var tempatUslnKp = document.getElementById("tempatUslnKp").value;
		var tahunAjrn = document.getElementById("tahunAjrn").value;
		var semester = document.getElementById("semester").value;

		$.ajax({
			url: "<?php echo base_url('Dosen/addData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				nama:nama,
				noHp:noHp,
				tanggalDftr:tanggalDftr,
				tempatUslnKp:tempatUslnKp,
				tahunAjrn:tahunAjrn,
				semester:semester,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});
	}
	
function deleteDosen(id) {

		

		$.ajax({
			url: "<?php echo base_url('Dosen/deleteData'); ?>",
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
	function showModal(){
		$('#UpdateModal').modal('show');
	}
	function getOne(id) {
		$.ajax({
			url: "<?php echo base_url('Dosen/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				
				document.getElementById("updnoHp").value=response[0]['noHp'];
				document.getElementById("updtahunAjrn").value=response[0]['tahunAjrn'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("updnrp").value=response[0]['nrp'];
				document.getElementById("updtanggalDftr").value=response[0]['tanggalDftr'];
				document.getElementById("updsemester").value=response[0]['semester']
				document.getElementById("updtempatUslnKp").value=response[0]['tempatUslnKp']
				document.getElementById("idDosen").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var nrp = document.getElementById("updnrp").value;
		var id = document.getElementById("idDosen").value;
		var nama = document.getElementById("updnama").value;
		var noHp = document.getElementById("updnoHp").value;
		var tanggalDftr = document.getElementById("updtanggalDftr").value;
		var tempatUslnKp = document.getElementById("updtempatUslnKp").value;
		var tahunAjrn = document.getElementById("updtahunAjrn").value;
		var semester = document.getElementById("updsemester").value;


		$.ajax({
			url: "<?php echo base_url('Dosen/updateData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				id:id,
				nama:nama,
				noHp:noHp,
				tanggalDftr:tanggalDftr,
				tempatUslnKp:tempatUslnKp,
				tahunAjrn:tahunAjrn,
				semester:semester,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
