<div class="row">
    <div class="col-sm-12">
        <p style="font-weight: bold;">Summary: </p>
    </div>
    <div class="col-sm-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Event</th>
                <th>Sponsorship Level</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody id="summary-body">

                <?php
                $total = 0;
                foreach($events as $e): ?>
                    <tr>
                        <td><?php echo $e->name; ?></td>
                        <td><?php echo $level->name; ?></td>
                        <td>$<?php echo number_format($level->price); ?></td>
                    </tr>
                <?php
                    $total += $level->price;
                endforeach; ?>
            <tr>
                <td colspan="2" class="text-right">Total</td>
                <td><b>$<?php echo number_format($total); ?></b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <p style="font-weight: bold;">Select Payment option: </p>
    </div>
    <div class="col-sm-4">
        <form id="paypalForm" action="<?php echo $paypal['url']; ?>" method="post">

            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="<?php echo $paypal['business']; ?>">

            <!-- Specify a Buy Now button. -->
            <input type="hidden" name="cmd" value="_xclick">

            <!-- Specify details about the item that buyers will purchase. -->
            <input type="hidden" name="item_name" value="Sponsorship" />
            <input type="hidden" name="amount" value="<?php echo $total; ?>" />
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="custom" value="<?php echo $events_sponsoring; ?>" />
            <!-- Specify URLs -->
            <input type='hidden' name='cancel_return' value='<?php echo base_url() . 'register'; ?>'>
            <input type="hidden" name="notify_url" value="<?php echo base_url() . 'sponsor/page/payment_success';  ?>"/>
            <input type='hidden' name='return' value='<?php echo base_url() . 'sponsor/page/payment_success'; ?>'>

            <!-- Display the payment button. -->
            <div class="text-center">
                <div class="panel panel-primary" id="payment-pp" onclick="return submitPaypalForm()">
                    <div class="panel-body text-center">
                        <i class="fa fa-cc-paypal fa-4x"></i>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default" id="payment-stripe">
            <div class="panel-body text-center">
                <i class="fa fa-cc-visa fa-4x"></i>
            </div>
        </div>
    </div>
</div>