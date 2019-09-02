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
					<h3 class="box-title">User Kerja Praktek</h3>
				
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-primary dt-responsive" id="myData" width="100%" >
						<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Pengajuan</th>
							<th>Mahasiswa</th>
							<th>Pembimbing</th>
							<th>Penguji</th>
							<th>Judul KP</th>
							<th>Pembimbing Perusahaan</th>
							<th>Action</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
						Add New Kerja Praktek
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
				<label class="border-bottom border-gray pb-2">Add KP</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pengajuan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idPengajuan" placeholder="Pengajuan ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Mahasiswa</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idMahasiswa" placeholder="Mahasiswa ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idPembimbing" placeholder="Pembimbing ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Penguji</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idPenguji" placeholder="Penguji ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Judul KP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKerjaPraktek" placeholder="judul kerja praktek ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="pembimbingPerusahaan" placeholder="Pembimbing Perusahaan ...">
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
				<label class="border-bottom border-gray pb-2">Update KP</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pengajuan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidPengajuan" placeholder="Pengajuan ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Mahasiswa</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidMahasiswa" placeholder="Mahasiswa ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidPembimbing" placeholder="Pembimbing ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Penguji</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidPenguji" placeholder="Penguji ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Judul KP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjudulKerjaPraktek" placeholder="Judul Kerja Praktek ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updpembimbingPerusahaan" placeholder="Pembimbing Perusahaan ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idKP" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">Simpan
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
				"url": "<?php echo site_url('KP/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var idPengajuan = document.getElementById("idPengajuan").value;
		var idMahasiswa = document.getElementById("idMahasiswa").value;
		var idPembimbing = document.getElementById("idPembimbing").value;
		var idPenguji = document.getElementById("idPenguji").value;
		var judulKerjaPraktek = document.getElementById("judulKerjaPraktek").value;
		var pembimbingPerusahaan = document.getElementById("pembimbingPerusahaan").value;

		$.ajax({
			url: "<?php echo base_url('KP/addData'); ?>",
			type: "post",
			data: {
				idPengajuan:idPengajuan,
				idMahasiswa:idMahasiswa,
				idPembimbing:idPembimbing,
				idPenguji:idPenguji,
				judulKerjaPraktek:judulKerjaPraktek,
				pembimbingPerusahaan:pembimbingPerusahaan,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}

	function deleteKP(id) {

		

		$.ajax({
			url: "<?php echo base_url('KP/deleteData'); ?>",
			type: "post",
			data: {
				idKerjaPraktek:idKerjaPraktek,
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
			url: "<?php echo base_url('KP/getOne'); ?>",
			type: "post",
			data: {
				idKerjaPraktek:idKerjaPraktek,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				
				document.getElementById("updpembimbingPerusahaan").value=response[0]['pembimbingPerusahaan'];
				document.getElementById("updjudulKerjaPraktek").value=response[0]['judulKerjaPraktek'];
				document.getElementById("updidPenguji").value=response[0]['idPenguji'];
				document.getElementById("updidPembimbing").value=response[0]['idPembimbing'];
				document.getElementById("updidMahasiswa").value=response[0]['idMahasiswa'];
				document.getElementById("updidPengajuan").value=response[0]['idPengajuan'];
				document.getElementById("idKP").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var idPengajuan = document.getElementById("updidPengajuan").value;
		var id = document.getElementById("idKP").value;
	    var idMahasiswa = document.getElementById("updidMahasiswa").value;
		var idPembimbing = document.getElementById("updidPembimbing").value;
		var idPenguji = document.getElementById("updidPenguji").value;
		var judulKerjaPraktek = document.getElementById("updjudulKerjaPraktek").value;
		var pembimbingPerusahaan = document.getElementById("updpembimbingPerusahaan").value;
		
		$.ajax({
			url: "<?php echo base_url('KP/updateData'); ?>",
			type: "post",
			data: {
				idPengajuan:idPengajuan,
				idKerjaPraktek:idKerjaPraktek,
				idMahasiswa:idMahasiswa,
				idPembimbing:idPembimbing,
				idPenguji:idPenguji,
				judulKerjaPraktek:judulKerjaPraktek,
				pembimbingPerusahaan:pembimbingPerusahaan,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
