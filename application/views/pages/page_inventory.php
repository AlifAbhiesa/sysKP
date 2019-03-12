<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listInventory">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Inventory List</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Availability</th>

                        </tr>
                        </thead>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="addinventoryform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add Inventory</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeinventory()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Goods</label>
                    <input type="text" class="form-control" id="goodsInput"
                           placeholder="Input Name...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Description</label>
                    <input type="text" class="form-control" id="descriptionInput"
                           placeholder="Input Description...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closeinventory()">Close
                </button>
                <button onclick="addInventory()" type="button" class="btn btn-outline">Add Inventory
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="updateinventoryform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Update Inventory Goods</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeinventory()">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closeinventory()">Close
                </button>
                <button onclick="updateInventory()" type="button" class="btn btn-outline">Update Inventory
                </button>
            </div>
        </div>
    </div>
</div>

<script>
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
                "url": "<?php echo site_url('Inventory/getAll')?>",
                "async":false,
                "type": "POST"
            },


        });

    };
</script>
