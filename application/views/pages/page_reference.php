
<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listGoods">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">Reference Shopping</h3>
                    <hr>
					<select name="goodsName" id="receipt" class="form-control">
						<?php foreach ($list_receipt as $row): ?>
							<option value="<?= $row['idReceipt'] ?>"><?= $row['name'] ?></option>
						<?php endforeach; ?>
					</select>
					<input type="text" class="form-control" id="qty"
						   placeholder="Input Quantity..." style="margin-top: 5px">
					<button class="btn btn-success" style="margin-top: 5px" onclick="getGoods()">count reference</button>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="goodsTable" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

	function getGoods() {
		var receipt = document.getElementById("receipt").value;
		var qty = document.getElementById("qty").value;
		table = $('#goodsTable').DataTable({
			"processing": true,
			"destroy": true,
			"serverSide": true,
			"info": false,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('ShopReference/getAll')?>",
				"type": "POST",
				"data" : {
					"receipt" : receipt,
					"qty" : qty,
				}
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
