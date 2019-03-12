<div class="content-wrapper">
        <div class="col-md-12 grid-margin" id="listShop">
            <div class="card">
                <div class="card-body">
                    <div class="box-header">
                        <h3 class="box-title">Shopping List</h3>
                        <hr>
                    </div>
                    <div class="box-body">
                        <hr>
                        <table class="table table-bordered table-striped dt-responsive  col-md-12" id="myData" width="100%" >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Market</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                        <br>
                        <button type="button" class="btn btn-success" onclick="showRegisterShop('add')"
                                style="width: 100%;">
                            Add New Shop
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-12 grid-margin" style="display: none" id="registerShop">
        <div class="card">
            <div class="card-body">

                    <h3 class="box-title">Add Shopping</h3>
                <br>

                <div id="smartwizard">
                    <ul style="z-index: 10;">
                        <li><a href="#step-1">Step 1<br/>
                                <small>Market</small>
                            </a></li>
                        <li><a href="#step-2">Step 2<br/>
                                <small>Goods</small>
                            </a></li>
                    </ul>

                    <div>
                        <div id="step-1" class="">
                            <div class="form-group">
                                <h3 class="border-bottom border-gray pb-2">Market</h3>
                                <input type="text" class="form-control" id="marketName"
                                       placeholder="Input Market Name..."><br>

								<h3 class="border-bottom border-gray pb-2">PO</h3>
								<select name="goodsName" id="idPo" class="form-control">
									<?php foreach ($list_po as $row): ?>
										<option value="<?= $row['idPo'] ?>"><?= $row['customerName'].' - '.$row['createdAt'] ?></option>
									<?php endforeach; ?>
								</select>

<!--                                <input type="text" id="marketName" class="border-bottom" placeholder="Market Name"><br>-->
								<button id="saveMarket" class="btn btn-success" style="margin-top: 5px" onclick="saveShopping()">Save Market</button>
								<button id="updateMarket" class="btn btn-success" onclick="updateShopping()">Update Market</button>
								<input hidden type="text" id="idShopping">
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="form-group">
                                <h3 class="border-bottom border-gray pb-2">Goods</h3>
                                <div id="coba">
                                    <table class="table table-bordered table-striped dt-responsive" id="goodsTable"
                                           width="100%">

                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Goods</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
