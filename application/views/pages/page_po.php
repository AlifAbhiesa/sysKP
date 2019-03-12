
<div class="content-wrapper">

    <div class="col-md-12 grid-margin" id="listPo">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Po List</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Photo</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" onclick="showRegisterPo('add')"
                            style="width: 100%;">
                        Add New Po
                    </button>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-12 grid-margin" style="display: none" id="registerShop">
		<div class="card">
			<div class="card-body">

				<h3 class="box-title">Add PO</h3>
				<br>

				<div id="smartwizard">
					<ul style="z-index: 10;">
						<li><a href="#step-1">Step 1<br/>
								<small>PO</small>
							</a></li>
						<li><a href="#step-2">Step 2<br/>
								<small>PO Receipt</small>
							</a></li>
					</ul>

					<div>
						<div id="step-1" class="">
							<div class="form-group">
								<h5 class="border-bottom border-gray pb-2">Customer Name</h5>
								<input type="text" class="form-control" id="customerName"
									   placeholder="Input Market Name...">

								<h5 class="border-bottom border-gray pb-2">Customer Address</h5>
								<input type="text" class="form-control" id="customerAddress"
									   placeholder="Input Market Name...">

								<h5 class="border-bottom border-gray pb-2">Customer Phone</h5>
								<input type="text" class="form-control" id="customerPhone"
									   placeholder="Input Market Name...">

								<h5 class="border-bottom border-gray pb-2">Foto Bon</h5>
								<span id="btnUpload" class="btn btn-success fileinput-button">
        							<span>Upload Foto Bon PO ...</span>
									<!-- The file input field used as target for the file upload widget -->
        						<input id="fileupload" type="file" name="files[]" multiple>
    							</span>
								<br>
								<br>

								<button id="savePo" class="btn btn-success" style="margin-top: 5px" onclick="saveData()">Save PO</button>
								<button id="updatePo" class="btn btn-success" onclick="updateData()">Update PO</button>
								<input hidden type="text" id="idPo">
							</div>
						</div>
						<div id="step-2" class="">
							<div class="form-group">
								<h3 class="border-bottom border-gray pb-2">List Receipt</h3>
								<div id="coba">
									<table class="table table-bordered table-striped dt-responsive" id="poReceiptTable"
										   width="100%">

										<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Description</th>
											<th>Quantity</th>
											<th>Price</th>
										</tr>
										</thead>

									</table>
									<br>
									<button type="button" class="btn btn-success" onclick="showModal()"
											style="width: 100%;">
										Add Goods
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>



