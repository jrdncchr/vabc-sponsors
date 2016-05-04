<!--<h2>Shop</h2>-->
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">Shop Details</div>
            <div class="panel-body">
                <?php if(isset($shop)) { ?>
                    <div class="form-group">
                        <label>Total Sales</label>
                        <p class="lead">$0.00</p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><?php echo $shop->name; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><?php echo $shop->description; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <p><?php echo $shop->enabled ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>'; ?></p>
                    </div>
                    <div class="btn btn-block btn-default" data-toggle="modal" data-target="#shop-details-modal">Edit Shop Details</div>
                <?php } else { ?>
                    <div class="alert alert-warning"><i class="fa fa-question-circle"></i> Your shop is not yet activated.</div>
                    <button class="btn btn-default btn-block" data-toggle="modal" data-target="#shop-details-modal">Activate Shop</button>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">Products</div>
            <div class="panel-body">
                <table id="product-list-dt" class="display table table-hover table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="shop-details-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Shop Details</h4>
            </div>
            <div class="modal-body">
                <div class="notice"></div>
                <div class="form-group">
                    <label for="shop-name">* Shop Name</label>
                    <input type="text" class="form-control required" id="shop-name"
                        value="<?php echo isset($shop) ? $shop->name : "" ?>" />
                </div>
                <div class="form-group">
                    <label for="shop-description">* Description</label>
                    <textarea class="form-control required" id="shop-description" rows="4" maxlength="500"><?php echo isset($shop) ? $shop->description : ""; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="shop-status">Status</label>
                    <div class="checkbox" style="margin: 0;">
                        <input type="checkbox" id="shop-status" <?php echo isset($shop) ? ($shop->enabled == 1 ? "checked" : "") : ""; ?> />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-vabc" id="save-shop-details-btn">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var actionUrl = "<?php echo $client_base_url . '/sponsor/shop/action'; ?>";
    var shopEnabled = "<?php echo isset($shop) ? ($shop->enabled == 1 ? true : false) : false; ?>";
    var shopId = "<?php echo isset($shop) ? $shop->shop_id : 0; ?>";

    $(function() {
        $('#nav-shop-link').addClass('active');

        $("#shop-status").bootstrapSwitch({
            onText: "Enabled",
            offText: "Disabled",
            inverse: true,
            onSwitchChange: function(event, state) {
                shopEnabled = state;
            }
        });

        $('#product-list-dt').dataTable();

        activateEvents();

//        $('#product-list-dt').dataTable({
//            "destroy": true,
//            "ajax": {
//                "type": "POST",
//                "url": actionUrl,
//                "data": {action: "list"}
//            },
//            columns: [
//                {data: "date_created", width: "20%"},
//                {data: "title", width: "30%"},
//                {data: "product_id", width: "15%"},
//                {data: "supplier_id", width: "15%"},
//                {data: "status", width: "20%"}
//            ],
//            "fnDrawCallback": function (oSettings) {
//                var table = $("#product-list-dt").dataTable();
//                $('#product-list-dt tbody tr').on('dblclick', function () {
//                    var pos = table.fnGetPosition(this);
//                    var data = table.fnGetData(pos);
//                    window.location = "<?php //echo base_url() . "product/form/" ?>//" + data.product_id;
//                });
//            }
//        });


    });

    function activateEvents() {
        $('#save-shop-details-btn').on('click', function() {
            var form = $('#shop-details-modal');
            if(validator.validateForm(form)) {
                var data = {
                    action : 'shop_save',
                    shop : {
                        name : $('#shop-name').val(),
                        description : $('#shop-description').val(),
                        enabled : shopEnabled ? 1 : 0
                    }
                };

                if(shopId > 0) {
                    data.shop.shop_id = shopId;
                }

                $.post(actionUrl, data, function(res) {
                    if(res.success) {
                        toastr.success('Saving shop details successful!');
                        setTimeout(function() {
                            window.location = "<?php echo $client_base_url . '/sponsor/shop'; ?>";
                        }, 1400);

                    }
                }, 'json');
            }
        });
    }
</script>