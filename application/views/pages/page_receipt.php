<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listReceipt">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Receipt List</h3>
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
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" onclick="showRegisterReceipt('add')"
                            style="width: 100%;">
                        Add New Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin" style="display: none" id="registerReceipt">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Add Receipt</h3>
                <br>

                <div id="smartwizard">
                    <ul style="z-index: 10;">
                        <li><a href="#step-1">Step 1<br/>
                                <small>Receipt</small>
                            </a></li>
                        <li><a href="#step-2">Step 2<br/>
                                <small>Goods</small>
                            </a></li>
                    </ul>

                    <div>
                        <div id="step-1" class="">
                            <div class="form-group">
                                <h3 class="border-bottom border-gray pb-2">Name</h3>
                                <input type="text" class="form-control" id="receiptName"
                                       placeholder="Input Receipt Name..."><br>
                                <h3 class="border-bottom border-gray pb-2">Description</h3>
                                <input type="text" class="form-control" id="receiptDescription"
                                       placeholder="Input Receipt Description..."><br>


                                <!--                                <input type="text" id="ReceiptName" class="border-bottom" placeholder="Receipt Name"><br>-->
                                <button id="saveReceipt" class="btn btn-success" style="margin-top: 5px" onclick="addReceipt()">Save Receipt</button>
                                <button id="updateReceipt" class="btn btn-success" onclick="updateReceipt()">Update Receipt</button>
                                <input hidden type="text" id="idReceipt">
                            </div>
                        </div>
                        <div id="step-2" class="">
                            <div class="form-group">
                                <h3 class="border-bottom border-gray pb-2">Receipt Goods</h3>
                                <div id="coba">
                                    <table class="table table-bordered table-striped dt-responsive" id="receiptGoodsTable"
                                           width="100%">

                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Goods</th>
                                            <th>Description</th>
                                            <th>Quantity</th>

                                        </tr>
                                        </thead>

                                    </table>
                                    <br>
                                    <button type="button" id="btnAdd" class="btn btn-success" onclick="showAddReceiptGoodsModal()"
                                            style="width: 100%;">
                                        Add Receipt Goods
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
<div class="modal modal-success fade" id="addreceiptgoodsform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Shopping Goods</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closereceiptgoods()">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closereceiptgoods()">Close
                </button>
                <button onclick="addReceiptGoods()" type="button" class="btn btn-outline">Add Goods
                </button>
            </div>
        </div>
    </div>
</div>

<!--				End of modal -->

