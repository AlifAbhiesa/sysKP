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
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>Nrp</th>
							<th>Nama</th>
							<th>JudulKp</th>
							<th>Pembimbing Perusahaan</th>
							<th>Pembimbing Dosen</th>
							<th>action</th>
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
				<label class="border-bottom border-gray pb-2">Add Dosen Bimbingan</label>
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
						<label>Judul Kp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKp" placeholder="judulKp ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="pembimbingPrshn" placeholder="pembimbingPrshn ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Dosen</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="pembimbingDsn" placeholder="No Hp ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Dosen Bimbingan
				</button>
			</div>
		</div>
	</div>
</div>
<!-- end of modal insert --->

<!--- Modal update--->
<div class="modal modal-success fade" id="UpdateModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add Dosen Bimbingan</label>
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
						<label>Judul Kp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjudulKp" placeholder="judulKp ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updpembimbingPrshn" placeholder="pembimbingPrshn ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Dosen</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updpembimbingDsn" placeholder="No Hp ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idBimbingan" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">update Dosen Bimbingan
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
				"url": "<?php echo site_url('Bimbingan/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var nrp = document.getElementById("nrp").value;
		var nama = document.getElementById("nama").value;
		var judulKp = document.getElementById("judulKp").value;
		var pembimbingPrshn = document.getElementById("pembimbingPrshn").value;
		var pembimbingDsn = document.getElementById("pembimbingDsn").value;

		$.ajax({
			url: "<?php echo base_url('Bimbingan/addData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				nama:nama,
				judulKp:judulKp,
				pembimbingPrshn:pembimbingPrshn,
				pembimbingDsn:pembimbingDsn,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
	

	function deleteBimbingan(id) {
		

		$.ajax({
			url: "<?php echo base_url('Bimbingan/deleteData'); ?>",
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
			url: "<?php echo base_url('Bimbingan/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				document.getElementById("updpembimbingDsn").value=response[0]['pembimbingDsn'];
				document.getElementById("updpembimbingPrshn").value=response[0]['pembimbingPrshn'];
				document.getElementById("updjudulKp").value=response[0]['judulKp'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("updnrp").value=response[0]['nrp'];
				document.getElementById("idBimbingan").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var nrp = document.getElementById("updnrp").value;
		var id = document.getElementById("idBimbingan").value;
	    var nama = document.getElementById("updnama").value;
		var judulKp = document.getElementById("updjudulKp").value;
		var pembimbingPrshn = document.getElementById("updpembimbingPrshn").value;
		var pembimbingDsn = document.getElementById("updpembimbingDsn").value;

		$.ajax({
			url: "<?php echo base_url('Bimbingan/updateData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				id:id,
				nama:nama,
				judulKp:judulKp,
				pembimbingPrshn:pembimbingPrshn,
				pembimbingDsn:pembimbingDsn,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
