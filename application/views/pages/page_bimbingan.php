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
							<th>Judul KP</th>
							<th>Pembimbing Perusahaan</th>
							<th>Pembimbing Dosen</th>
							<th></th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;">
						Add New Bimbingan
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
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nrp" placeholder="NRP ...">
					</div>
				</div>


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nama</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="nama" placeholder="Nama ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Judul KP</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="judulKp" placeholder="Judul KP ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="pembimbingPrshn" placeholder="Pembimbing Perusahaan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Pembimbing Dosen</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="pembimbingDsn" placeholder="Pembimbing Dosen ...">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="AddData()" type="button" class="btn btn-outline">Add Bimbingan
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
				"url": "<?php echo site_url('Bimbingan/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};
</script>
