

<div class="content-wrapper">
	<section class="content-header">
		<!-- <h1>
          Advanced Form Elements
        </h1> -->
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<!-- /.col (left) -->
			<div class="col-md-12">
				<div class="box box-primary" id="divData">
					<div class="box-header">
						<h3 class="box-title">Daftar Users</h3>
						<hr>
					</div>
					<div class="box-body">

						<hr>
						<table id="dataShow" class="table table-striped table-bordered data">
							<thead>
							<tr>

								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<br>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal" style="width: 100%;">
							Tambah Daftar User
						</button>
					</div>
					<!-- /.box-body -->
				</div>


			</div>
			<!-- /.col (right) -->
		</div>
		<!-- /.row -->


	</section>
</div>

<!--- Modal Insert --->

<!-- Modal --><!-- Modal 1 --><!-- Modal -->
<div class="modal fade" id="AddModal">
	<div class="modal-dialog modal-dialog-centered">

		<!-- Modal content-->
		<div class="modal-content">
			<div style="background: #FFAC38" class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 style="font-family: 'Century Gothic'; color: white;" class="modal-title">Add User</h4>
			</div>
			<div class="modal-body">

				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Username</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="username" name="username" placeholder="Username ...">
					</div>
				</div>


				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Password</label>
						<input style="border-top: none; border-left: none; border-right: none" type="password" class="form-control" id="password" name="password" placeholder="Password ...">
					</div>
				</div>


				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Level</label>
						<select name="level" id="level" style="border-top: none; border-left: none; border-right: none" class="form-control">
							<option value="admin">Admin</option>
							<option value="nasabah">Nasabah</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="addData()" data-dismiss="modal">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- end of modal insert --->



<!--- Modal Update --->

<!-- Modal --><!-- Modal 1 --><!-- Modal -->
<div class="modal fade" id="UpdateModal">
	<div class="modal-dialog modal-dialog-centered">

		<!-- Modal content-->
		<div class="modal-content">
			<div style="background: #FFAC38" class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 style="font-family: 'Century Gothic'; color: white;" class="modal-title">Update User</h4>
			</div>
			<div class="modal-body">

				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Username</label>
						<input style="border-top: none; border-left: none; border-right: none" type="text" class="form-control" id="updusername" name="username" placeholder="Username ...">
					</div>
				</div>


				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Password</label>
						<input style="border-top: none; border-left: none; border-right: none" type="password" class="form-control" id="updpassword" name="password" placeholder="Password ...">
					</div>
				</div>


				<div class="form-group col-1">
					<div class="md-input-wrapper">
						<label>Level</label>
						<select name="level" id="updlevel" style="border-top: none; border-left: none; border-right: none" class="form-control">
							<option value="admin">Admin</option>
							<option value="nasabah">Nasabah</option>
						</select>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<input hidden="true"  id="updiduser">
				<button type="button" class="btn btn-success" onclick="updateData()" data-dismiss="modal">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- end of modal Update --->




<script type="text/javascript">
	var table;


	showData();

	function showData() {
			//datatables
			table = $('#dataShow').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"info": false,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('User/get_data_user')?>",
				"type": "POST"
			},

			"columnDefs": [
				{
					"targets": [ 0 ],
					"orderable": false,
				},
			],

		});

	};



	//show update modal
	function showModal() {
		$("#UpdateModal").modal({
			backdrop : 'static',
			show : true
		});
	}

	//getDetailOneData
	function getOne(id) {
		idC = id;
		//alert('cek');
		showModal();
		$.ajax({
			url: "<?php echo base_url('User/getOne'); ?>",
			type: "post",
			data: {id:id},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response != ""){
					response = JSON.parse(response);
					document.getElementById("updusername").value = response[0]['username'];
					document.getElementById("updpassword").value = response[0]['password'];
					document.getElementById("updlevel").value = response[0]['level'];
					document.getElementById("updiduser").value = response[0]['id_user'];

				}else{
					alert("Error cok euy !");
				}
			}
		});
	}

	function addData() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var level = document.getElementById("level").value;

		//alert(idC);
		$.ajax({
			url: "<?php echo base_url('User/addUser'); ?>",
			type: "post",
			data: {
				username:username,
				password:password,
				level:level,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					AlertSukses();
					showData();
				}else if(response == "failed"){
					alert('Terjadi kesalahan');
				}
			}
		});
	}

	//UpdateData
	function updateData() {
		var updusername = document.getElementById("updusername").value;
		var updpassword = document.getElementById("updpassword").value;
		var updlevel = document.getElementById("updlevel").value;
		var updiduser = document.getElementById("updiduser").value;

		//alert(idC);
		$.ajax({
			url: "<?php echo base_url('User/updateData'); ?>",
			type: "post",
			data: {
				updusername:updusername,
				updpassword:updpassword,
				updlevel:updlevel,
				updiduser:updiduser,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					AlertSukses();
					showData();
				}else if(response == "failed"){
					alert('Terjadi kesalahan');
				}
			}
		});
	}

	//show update modal
	var idDel;
	function ShowModalDelete(id) {
		idDel = id;
		document.getElementById("idDelete").value = idDel;
		$("#DeleteModal").modal({
			backdrop : 'static',
			show : true
		});
	}

	function deleteData() {

		var id = document.getElementById("idDelete").value;
		$.ajax({
			url: "<?php echo base_url('User/deleteData'); ?>",
			type: "post",
			data: {
				id:id
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					//alert('sukses');
					AlertSukses();
					showData();

				}else if(response == "failed"){
					alert('Terjadi kesalahan');
				}
			}
		});
	}



</script>
