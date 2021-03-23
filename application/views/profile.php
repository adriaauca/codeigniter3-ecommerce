<?php

//$pr_id = $data[0]->pr_id;
?>

<script>
    //pr_id = "<?php //echo $pr_id;
                ?>";
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h1 class="h2" id="My Profile">My Profile</h1>
        <hr>

        <div id="Update Profile">
            <br><br>
            <h4>Update Profile</h4>
            <form method="POST" action="<?php echo base_url(); ?>profile/edit" class="mt-3">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $user->name; ?>">
                        <span class="text-danger">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <div class="col">

                        <label for="email" class="form-label">Email</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>" placeholder="Email">
                        </div>
                        <span class="text-danger">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <div class="col">
                        <label for="role_name" class="form-label">Role</label>
                        <input type="text" class="form-control" id="role_name" value="<?php echo $user->role_name; ?>" disabled>
                        <span class="text-danger">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <div class="col">

                        <label for="password" class="form-label">New Password</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="emoji_password">🔒</span>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <span class="text-danger">
                            <?php echo form_error('password'); ?>
                        </span>
                    </div>

                    <div class="col">

                        <label for="confirm_password" class="form-label">Confirm New Password</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="emoji_password">🔒</span>
                            </div>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <span class="text-danger">
                            <?php echo form_error('password'); ?>
                        </span>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="Directions">
            <br><br>
            <h4>Directions</h4>
        </div>

        
        <div id="Pay Methods">
            <br><br>
            <h4>Pay Methods</h4>
            <form method="POST" action="<?php echo base_url(); ?>profile/edit" class="mt-3">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">

                    <div class="col">

                        <label for="nameOnCard" class="form-label">Name on Card</label>
                        <input type="text" class="form-control" name="nameOnCard" value="<?php if (isset($userCard)) {echo $userCard->nameOnCard;} ?>">
                        <span class="text-danger">
                            <?php echo form_error('nameOnCard'); ?>
                        </span>
                    </div>

                    <div class="col">

                        <label for="cardNumber" class="form-label">Credit Card Number</label>
                        <input type="number" class="form-control" name="cardNumber" value="<?php if (isset($userCard)) {echo $userCard->cardNumber;} ?>">
                        <span class="text-danger">
                            <?php echo form_error('cardNumber'); ?>
                        </span>
                    </div>

                    <div class="col">
                        <label for="expiration" class="form-label">Expiration</label>
                        <input type="date" class="form-control" id="expiration" value="<?php if (isset($userCard)) {echo $userCard->expiration;} ?>">
                        <span class="text-danger">
                            <?php echo form_error('expiration'); ?>
                        </span>
                    </div>

                    <div class="col">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="number" class="form-control" id="cvv" value="<?php if (isset($userCard)) {echo $userCard->cvv;} ?>">
                        <span class="text-danger">
                            <?php echo form_error('cvv'); ?>
                        </span>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="Order History">
            <br><br>
            <h4>Order History</h4>

            <style>
                .order_history_card
                {
                    flex-direction: row;
                }
                .order_history_card img {
                    width: 30%;
                }
            </style>

            <div class="mt-3 mb-5">
                <div class="card mt-3">
                    <div class="card-header" style="background-color: #e3e3e3;">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <b>Nº 4213441413 </b> | 12/02/2021
                                <br>C/ Jovara nº68 1-2, 08370 Calella, Barcelona, Spain
                            </div>
                            <div class="col-6 text-end">
                                Total: 1298.98€
                                <br>[2 un.]
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card order_history_card w-100" style="width: 18rem;">
                            <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750391/Ecommerce/hp-17-x061nr-white-background.jpg" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        Product 01
                                    </div>
                                    <div class="col-6 text-end">
                                        699.99€
                                        <br>[1 un.]
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card order_history_card w-100" style="width: 18rem;">
                            <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750391/Ecommerce/hp-17-x061nr-white-background.jpg" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        Product 02
                                    </div>
                                    <div class="col-6 text-end">
                                        599.99€
                                        <br>[1 un.]
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header" style="background-color: #e3e3e3;">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <b>Nº 765745745</b> | 01/02/2021
                                <br>C/ Jovara nº68 1-2, 08370 Calella, Barcelona, Spain
                            </div>
                            <div class="col-6 text-end">
                                Total: 558.98€
                                <br>[1 un.]
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card order_history_card w-100" style="width: 18rem;">
                            <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750391/Ecommerce/hp-17-x061nr-white-background.jpg" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        Product 01
                                    </div>
                                    <div class="col-6 text-end">
                                        558.98€
                                        <br>[1 un.]
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>