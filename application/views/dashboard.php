<?php

//$pr_id = $data[0]->pr_id;
?>

<script>
    //pr_id = "<?php //echo $pr_id;
                ?>";
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">

        <?php
        if ($this->session->userdata('fk_role_id') && ROLE_ADMIN == $this->session->userdata('fk_role_id')) {
        ?>

            <h1 class="h2">Dashboard</h1>
            <hr><br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">
                <div class="col text-center">
                    <a class="card text-center" href="<?php echo base_url() ?>products" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </h5>
                            <p class="card-text">Products</p>
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    <a class="card text-center" href="<?php echo base_url() ?>users" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </h5>
                            <p class="card-text">Users</p>
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    <a class="card text-center" href="<?php echo base_url() ?>sells" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                            </h5>
                            <p class="card-text">Sells</p>
                        </div>
                    </a>
                </div>
                <div class="col text-center">
                    <a class="card text-center" href="<?php echo base_url() ?>historic" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
                            </h5>
                            <p class="card-text">Historic</p>
                        </div>
                    </a>
                </div>
            </div>

        <?php
        } else {
        ?>

            <h1 class="h2">Today's Deals</h1>
            <hr><br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">

                <?php

                if (isset($products)) {
                    foreach ($products as $product) {
                        if ($product->status == 1) {
                            echo '
                            <div class="col text-center">
                                <a href="' . str_replace(' ', '_', $product->name) . '" class="card">';
                            if ($product->discount_status == 1) {
                                echo        '
                                        <div class="promo-label">
                                            <span class="promocion">Promoción</span>
                                            <div class="discount">' . $product->discount . '%</div>
                                        </div>';
                            }
                            echo            '<img src="' . $product->image . '" class="card-img-top product-img" alt="' . strtolower(str_replace(' ', '_', $product->name)) . '_img">
                                    <div class="card-body">
                                        <span class="card-text title">' . $product->name . '</span>
                                        <span class="description">
                                            <div class="price-layer">';
                            if ($product->discount_status == 1) {
                                echo               '<div class="old">' . $product->last_price . '€</div>';
                            }
                            echo '              </div>
                                            <div class="actual">' . $product->price . '€</div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        ';
                        }
                    }
                }
                ?>
            </div>

        <?php
        }
        ?>
    </div>
</main>