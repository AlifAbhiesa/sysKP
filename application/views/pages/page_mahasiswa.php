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
							<th>TTL</th>
							<th>Angkatan</th>
							<th>No HP</th>
							<th></th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;">
						Add New Mahasiswa
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

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
</script>
