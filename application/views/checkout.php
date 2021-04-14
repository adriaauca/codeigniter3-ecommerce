<?php
$amount = $total_amount[0]->total_amount;
$shipping = 0;
$total = $amount + $shipping;
?>

<?php
if (isset($headerInfo['nav_links'])) {
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
} else {
    ?>
        <main class="col-11">
        <?php
    }
        ?>
        <section>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <div class="pt-4 wish-list">
                            <form method="POST" action="<?php echo base_url(); ?>checkout/store">
                                <h5 class="mb-4">Billing Details</h5>

                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="firstName" value="<?php echo set_value("firstName"); ?>" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lastName" value="<?php echo set_value("lastName"); ?>" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="address" value="<?php echo set_value("address"); ?>" placeholder="Address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="postcode" value="<?php echo set_value("postcode"); ?>" placeholder="Postcode" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="city" value="<?php echo set_value("city"); ?>" placeholder="City" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" value="<?php echo set_value("phone"); ?>" placeholder="Phone" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="country" value="<?php echo set_value("country"); ?>" placeholder="Country" required>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="mb-4">Payment</h5>

                                <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="nameCard" class="form-label">Name on card</label>
                                        <input type="text" class="form-control" id="nameCard" name="nameCard" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cardNumber" class="form-label">Credit card number</label>
                                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="expiration" class="form-label">Expiration</label>
                                        <input type="text" class="form-control" id="expiration" name="expiration" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                                    </div>

                                    <div class="col-md-6 text-end">
                                        <button type="submit" class="btn btn-primary btn-block" id="checkout">Make Purchase</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="mb-3">
                        <div class="pt-4">

                            <h5 class="mb-3">Amount</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span><?php echo $amount; ?>€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span><?php echo $shipping; ?>€</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total</strong>
                                    </div>
                                    <strong><?php echo $total; ?>€</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        </main>

        <!-- JS -->