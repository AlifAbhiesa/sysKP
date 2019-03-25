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
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>NRP</th>
							<th>Nama</th>
							<th>NoHp</th>
							<th>Perusahaan</th>
							<th>Dosen Wali</th>
							<th>Dosen Pembimbing</th>
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
				<label class="border-bottom border-gray pb-2">Add Mahasiswa</label>
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
						<label>No Hp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="noHp" placeholder="no hp ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="perusahaan" placeholder="perusahaan ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Dosen Wali</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="dosenWali" placeholder="Dosen Wali ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Dosen Pembimbing</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="dosenPmbg" placeholder="Dosen Pembimbing ...">
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

<!--- Modal update --->
<div class="modal modal-success fade" id="UpdateModal">
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
						<label>No Hp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnoHp" placeholder="no Hp...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updperusahaan" placeholder="perusahaan...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Dosen Wali</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="upddosenWali" placeholder="dosen wali ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Dosen Pembimbing</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="upddosenPmbg" placeholder="dosen pembimbing ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idMahasiswa" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">update Mahasiswa
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
				"url": "<?php echo site_url('Mahasiswa/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var nrp = document.getElementById("nrp").value;
		var nama = document.getElementById("nama").value;
		var noHp = document.getElementById("noHp").value;
		var perusahaan = document.getElementById("perusahaan").value;
		var dosenWali = document.getElementById("dosenWali").value;
		var dosenPmbg = document.getElementById("dosenPmbg").value;

		$.ajax({
			url: "<?php echo base_url('Mahasiswa/addData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				nama:nama,
				noHp:noHp,
				perusahaan:perusahaan,
				dosenWali:dosenWali,
				dosenPmbg:dosenPmbg,
				
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
	function showModal(){
		$('#UpdateModal').modal('show');
	}
	function getOne(id) {
		$.ajax({
			url: "<?php echo base_url('Mahasiswa/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				document.getElementById("updnoHp").value=response[0]['noHp'];
				document.getElementById("upddosenWali").value=response[0]['dosenWali'];
				document.getElementById("upddosenPmbg").value=response[0]['dosenPmbg'];
				document.getElementById("updperusahaan").value=response[0]['perusahaan'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("updnrp").value=response[0]['nrp'];
				document.getElementById("idMahasiswa").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var nrp = document.getElementById("updnrp").value;
		var id = document.getElementById("idMahasiswa").value;
	    var nama = document.getElementById("updnama").value;
		var noHp = document.getElementById("updnoHp").value;
		var perusahaan = document.getElementById("updperusahaan").value;
		var dosenWali = document.getElementById("upddosenWali").value;
		var dosenPmbg = document.getElementById("upddosenPmbg").value;

		$.ajax({
			url: "<?php echo base_url('Mahasiswa/updateData'); ?>",
			type: "post",
			data: {
				nrp:nrp,
				id:id,
				nama:nama,
				noHp:noHp,
				perusahaan:perusahaan,
				dosenWali:dosenWali,
				dosenPmbg:dosenPmbg,
				
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>