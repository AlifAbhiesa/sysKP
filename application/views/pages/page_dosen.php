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
							<th>NIP</th>
							<th>NIDN</th>
							<th>Nama</th>
							<th>Urutan Akademik</th>
							<th>No Hp</th>
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
						<label>NIDN</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nidn" placeholder="nidn ...">
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
						<label>Urutan Akademik</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="urutanAkademik" placeholder="Urutan Akademik ...">
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
						<label>NIP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnip" placeholder="nip ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>NIDN</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnidn" placeholder="nidn ...">
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
						<label>Urutan Akademik</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updurutanAkademik" placeholder="Urutan Akademik ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnoHp" placeholder="No Hp ...">
					</div>
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

		var nip = document.getElementById("nip").value;
		var nidn = document.getElementById("nidn").value;
		var nama = document.getElementById("nama").value;
		var urutanAkademik = document.getElementById("urutanAkademik").value;
		var noHp = document.getElementById("noHp").value;

		$.ajax({
			url: "<?php echo base_url('Dosen/addData'); ?>",
			type: "post",
			data: {
				nip:nip,
				nidn:nidn,
				nama:nama,
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
				document.getElementById("updurutanAkademik").value=response[0]['urutanAkademik'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("updnidn").value=response[0]['nidn'];
				document.getElementById("updnip").value=response[0]['nip'];
				document.getElementById("idDosen").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var nip = document.getElementById("updnip").value;
		var id = document.getElementById("idDosen").value;
	    var nidn = document.getElementById("updnidn").value;
		var nama = document.getElementById("updnama").value;
		var urutanAkademik = document.getElementById("updurutanAkademik").value;
		var noHp = document.getElementById("updnoHp").value;

		$.ajax({
			url: "<?php echo base_url('Dosen/updateData'); ?>",
			type: "post",
			data: {
				nip:nip,
				id:id,
				nidn:nidn,
				nama:nama,
				urutanAkademik:urutanAkademik ,
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
