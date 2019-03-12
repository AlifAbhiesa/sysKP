
<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listProduction">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Production List</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Po ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>HPP</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" onclick="showRegisterProduction()"
                            style="width: 100%;">
                        Add New Production
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="addproductionform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Production</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeproduction()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
					<label class="border-bottom border-gray pb-2">Po</label>
					<select name="goodsName" id="idPo" class="form-control">
						<option>--pilih--</option>
						<?php foreach ($list_po as $row): ?>
							<option value="<?= $row['idPo'] ?>"><?= $row['customerName']. ' - ' .$row['createdAt'] ?></option>
						<?php endforeach; ?>
					</select>
                </div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Receipt</label>
					<select name="goodsName" id="idReceipt" class="form-control">

					</select>
				</div>

                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Quantity</label>
                    <input type="text" class="form-control" id="qty"
                           placeholder="Input Quantity...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closeproduction()">Close
                </button>
                <button onclick="addProduction()" type="button" class="btn btn-outline">Add Production
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="updateroductionform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Update Production</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeproduction()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Name</label>
                    <input type="text" class="form-control" id="goodsName"
                           placeholder="Input Name...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Quantity</label>
                    <input type="text" class="form-control" id="quantityDescription"
                           placeholder="Input Quantity...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closequantity()">Close
                </button>
                <button onclick="updateProduction()" type="button" class="btn btn-outline">Update Production
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    showData();

    function showRegisterProduction() {
        $('#addproductionform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#addproductionform").modal('show');
    }

    function closeproduction() {
        //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#addproductionform").modal('hide');
    }

    function addProduction() {

        var idPo = document.getElementById("idPo").value;
        var idReceipt = document.getElementById("idReceipt").value;
        var qty = document.getElementById("qty").value;
        //get Receipt Name For Information On New Goods
        var ReceiptName = document.getElementById("idReceipt");
		var receipt = ReceiptName.options[ReceiptName.selectedIndex];

        $.ajax({
            url: "<?php echo base_url('Production/addData'); ?>",
            type: "post",
            data: {
                idPo:idPo,
				idReceipt:idReceipt,
                qty:qty,
				receipt:receipt.text,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response !== 0){
                    alert('Production Added !');
                    showData();
                    closegoods();
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });

    }

    function updateProduction(id) {
        var name = document.getElementById("goodsName").value;
        var quantity = document.getElementById("goodsQuantity").value;

        $.ajax({
            url: "<?php echo base_url('Production/updateData'); ?>",
            type: "post",
            data: {
                idProduction:id,
                name: name,
                quantity: quantity,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response !== 0){
                    alert('Production updated !');
                    showData();

                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function deleteProduction(id) {
        $.ajax({
            url: "<?php echo base_url('Production/deleteData'); ?>",
            type: "post",
            data: {idProduction:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Production deleted !');
                    showData();

                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function getOne(id) {
        $("#updategoodsform").modal('show');
        $.ajax({
            url: "<?php echo base_url('Goods/getOne'); ?>",
            type: "post",
            data: {idProduction:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response != ""){
                    response = JSON.parse(response);
                    document.getElementById("goodsName").value = response['name'];
                    document.getElementById("goodsDescription").value = response['description'];
                    document.getElementById("idProduction").value = response['idProduction'];
                    showRegisterShop('update');
                    getGoods();
                    $("#updategoodsform").modal('hide');
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

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
                "url": "<?php echo site_url('Production/getAll')?>",
                "async":false,
                "type": "POST"
            },


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
                document.getElementById("prevname").innerHTML = document.getElementById("name").value;
                document.getElementById("prevdescription").innerHTML = document.getElementById("due_date").value;
                $("#next-btn").addClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
        });
        //Datemask dd/mm/yyyy
        // $('#due_date').formatDate('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
        // $('#due_date').datepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

        // $('#dede').datepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });

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


    //dropdown po receipt by id Po

	$(function() {

		$.ajaxSetup({
			type: "POST",
			url: "<?php echo base_url('Production/getReceipt') ?>",
			cache: false,
		});

		$("#idPo").change(function () {

			var value = $(this).val();
			if (value > 0) {
				$.ajax({
					data: {id: value},
					success: function (respond) {
						$("#idReceipt").html(respond);
					}
				})
			}

		});

	});
</script>
