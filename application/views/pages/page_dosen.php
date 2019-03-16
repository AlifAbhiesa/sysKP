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
							<th>NIP</th>
							<th>NIDN</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Tempat, Tanggal Lahir</th>
							<th>Gender</th>
							<th>Urutan Akademik</th>
							<th>No Hp</th>
						</tr>
						</thead>
					</table>
					<br>
					<button type="button" class="btn btn-success" style="width: 100%;">
						Add New Dosen
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
				"url": "<?php echo site_url('Dosen/getAll')?>",
				"async":false,
				"type": "POST"
			},


		});

	};
</script>
