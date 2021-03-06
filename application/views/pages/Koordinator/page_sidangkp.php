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
					<table class="table table-bordered table-primary dt-responsive" id="myData" width="100%" >
						<thead class="thead-dark">
						<tr>
						<td><th>Tanggal Sidang
						</th>
							<th>Penguji</th>
							<th>Nilai</th></td>
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
						<label>Tanggal Sidang</label>
						<select style="border-top: none; border-left: none; border-right: none" class="form-control" id="tanggal sidang">
                            <option> ---- Pick ----</option>
							<?php foreach ($list_perusahaan as $row) : ?>
                           <option value="<?php echo $row['Tanggal Sidang'] ?>"> <?php echo $row['Tanggal Sidang'] ?></option>
                        <?php endforeach; ?>
                        </select>
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Penguji</label>
						<select style="border-top: none; border-left: none; border-right: none" class="form-control" id="penguji">
                            <option> ---- Pick ----</option>
							<?php foreach ($list_perusahaan as $row) : ?>
                           <option value="<?php echo $row['penguji'] ?>"> <?php echo $row['penguji'] ?></option>
                        <?php endforeach; ?>
                        </select>
					</div>
				</div>

				<div class="form-group">
					<div class="md-input-wrapper">
						<label>Nilai</label>
						<select style="border-top: none; border-left: none; border-right: none" class="form-control" id="nilai">
                            <option> ---- Pick ----</option>
							<?php foreach ($list_perusahaan as $row) : ?>
                           <option value="<?php echo $row['nilai'] ?>"> <?php echo $row['nilai'] ?></option>
                        <?php endforeach; ?>
                        </select>
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
				"url": "<?php echo site_url('Sidangkp/getAllView1')?>",
				"async":false,
				"type": "POST"
			},


		});

	};

	function AddData() {

		var tglSidang = document.getElementById("tglSidang").value;
		var penguji = document.getElementById("penguji").value;
		var nilai = document.getElementById("nilai").value;

		$.ajax({
			url: "<?php echo base_url('Sidangkp/addData'); ?>",
			type: "post",
			data: {
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
				document.getElementById("updjudulKP").value=response[0]['judulKP'];
				document.getElementById("idSidangkp").value=response[0]['id'];
				
				showModal();
			}
		});

	}
	function updateData() {

		var tglSidang = document.getElementById("updtglSidang").value;
		var penguji = document.getElementById("updpenguji").value;
		var nilai = document.getElementById("updnilai").value;
		
		$.ajax({
			url: "<?php echo base_url('Sidangkp/updateData'); ?>",
			type: "post",
			data: {
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