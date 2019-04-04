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
					<h3 class="box-title">User Statistic</h3>
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>No Dosen</th>
							<th>Jml Bimbingan</th>
							<th>Jml Pengujian</th>
							<th>Action</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;" data-toggle="modal" data-target="#AddModal">
						Add New Statistic
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
				<label class="border-bottom border-gray pb-2">Add Statistic</label>
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
						<label>No Dosen</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nodosen" placeholder="No Dosen ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Jml Bimbingan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="jmlbbg" placeholder="Jumlah Bimbingan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Jml Pengujian</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="jmlpenguji" placeholder="Jumlah Penguji ...">
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
				<label class="border-bottom border-gray pb-2">Add Statistic</label>
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
						<label>No Dosen</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnodosen" placeholder="No Dosen ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Jml Bimbingan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjmlbbg" placeholder="Jumlah Bimbingan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Jml Pengujian</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updjmlpenguji" placeholder="Jumlah Penguji ...">
					</div>
				</div>
			</div>
			<div class="modal-footer">
			<input type="text" id="idStatistic" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">Update Statistic
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
				"url": "<?php echo site_url('Statistic/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var nama = document.getElementById("nama").value;
		var nodosen = document.getElementById("nodosen").value;
		var jmlbbg = document.getElementById("jmlbbg").value;
		var jmlpenguji = document.getElementById("jmlpenguji").value;

		$.ajax({
			url: "<?php echo base_url('Statistic/addData'); ?>",
			type: "post",
			data: {
				nama:nama,
				nodosen:nodosen,
				jmlbbg:jmlbbg,
				jmlpenguji:jmlpenguji,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
	
	function deleteStatistic(id) {

		

		$.ajax({
			url: "<?php echo base_url('Statistic/deleteData'); ?>",
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
			url: "<?php echo base_url('Statistic/getOne'); ?>",
			type: "post",
			data: {
				id:id,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				
				document.getElementById("updjmlpenguji").value=response[0]['jmlpenguji'];
				document.getElementById("updjmlbbg").value=response[0]['jmlbbg'];
				document.getElementById("updnodosen").value=response[0]['nodosen'];
				document.getElementById("updnama").value=response[0]['nama'];
				document.getElementById("idStatistic").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var nama = document.getElementById("updnama").value;
		var id = document.getElementById("idStatistic").value;
	    var nodosen = document.getElementById("updnodosen").value;
		var jmlbbg = document.getElementById("updjmlbbg").value;
		var jmlpenguji = document.getElementById("updjmlpenguji").value;
		
		$.ajax({
			url: "<?php echo base_url('Statistic/updateData'); ?>",
			type: "post",
			data: {
				nama:nama,
				id:id,
				nodosen:nodosen,
				jmlbbg:jmlbbg,
				jmlpenguji:jmlpenguji,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
