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
					<h3 class="box-title">Bimbingan</h3>
					<hr>
				</div>
				<div class="box-body">
					<hr>
					<table class="table table-bordered table-primary dt-responsive" id="myData" width="100%" >
						<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>Id Bimbingan</th>
							<th>Materi Bimbingan</th>
							<th></th>
						</tr>
						</thead>
					</table>
					<br>
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
				<label class="border-bottom border-gray pb-2">Add Bimbingan</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Id Kerja Praktek</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="idKerjaPraktek1" placeholder="Id Kerja Praktek ...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Materi Bimbingan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="materiBimbingan" placeholder="Materi Bimbingan ...">
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

<!--- Modal update --->
<div class="modal modal-success fade" id="UpdateModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add Bimbingan</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
					<div class="form-group">
					<div class="md-input-wrapper">
						<label>Id kerja Praktek</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updidKerjaPraktek1" placeholder="Id Kerja Praktek...">
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Materi Bimbingan</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updmateriBimbingan" placeholder="Materi Bimbingan...">
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
			<input type="text" id="idBimbingan" hidden>
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
				</button>
				<button onclick="updateData()" type="button" class="btn btn-outline">update Bimbingan
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
			"columnDefs": [{
					"targets": 0,
					"width": "50px"
				},
				{
					"targets": [1, 2, 3],
					"width": "200px"
				}
			],
			"ordering": false,
			"destroy": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('Bimbingan/getAll')?>",
				"async": false,
				"type": "POST"
			},


		});

	};
	
	function AddData() {

		var idKerjaPraktek1 = document.getElementById("idKerjaPraktek1").value;
		var materiBimbingan = document.getElementById("materiBimbingan").value;

		$.ajax({
			url: "<?php echo base_url('Bimbingan/addData'); ?>",
			type: "post",
			data: {
				idKerjaPraktek1: idKerjaPraktek1,
				materiBimbingan: materiBimbingan,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
	
	function deleteBimbingan(idBimbingan) {

		$.ajax({
			url: "<?php echo base_url('Bimbingan/deleteData'); ?>",
			type: "post",
			data: {
				idBimbingan:idBimbingan,
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
	function getOne(idBimbingan) {
		$.ajax({
			url: "<?php echo base_url('Bimbingan/getOne'); ?>",
			type: "post",
			data: {
				idBimbingan:idBimbingan,
			},
			cache: false,
			success: function (response) {
				response = JSON.parse(response);
				document.getElementById("updidKerjaPraktek1").value=response[0]['idKerjaPraktek1'];
				document.getElementById("updmateriBimbingan").value=response[0]['materiBimbingan'];
				document.getElementById("idBimbingan").value=response[0]['idBimbingan'];
				
				showModal();
			}
		});

	}
	function updateData() {
		
		var idBimbingan = document.getElementById("idBimbingan").value;
		var idKerjaPraktek1 = document.getElementById("updidKerjaPraktek1").value;
		var materiBimbingan = document.getElementById("updmateriBimbingan").value;

		$.ajax({
			url: "<?php echo base_url('Bimbingan/updateData'); ?>",
			type: "post",
			data: {
				idBimbingan: idBimbingan,
				idKerjaPraktek1: idKerjaPraktek1,
				materiBimbingan: materiBimbingan,
				
			},
			cache: false,
			success: function (response) {
				// alert(response);
				location.reload();
			}
		});

	}
</script>
