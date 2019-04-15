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
					<h3 class="box-title">Perusahaan</h3>
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Perusahaan</th>
							<th>Alamat Perusahaan</th>
							<th>Email Perusahaan</th>
							<th>Fax</th>
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
						<label>Nama Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="namaPerusahaan" placeholder="Nama Perusahaan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Alamat Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="alamatPerusahaan" placeholder="Alamat Perusahaan ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Email Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="emailPerusahaan" placeholder="Email Perusahaan ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Fax</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="fax" placeholder="Fax ...">
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
						<label>Nama Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updnamaPerusahaan" placeholder="Nama Perusahaan ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Alamat Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updalamatPerusahaan" placeholder="Alamat Perusahaan ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Email Perusahaan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updemailPerusahaan" placeholder="Email Perusahaan ...">
					</div>
				</div>
				
				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Fax</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updfax" placeholder="Fax ...">
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

		var namaPerusahaan = document.getElementById("namaPerusahaan").value;
		var alamatPerusahaan = document.getElementById("alamatPerusahaan").value;
		var emailPerusahaan = document.getElementById("emailPerusahaan").value;
		var fax = document.getElementById("fax").value;

		$.ajax({
			url: "<?php echo base_url('Perusahaan/addData'); ?>",
			type: "post",
			data: {
				namaPerusahaan:namaPerusahaan,
				alamatPerusahaan:alamatPerusahaan,
				emailPerusahaan:emailPerusahaan,
				fax:fax,
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
				idPerusahaan:idPerusahaan,
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
				idPerusahaan:idPerusahaan,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				document.getElementById("updfax").value=response[0]['fax'];
				document.getElementById("updemailPerusahaan").value=response[0]['emailPerusahaan'];
				document.getElementById("updalamatPerusahaan").value=response[0]['alamatPerusahaan'];
				document.getElementById("updnamaPerusahaan").value=response[0]['namaPerusahaan'];
				document.getElementById("idPerusahaan").value=response[0]['idPerusahaan'];
				
				showModal();
			}
		});

	}
	function updateData() {
		
		var idPerusahaan = document.getElementById("updidPerusahaan").value;
		var namaPerusahaan = document.getElementById("updnamaPerusahaan").value;
		var alamatPerusahaan = document.getElementById("updalamatPerusahaan").value;
	    var emailPerusahaan = document.getElementById("updemailPerusahaan").value;
		var fax = document.getElementById("updfax").value;

		$.ajax({
			url: "<?php echo base_url('Perusahaan/updateData'); ?>",
			type: "post",
			data: {
				idPerusahaan:idPerusahaan,
				namaPerusahaan:namaPerusahaan,
				alamatPerusahaan:alamatPerusahaan,
				emailPerusahaan:emailPerusahaan,
				fax:fax,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