<!--                                            <th>Unit</th>-->

                                        </tr>
                                        </thead>

                                    </table>
                                    <br>
                                    <button type="button" id="btnAdd" class="btn btn-success" onclick="showAddShopGoodsModal()"
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
<div class="modal modal-success fade" id="addshopgoodsform">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add Shopping Goods</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
						onclick="closeshopgoods()">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Goods</label>
					<select name="goodsName" id="goodsInput" class="form-control">
						<?php foreach ($list_goods as $row): ?>
							<option value="<?= $row['idGoods'] ?>"><?= $row['name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Quantity</label>
					<input type="text" class="form-control" id="quantityInput"
						   placeholder="Input Quantity...">
				</div>
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Unit</label>
                    <select id="unitInput" class="form-control select2" style="width: 100%;" placeholder="Select Unit...">
                        <option value="Ons">Ons</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Liter">Liter</option>
                        <option value="Kg">Kg</option>
                        <option value="gram">gram</option>
                    </select>
				</div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Price</label>
                    <input type="text" class="form-control" id="priceInput"
                           placeholder="Input Price...">
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
						onclick="closeshopgoods()">Close
				</button>
				<button onclick="addGoods()" type="button" class="btn btn-outline">Add Goods
				</button>
			</div>
		</div>
	</div>
</div>

<!--				End of modal -->

<!--				Start Of modal-->
<div class="modal modal-success fade" id="updateshopgoodsform">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<label class="border-bottom border-gray pb-2">Add Shopping Goods</label>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
						onclick="closeshopgoods()">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Goods</label>
					<select name="goodsName" id="updgoodsInput" class="form-control">
						<?php foreach ($list_goods as $row): ?>
							<option value="<?= $row['idGoods'] ?>"><?= $row['name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Quantity</label>
					<input type="text" class="form-control" id="updquantityInput"
						   placeholder="Input Quantity...">
				</div>
				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Unit</label>
                    <select id="updunitInput" class="form-control select2" style="width: 100%;" placeholder="Select Unit...">
                        <option value="Ons">Ons</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Liter">Liter</option>
                        <option value="Kg">Kg</option>
                        <option value="gram">gram</option>
                    </select>
				</div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Price</label>
                    <input type="text" class="form-control" id="updpriceInput"
                           placeholder="Input Price...">
                </div>
			</div>
			<div class="modal-footer">
				<input type="text" hidden class="form-control" id="idShopGoods">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
						onclick="closeshopgoods()">Close
				</button>
				<button onclick="updateShopGoods()" type="button" class="btn btn-outline">Save Changes
				</button>
			</div>
		</div>
	</div>
</div>

<!--				End of modal -->
<script>

    showData();


    function showRegisterShop(action) {

    	if(action == 'add'){
			document.getElementById("updateMarket").setAttribute("hidden","true");
			document.getElementById("saveMarket").removeAttribute("hidden");

			$("#listShop").hide();
			$('html, body').animate({scrollTop: 0}, 'fast');
			$("#registerShop").show();
			$('#smartwizard').smartWizard("reset");

			document.getElementById("goodsInput").value = "";
			document.getElementById("quantityInput").value = "";
			document.getElementById("priceInput").value = "";
			document.getElementById("unitInput").value = "";
			document.getElementById("idShopping").value = "";
			document.getElementById("marketName").value = "";
		}else if(action == 'update'){
			document.getElementById("saveMarket").setAttribute("hidden","true");
			document.getElementById("updateMarket").removeAttribute("hidden");

			$("#listShop").hide();
			$('html, body').animate({scrollTop: 0}, 'fast');
			$("#registerShop").show();
		}

    }

    function showAddShopGoodsModal() {
        
        document.getElementById("goodsInput").value = "";
        document.getElementById("quantityInput").value = "";
        document.getElementById("unitInput").value = "";
        document.getElementById("priceInput").value = "";

        $('#addshopgoodsform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#addshopgoodsform").modal('show');
		getList();
    }

	function showUpdateShopGoodsModal() {
		$('#updateshopgoodsform').modal({
			backdrop: 'static',
			keyboard: false
		});
		$("#updateshopgoodsform").modal('show');

	}


	function closeshopgoods() {
      //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#addshopgoodsform").modal('hide');
    }

    function cleardatatable() {
        var t = $('#goodsTable').DataTable();
        t
            .clear()
            .draw();
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
                "url": "<?php echo site_url('Shop/getAll')?>",
                "async":false,
                "type": "POST"
            },


        });

    };

	function getGoods() {
		var idShopping = document.getElementById("idShopping").value;
		table = $('#goodsTable').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"info": false,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('ShopGoods/getAll/')?>"+idShopping,
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

	function saveShopping() {

		var marketName = document.getElementById("marketName").value;
		var idPo = document.getElementById("idPo").value;

		$.ajax({
			url: "<?php echo base_url('Shop/addData'); ?>",
			type: "post",
			data: {
				marketName:marketName,
				idPo:idPo,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response > 0){
                    alert('Market Saved !');
					document.getElementById("idShopping").value = response;
					document.getElementById("saveMarket").setAttribute("hidden","true");
					document.getElementById("updateMarket").removeAttribute("hidden");
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}

	function updateShopping() {

		var marketName = document.getElementById("marketName").value;
		var idShopping = document.getElementById("idShopping").value;
		var idPo = document.getElementById("idPo").value;

		$.ajax({
			url: "<?php echo base_url('Shop/updateData'); ?>",
			type: "post",
			data: {
				marketName:marketName,
				idShopping:idShopping,
				idPo:idPo,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('Market Updated !');
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}

    function addGoods() {

        var idShopping = document.getElementById("idShopping").value;
        var idGoods = document.getElementById("goodsInput").value;
        var qty = document.getElementById("quantityInput").value;
        var price = document.getElementById("priceInput").value;
        var unit = document.getElementById("unitInput").value;

            $.ajax({
                url: "<?php echo base_url('ShopGoods/addData'); ?>",
                type: "post",
                data: {
                    idShopping: idShopping,
                    idGoods: idGoods,
                    qty: qty,
                    price: price,
                    unit: unit,
                },
                cache: false,
                success: function (response) {
                    // alert(response);
                    if(response !== 0){
                    	alert('Goods Added !');
                    	getGoods();
                       closeshopgoods();
                    }else if(response == "Failed"){
                    	alert('Failed !');
                    }
                }
            });
    }

	function getOne(id) {
	    $.ajax({
	        url: "<?php echo base_url('Shop/getOne'); ?>",
	        type: "post",
	        data: {idShopping:id},
	        cache: false,
	        success: function (response) {
	            // alert(response);
	            if(response != ""){
	            	response = JSON.parse(response);
                    document.getElementById("marketName").value = response['market'];
                    document.getElementById("idShopping").value = response['idShopping'];
                    document.getElementById("idPo").value = response['idPo'];
					showRegisterShop('update');
					getGoods();
	            }else{
	                alert("Error cok euy !");
	            }
	        }
	    });
	}
	
	function getOneGoods(id) {

		$.ajax({
			url: "<?php echo base_url('ShopGoods/getOne'); ?>",
			type: "post",
			data: {id:id},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response != ""){
					response = JSON.parse(response);
					document.getElementById("updgoodsInput").value = response['idGoods'];
					document.getElementById("updquantityInput").value = response['qty'];
					document.getElementById("updpriceInput").value =  response['price'];
					document.getElementById("updunitInput").value = response['unit'];
					document.getElementById("idShopGoods").value = response['id'];
					showUpdateShopGoodsModal();
				}else{
					alert("Error cok euy !");
				}
			}
		});
		
	}

	function updateShopGoods() {

		var idGoods = document.getElementById("updgoodsInput").value;
		var qty = document.getElementById("updquantityInput").value;
		var price = document.getElementById("updpriceInput").value;
		var unit = document.getElementById("updunitInput").value;
		var id = document.getElementById("idShopGoods").value;

		$.ajax({
			url: "<?php echo base_url('ShopGoods/updateData'); ?>",
			type: "post",
			data: {
				idGoods:idGoods,
				qty:qty,
				price:price,
				unit:unit,
				id:id,
			},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					getGoods();
					alert('Goods updated !');
				}else if(response == "Failed"){
					alert('Failed !');
				}
			}
		});
	}

	function deleteShop(id) {
		$.ajax({
			url: "<?php echo base_url('Shop/deleteData'); ?>",
			type: "post",
			data: {idShopping:id},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('Shop deleted !');
					showData();
				}else{
					alert("Error cok euy !");
				}
			}
		});
	}

	function deleteShopGoods(id) {
		$.ajax({
			url: "<?php echo base_url('ShopGoods/deleteData'); ?>",
			type: "post",
			data: {id:id},
			cache: false,
			success: function (response) {
				// alert(response);
				if(response == "Ok"){
					alert('Goods deleted !');
					getGoods();
				}else{
					alert("Error cok euy !");
				}
			}
		});
	}

</script>

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var table = $('#goodsTable').DataTable();-->
<!---->
<!--        $('#goodsTable tbody').on('click', 'tr', function () {-->
<!--            if ($(this).hasClass('selected')) {-->
<!--                $(this).removeClass('selected');-->
<!--            }-->
<!--            else {-->
<!--                table.$('tr.selected').removeClass('selected');-->
<!--                $(this).addClass('selected');-->
<!--            }-->
<!--        });-->
<!---->
<!--        $('#buttonDeleteRow').click(function () {-->
<!--            table.row('.selected').remove().draw(false);-->
<!--        });-->
<!--    });-->
<!--</script>-->


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

	function getList() {

		$.ajaxSetup({
			type: "POST",
			url: "<?php echo base_url('ShopGoods/getGoodsByPO') ?>",
			cache: false,
		});
			var value = document.getElementById("idPo").value;
			if (value > 0) {
				$.ajax({
					data: {id: value},
					success: function (respond) {
						$("#goodsInput").html(respond);
					}
				})
			}



	}
</script>
