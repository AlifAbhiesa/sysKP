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
					<h3 class="box-title">User SidangKp</h3>
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>Judul Kp</th>
							<th>NRP</th>
							<th>Nama</th>
							<th>Tanggal Sidang</th>
							<th>Penguji</th>
							<th>Nilai</th>
							<th>Action</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
						Add New Sidangkp
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
				<label class="border-bottom border-gray pb-2">Add SidangKp</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Judul Kp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKp" placeholder="Judul KP ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>NRP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="NRP ...">
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
						<label>Tanggal Sidang</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="tglSidang" placeholder="Tanggal sidang ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Penguji</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="penguji" placeholder="Penguji ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nilai</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nilai" placeholder="Nilai ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Sidangkp
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
				<label class="border-bottom border-gray pb-2">Add SidangKp</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Judul Kp</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjudulKp" placeholder="Judul KP ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>NRP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnrp" placeholder="NRP ...">
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
						<label>Tanggal Sidang</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updtglSidang" placeholder="Tanggal sidang ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Penguji</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updpenguji" placeholder="Penguji ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nilai</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnilai" placeholder="Nilai ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idSidangkp" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">Update SidangKp
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
				"url": "<?php echo site_url('Sidangkp/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var judulKp = document.getElementById("judulKp").value;
		var nrp = document.getElementById("nrp").value;
		var nama = document.getElementById("nama").value;
		var tglSidang = document.getElementById("tglSidang").value;
		var penguji = document.getElementById("penguji").value;
		var nilai = document.getElementById("nilai").value;

		$.ajax({
			url: "<?php echo base_url('Sidangkp/addData'); ?>",
			type: "post",
			data: {
				judulKp:judulKp,
				nrp:nrp,
				nama:nama,
				tglSidang:tglSidang,
				penguji:penguji,
				nilai:nilai,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
	
	function deleteSidangkp(id) {

		

		$.ajax({
			url: "<?php echo base_url('Sidangkp/deleteData'); ?>",
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
			url: "<?php echo base_url('Sidangkp/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				
				document.getElementById("updnilai").value=response[0]['nilai'];
				document.getElementById("updpenguji").value=response[0]['penguji'];
				document.getElementById("updtglSidang").value=response[0]['tglSidang'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("updnrp").value=response[0]['nrp'];
				document.getElementById("updjudulKp").value=response[0]['judulKp'];
				document.getElementById("idSidangkp").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var judulKp = document.getElementById("updjudulKp").value;
		var id = document.getElementById("idSidangkp").value;
	    var nrp = document.getElementById("updnrp").value;
		var nama = document.getElementById("updnama").value;
		var tglSidang = document.getElementById("updtglSidang").value;
		var penguji = document.getElementById("updpenguji").value;
		var nilai = document.getElementById("updnilai").value;
		
		$.ajax({
			url: "<?php echo base_url('Sidangkp/updateData'); ?>",
			type: "post",
			data: {
				judulKp:judulKp,
				id:id,
				nrp:nrp,
				nama:nama,
				tglSidang:tglSidang,
				penguji:penguji,
				nilai:nilai,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
