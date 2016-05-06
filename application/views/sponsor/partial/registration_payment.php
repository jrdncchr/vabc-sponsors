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
                foreach($events as $e): ?>
                    <tr>
                        <td><?php echo $e->name; ?></td>
                        <td><?php echo $level->name; ?></td>
                        <td>$<?php echo number_format($level->price); ?></td>
                    </tr>
                <?php
                endforeach; ?>
            <tr>
                <td colspan="2" class="text-right">Total</td>
                <td><b>$<?php echo number_format($price_total); ?></b></td>
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
        <p>Pay using Card: </p>
        <form action="<?php echo $client_base_url . '/sponsor/page/payment_checkout_stripe' ?>" method="POST">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php  echo $stripe['publishable_key']?>"
                data-amount="<?php echo $price_total * 100; ?>"
                data-name="Sponsorship"
                data-custom="<?php echo $events_sponsoring; ?>"
                data-locale="auto">
            </script>
        </form>
        <br />

        <p>Pay using Paypal: </p>
        <form id="paypalForm" action="<?php echo PAYPAL_URL; ?>" method="post">

            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="<?php echo PAYPAL_BUSINESS; ?>">

            <!-- Specify a Buy Now button. -->
            <input type="hidden" name="cmd" value="_xclick">

            <!-- Specify details about the item that buyers will purchase. -->
            <input type="hidden" name="item_name" value="Sponsorship" />
            <input type="hidden" name="amount" value="<?php echo $price_total; ?>" />
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="custom" value="<?php echo $events_sponsoring; ?>" />
            <!-- Specify URLs -->
            <input type='hidden' name='cancel_return' value='<?php echo $client_base_url . '/register'; ?>'>
            <input type="hidden" name="notify_url" value="<?php echo $client_base_url . '/sponsor/page/payment_success_paypal';  ?>"/>
            <input type='hidden' name='return' value='<?php echo $client_base_url . '/sponsor/page/payment_success_paypal'; ?>'>

            <!-- Display the payment button. -->
            <input type="image" name="submit"
                   src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_pponly_142x27.png"
                   alt="PayPal - The safer, easier way to pay online">
        </form>
    </div>
</div>