<!--				Start Of modal-->
<div class="modal modal-success fade" id="updatereceiptgoodsform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Shopping Goods</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closereceiptgoods()">
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
            </div>
            <div class="modal-footer">
                <input type="text" hidden class="form-control" id="idReceiptGoods">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closereceiptgoods()">Close
                </button>
                <button onclick="updateReceiptGoods()" type="button" class="btn btn-outline">Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    showData();

    function showAddReceiptGoodsModal() {

        document.getElementById("goodsInput").value = "";
        document.getElementById("quantityInput").value = "";
        document.getElementById("unitInput").value = "";

        $('#addreceiptgoodsform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#addreceiptgoodsform").modal('show');
        // getList();
    }

    function showUpdateReceiptGoodsModal() {
        $('#updatereceiptgoodsform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#updatereceiptgoodsform").modal('show');

    }

    function showRegisterReceipt(action) {

        if(action == 'add'){
            document.getElementById("updateReceipt").setAttribute("hidden","true");
            document.getElementById("saveReceipt").removeAttribute("hidden");

            $("#listReceipt").hide();
            $('html, body').animate({scrollTop: 0}, 'fast');
            $("#registerReceipt").show();
            $('#smartwizard').smartWizard("reset");

            document.getElementById("goodsInput").value = "";
            document.getElementById("quantityInput").value = "";
            document.getElementById("unitInput").value = "";
            document.getElementById("idReceipt").value = "";
            document.getElementById("receiptName").value = "";
        }else if(action == 'update'){
            document.getElementById("saveReceipt").setAttribute("hidden","true");
            document.getElementById("updateReceipt").removeAttribute("hidden");

            $("#listReceipt").hide();
            $('html, body').animate({scrollTop: 0}, 'fast');
            $("#registerReceipt").show();
        }

    }

    function closereceiptgoods() {
        //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#addreceiptgoodsform").modal('hide');
    }



    function closereceipt() {
        //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#addreceiptform").modal('hide');
        $("#updatereceiptform").modal('hide');
    }

    function addReceiptGoods() {

        var idReceipt = document.getElementById("idReceipt").value;
        var idGoods = document.getElementById("goodsInput").value;
        var qty = document.getElementById("quantityInput").value;
        var unit = document.getElementById("unitInput").value;

        // alert(idReceipt + idGoods + qty + unit);

        $.ajax({
            url: "<?php echo base_url('ReceiptGoods/addData'); ?>",
            type: "post",
            data: {
                idReceipt: idReceipt,
                idGoods: idGoods,
                qty: qty,
                unit: unit,
            },
            cache: false,
            success: function (response) {
                alert(response);
                if(response !== 0){
                    alert('Receipt Goods Added !');
                    getReceiptGoods();
                    closereceiptgoods();
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });
    }

    function updateReceiptGoods() {

        var idGoods = document.getElementById("updgoodsInput").value;
        var qty = document.getElementById("updquantityInput").value;
        var unit = document.getElementById("updunitInput").value;
        var id = document.getElementById("idReceiptGoods").value;

        $.ajax({
            url: "<?php echo base_url('ReceiptGoods/updateData'); ?>",
            type: "post",
            data: {
                idGoods:idGoods,
                qty:qty,
                unit:unit,
                id:id,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    getReceiptGoods();
                    alert('Goods updated !');
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });
    }

    function cleardatatable() {
        var t = $('#receiptGoodsTable').DataTable();
        t
            .clear()
            .draw();
    }

    function getReceiptGoods() {
        var idReceipt = document.getElementById("idReceipt").value;
        table = $('#receiptGoodsTable').DataTable({
            "processing": true,
            "destroy": true,
            "serverSide": true,
            "info": false,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('ReceiptGoods/getAll/')?>"+idReceipt,
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

    function getOneGoods(id) {

        $.ajax({
            url: "<?php echo base_url('ReceiptGoods/getOne'); ?>",
            type: "post",
            data: {id:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response != ""){
                    response = JSON.parse(response);
                    document.getElementById("updgoodsInput").value = response['idGoods'];
                    document.getElementById("updquantityInput").value = response['qty'];
                    document.getElementById("updunitInput").value = response['unit'];
                    document.getElementById("idReceiptGoods").value = response['id'];
                    showUpdateReceiptGoodsModal();
                }else{
                    alert("Error cok euy !");
                }
            }
        });

    }

    function addReceipt() {

        var name = document.getElementById("receiptName").value;
        var description = document.getElementById("receiptDescription").value;

        $.ajax({
            url: "<?php echo base_url('Receipt/addData'); ?>",
            type: "post",
            data: {
                name:name,
                description:description,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response !== 0){
                    alert('Receipt Added !');
                    document.getElementById("idReceipt").value = response;
                    // document.getElementById("saveReceipt").setAttribute("hidden","true");
                    // document.getElementById("updateReceipt").removeAttribute("hidden");
                    showData();
                    closereceipt();
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });

    }

    function updateReceipt() {
        var name = document.getElementById("receiptName").value;
        var description = document.getElementById("receiptDescription").value;
        var id = document.getElementById("idReceipt").value;

        $.ajax({
            url: "<?php echo base_url('Receipt/updateData'); ?>",
            type: "post",
            data: {
                idReceipt:id,
                name: name,
                description: description,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Receipt updated !');
                    showData();
                    closereceipt()
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function deleteReceipt(id) {
        $.ajax({
            url: "<?php echo base_url('Receipt/deleteData'); ?>",
            type: "post",
            data: {idReceipt:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Receipt deleted !');
                    showData();

                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function deleteReceiptGoods(id) {
        $.ajax({
            url: "<?php echo base_url('ReceiptGoods/deleteData'); ?>",
            type: "post",
            data: {id:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('Receipt Goods deleted !');
                    getReceiptGoods();
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function getOne(id) {
        $("#updatereceiptform").modal('show');
        $.ajax({
            url: "<?php echo base_url('Receipt/getOne'); ?>",
            type: "post",
            data: {idReceipt:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response != ""){
                    response = JSON.parse(response);
                    document.getElementById("receiptName").value = response['name'];
                    document.getElementById("receiptDescription").value = response['description'];
                    document.getElementById("idReceipt").value = response['idReceipt'];
                    showRegisterReceipt('update');
                    getReceiptGoods();
                    $("#updatereceiptform").modal('hide');
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
                "url": "<?php echo site_url('Receipt/getAll')?>",
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
            url: "<?php echo base_url('ReceiptGoods/getGoodsByPO') ?>",
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
