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
					<h3 class="box-title">User Perusahaan</h3>
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
							<th>Cp</th>
							<th>No Telpon Cp</th>
							<th>Action</th>
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
				<label class="border-bottom border-gray pb-2">Add Perusahaan</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


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
					<div class="md-input-wrapper">
						<label>No HP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="noHp" placeholder="No Hp ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Cp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="cp" placeholder="Cp ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No Hp Cp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="noHpCp" placeholder="No Hp Cp ...">
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

<!--- Modal update --->
<div class="modal modal-success fade" id="UpdateModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add Perusahaan</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nama</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnama" placeholder="nama ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Alamat</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updalamat" placeholder="alamat ...">
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
						<label>Cp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updcp" placeholder="Cp ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>No Hp Cp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnoHpCp" placeholder="No Hp Cp ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idPerusahaan" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">update Perusahaan
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
				"url": "<?php echo site_url('Perusahaan/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};
	
	function AddData() {

		var nama = document.getElementById("nama").value;
		var alamat = document.getElementById("alamat").value;
		var noHp = document.getElementById("noHp").value;
		var cp = document.getElementById("cp").value;
		var noHpCp = document.getElementById("noHpCp").value;

		$.ajax({
			url: "<?php echo base_url('Perusahaan/addData'); ?>",
			type: "post",
			data: {
				nama:nama,
				alamat:alamat,
				noHp:noHp,
				cp:cp,
				noHpCp:noHpCp,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
	
	function deletePerusahaan(id) {

		$.ajax({
			url: "<?php echo base_url('Perusahaan/deleteData'); ?>",
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
			url: "<?php echo base_url('Perusahaan/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				document.getElementById("updnoHpCp").value=response[0]['noHpCp'];
				document.getElementById("updcp").value=response[0]['cp'];
				document.getElementById("updnoHp").value=response[0]['noHp'];
				document.getElementById("updalamat").value=response[0]['alamat'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("idPerusahaan").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {
		
		var id = document.getElementById("idPerusahaan").value;
		var nama = document.getElementById("updnama").value;
		var alamat = document.getElementById("updalamat").value;
	    var noHp = document.getElementById("updnoHp").value;
		var cp = document.getElementById("updcp").value;
		var noHpCp= document.getElementById("updnoHpCp").value;

		$.ajax({
			url: "<?php echo base_url('Perusahaan/updateData'); ?>",
			type: "post",
			data: {
				id:id,
				nama:nama,
				alamat:alamat,
				noHp:noHp,
				cp:cp,
				noHpCp:noHpCp,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