<!--				Start Of modal-->
<div class="modal modal-success fade" id="modalPoReceipt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add PO Receipt</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
						onclick="closeModal()">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Receipt</label>
					<select name="idReceipt" id="idReceipt" class="form-control">
						<?php foreach ($list_receipt as $row): ?>
							<option value="<?= $row['idReceipt'] ?>"><?= $row['name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Quantity</label>
					<input type="text" class="form-control" id="qty"
						   placeholder="Input Quantity...">
				</div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Price</label>
					<input type="text" class="form-control" id="price"
						   placeholder="Input Quantity...">
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
						onclick="closeModal()">Close
				</button>
				<button onclick="addPoReceipt()" type="button" class="btn btn-outline">Add PO Receipt
				</button>
			</div>
		</div>
	</div>
</div>

<!--				End of modal -->
<script>

	function showModal() {
		$('#modalPoReceipt').modal({
			backdrop: 'static',
			keyboard: false
		});
		$("#modalPoReceipt").modal('show');

	}

	function closeModal() {
		$("#modalPoReceipt").modal('hide');
	}

	var namefileuploaded;

	$(function () {
		'use strict';
		// Change this to the location of your server-side upload handler:
		var url = '<?= base_url() ?>'+'/public/imagePo/';
		$('#fileupload').fileupload({
			url: url,
			dataType: 'json',
			done: function (e, data) {
				$.each(data.result.files, function (index, file) {
					if(getFileExtension(file.name) == 'png' ||
						getFileExtension(file.name) == 'jpeg' ||
						getFileExtension(file.name) == 'jpg' ||
						getFileExtension(file.name) == 'JPG'){
						namefileuploaded = file.name;
						$('#btnUpload').hide();
						alert('Bon Uploaded !');
					}else{
						alert('file tidak support !');
						namefileuploaded = "";

					}

				});
			},

		}).prop('disabled', !$.support.fileInput)
			.parent().addClass($.support.fileInput ? undefined : 'disabled');
	});

	function getFileExtension(filename){
		return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
	}

	//wizard
	function showRegisterPo(action) {

		if(action == 'add'){
			document.getElementById("updatePo").setAttribute("hidden","true");
			document.getElementById("savePo").removeAttribute("hidden");

			$("#listPo").hide();
			$('html, body').animate({scrollTop: 0}, 'fast');
			$("#registerShop").show();
			$('#smartwizard').smartWizard("reset");

		}else if(action == 'update'){
			document.getElementById("savePo").setAttribute("hidden","true");
			document.getElementById("updatePo").removeAttribute("hidden");

			$("#listShop").hide();
			$('html, body').animate({scrollTop: 0}, 'fast');
			$("#registerShop").show();
		}

	}

    showData();

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
                "url": "<?php echo site_url('Po/getAll')?>",
                "async":false,
                "type": "POST"
            },


        });

    };


	function saveData() {
		var customerName = document.getElementById("customerName").value;
		var customerAddress = document.getElementById("customerAddress").value;
		var customerPhone = document.getElementById("customerPhone").value;
		var photo = namefileuploaded;

		$.ajax({
			url: "<?php echo base_url('Po/addData'); ?>",
			type: "post",
			data: {
				customerName:customerName,
				customerAddress:customerAddress,
				customerPhone:customerPhone,
				photo:photo,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('PO Saved !');
					showData();
					$("#registerShop").hide();
					$("#listPo").show();
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}
	
	function updateData() {
		var customerName = document.getElementById("customerName").value;
		var customerAddress = document.getElementById("customerAddress").value;
		var customerPhone = document.getElementById("customerPhone").value;
		var photo = namefileuploaded;
		var idPo = document.getElementById("idPo").value;

		$.ajax({
			url: "<?php echo base_url('Po/updateData'); ?>",
			type: "post",
			data: {
				customerName:customerName,
				customerAddress:customerAddress,
				customerPhone:customerPhone,
				photo:photo,
				idPo:idPo,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('PO Saved !');
					showData();
					$("#registerShop").hide();
					$("#listPo").show();
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}

	//place for delete function

	function addPoReceipt() {
		var idReceipt = document.getElementById("idReceipt").value;
		var qty = document.getElementById("qty").value;
		var price = document.getElementById("price").value;
		var idPo = document.getElementById("idPo").value;

		$.ajax({
			url: "<?php echo base_url('PoReceipt/addData'); ?>",
			type: "post",
			data: {
				idReceipt:idReceipt,
				qty:qty,
				price:price,
				idPo:idPo,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('Receipt Saved !');
					getPoReceipt();
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}



	function getOne(id) {
		$.ajax({
			url: "<?php echo base_url('Po/getOne'); ?>",
			type: "post",
			data: {idPo:id},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response != ""){
					response = JSON.parse(response);
					document.getElementById("idPo").value = response['idPo'];
					namefileuploaded = response['photo'];
					document.getElementById("customerName").value = response['customerName'];
					document.getElementById("customerAddress").value = response['customerAddress'];
					document.getElementById("customerPhone").value = response['customerPhone'];
					showRegisterPo('update');
					$("#listPo").hide();
					getPoReceipt();
				}else{
					alert("Error cok euy !");
				}
			}
		});
	}

	function getPoReceipt() {
		var idPo = document.getElementById("idPo").value;
		table = $('#poReceiptTable').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"info": false,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('PoReceipt/getAll/')?>"+idPo,
				"type": "POST",
			},

			"columnDefs": [
				{
					"targets": [ 0 ],
					"orderable": false,
				},
			],

		});

	};
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // Step show event
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
            //alert("You are on step "+stepNumber+" now");
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'final') {
                // document.getElementById("prevmarket").innerHTML = $("#marketInput option:selected").text();
                $("#next-btn").addClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
        });
        $('#due_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'circles',
            transitionEffect: 'fade',
            showStepURLhash: true,
            toolbarSettings: {
                toolbarPosition: 'bottom',
                toolbarButtonPosition: 'end',
                // toolbarExtraButtons: [btnFinish, btnCancel]
            }
        });
    });





</script>

