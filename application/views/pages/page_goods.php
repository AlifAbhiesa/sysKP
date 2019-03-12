
<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listGoods">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Good List</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" onclick="showRegisterGoods()"
                            style="width: 100%;">
                        Add New Goods
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin" style="display: none" id="registerGoods">
        <div class="card">
            <div class="card-body">
                <h3 class="box-title">Add Goods</h3>
                <br>

                <div id="smartwizard">
                    <ul style="z-index: 10;">
                        <li><a href="#step-1">Step 1<br/>
                                <small>Name and Description</small>
                            </a></li>
                        <li><a href="#step-2">Step 2<br/>
                                <small>Preview</small>
                            </a></li>
                    </ul>

                    <div>
                        <div id="step-1" class="">
                            <div class="form-group">
                                <h3 class="border-bottom border-gray pb-2">Name</h3>
                                <input type="text" class="form-control" id="nameGoods"
                                       placeholder="Input your Goods name" required><br>
                                <h3 class="border-bottom border-gray pb-2">Description</h3>
                                <input type="text" class="form-control" id="descriptionGoods"
                                       placeholder="Input your Goods descripton" required>
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <h3 class="border-bottom border-gray pb-2">Preview Goods Add</h3>
                            <div class="card">
                                <!--                                        <div class="card-header">My Details</div>-->
                                <div class="card-block p-0">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Market:</th>
                                            <td id="prevnama"></td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td id="prevdescription"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button onclick="addGoods()" type="button" class="btn btn-success" id="btnGoods"
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
<div class="modal modal-success fade" id="addgoodsform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Goods</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closegoods()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Name</label>
                    <input type="text" class="form-control" id="nameInput"
                           placeholder="Input Name...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Description</label>
                    <input type="text" class="form-control" id="descriptionInput"
                           placeholder="Input Description...">
                </div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Type</label>
					<select class="form-control" id="typeInput">
						<option value="1">Barang Belanja Pasar</option>
						<option value="2">Sub-Produk</option>
					</select>
				</div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Unit</label>
					<select class="form-control" id="unitInput">
						<option value="gram">Massa - Gram</option>
						<option value="ml">Volume - Mili Liter</option>
						<option value="pcs">Pcs</option>
					</select>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closegoods()">Close
                </button>
                <button onclick="addGoodsMaster()" type="button" class="btn btn-outline">Add Goods
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="updategoodsform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Update Shopping Goods</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closegoods()">
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
                    <label class="border-bottom border-gray pb-2">Description</label>
                    <input type="text" class="form-control" id="goodsDescription"
                           placeholder="Input Description...">
                </div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Type</label>
					<select class="form-control" id="goodsType">
						<option value="1">Barang Belanja Pasar</option>
						<option value="2">Sub-Produk</option>
					</select>
				</div>

				<div class="form-group">
					<label class="border-bottom border-gray pb-2">Unit</label>
					<select class="form-control" id="goodsUnit">
						<option value="gram">Massa - Gram</option>
						<option value="ml">Volume - Mili Liter</option>
						<option value="pcs">Pcs</option>
					</select>
				</div>

            </div>
            <div class="modal-footer">
				<input style="display: none" type="text" id="idGoods">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closegoods()">Close
                </button>
                <button onclick="updateGoods()" type="button" class="btn btn-outline">Update Goods
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    showData();

    function showRegisterGoods() {
        $('#addgoodsform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#addgoodsform").modal('show');
    }

    function closegoods() {
        //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#addgoodsform").modal('hide');
        $("#updategoodsform").modal('hide');
    }

    function addGoodsMaster() {

        var name = document.getElementById("nameInput").value;
        var description = document.getElementById("descriptionInput").value;
        var type = document.getElementById("typeInput").value;
        var unit = document.getElementById("unitInput").value;

        $.ajax({
            url: "<?php echo base_url('Goods/addData'); ?>",
            type: "post",
            data: {
                name:name,
                description:description,
                type:type,
                unit:unit,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response !== 0){
                    alert('Goods Added !');
                    showData();
                    closegoods();
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });

    }

    function updateGoods() {
        var name = document.getElementById("goodsName").value;
        var description = document.getElementById("goodsDescription").value;
        var type = document.getElementById("goodsType").value;
        var unit = document.getElementById("goodsUnit").value;
        var id = document.getElementById("idGoods").value;

        $.ajax({
            url: "<?php echo base_url('Goods/updateData'); ?>",
            type: "post",
            data: {
                idGoods:id,
                name: name,
                description: description,
                type: type,
                unit: unit,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Goods updated !');
                    showData();
                    closegoods();
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function deleteGoods(id) {
        $.ajax({
            url: "<?php echo base_url('Goods/deleteData'); ?>",
            type: "post",
            data: {idGoods:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Goods deleted !');
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
            data: {idGoods:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response != ""){
                    response = JSON.parse(response);
                    document.getElementById("goodsName").value = response['name'];
                    document.getElementById("goodsDescription").value = response['description'];
                    document.getElementById("goodsType").value = response['type'];
                    document.getElementById("goodsUnit").value = response['unit'];
                    document.getElementById("idGoods").value = response['idGoods'];
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
                "url": "<?php echo site_url('Goods/getAll')?>",
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
</script>
