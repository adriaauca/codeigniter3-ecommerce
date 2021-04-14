<?php
    $amount = 0;
    $shipping = 0;
?>

<?php 
    if(isset($headerInfo['nav_links']))
    {
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<?php
    }
    else
    {
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

                        <h5 class="mb-4">Cart (<?php echo count($all_chart_products); ?> items)</h5>

                        <div class="row justify-content-center mb-4">
                            <?php

                            foreach ($all_chart_products as $chart_product) {

                                if (!$this->session->userdata('name'))
                                {
                                    $chart_product = (object)$chart_product;
                                    $chart_product->quantity = $chart_product->qty;
                                    $chart_product->id_chart = "'".$chart_product->rowid."'";
                                }
                            ?>
                                <div class="col-sm-6 col-md-6 col-lg-12 mb-4 row">

                                    <div class=" col-lg-3 col-xl-3">
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <a href="<?php echo (str_replace(' ', '_', $chart_product->name)); ?>" class="card">
                                                <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                                            </a>
                                        </div>
                                    </div>

                                    <div class=" col-lg-9 col-xl-9">

                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo $chart_product->name; ?></h5>
                                                <p class="mb-3 text-muted text-uppercase small"><?php echo $chart_product->name_department; ?></p>
                                                <p class="mb-2 text-muted text-uppercase small">Model: <?php echo $chart_product->model; ?></p>
                                                <p class="mb-3 text-muted text-uppercase small">Color: <?php echo $chart_product->color; ?></p>
                                            </div>
                                            <div class="text-end">
                                                <p><u><?php echo $chart_product->quantity; ?> Unitys</u></p>
                                                <?php
                                                    if ($chart_product->discount_status == 1)
                                                    {
                                                ?>
                                                    <p><span class="promocion">Promoción</span></p>
                                                    <p><span class="discount" style="display: inline; margin: 0;"><?php echo $chart_product->discount; ?>%</span></p>
                                                    <p><div class="old" style="margin-top: 6px;"><?php echo $chart_product->last_price; ?>€</div></p>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <button type="button" class="btn btn-danger" onclick="removeItem(<?php echo $chart_product->id_chart; ?>)">Remove item</button>
                                            </div>
                                            <div>
                                                <strong id="summary"><?php echo $chart_product->price; ?>€</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php

                                $amount = $amount + ($chart_product->price * $chart_product->quantity);
                            }
                            ?>
                            <script>
                                amount = <?php echo $amount; ?>;
                                shipping = <?php echo $shipping; ?>;
                            </script>
                        </div>
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
                                <span><span id="temporary_amount">0</span>€</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span><span id="shipping">0</span>€</span>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Discount Code
                                <span><span id="discount_code">0</span>€</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 row">
                                <a class="dark-grey-text d-flex justify-content-between col-12" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Add a discount code (optional)
                                </a>

                                <div class="collapse col-12" id="collapseExample">
                                    <div class="mt-3">
                                        <div class="md-form md-outline mb-0">
                                            <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Enter discount code">
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total</strong>
                                </div>
                                <strong><span id="total_amount">0</span>€</strong>
                            </li>
                        </ul>

                        <div class="text-end">
                            <button type="button" class="btn btn-primary btn-block" id="checkout">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/chart.js" type="text/javascript"></script>