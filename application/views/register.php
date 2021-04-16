<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Store</title>
  </head>
  <body>

    <div class="container mt-5 mb-5">

        <?php include 'flashdata.php';?>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">

                    <h5 class="mt-3">Register</h5>
                    <form method="POST" action="<?php echo base_url(); ?>register/store">

                        <div class="mb-3">
                            <label for="name" class="form-label">Your name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value("name"); ?>" >
                            <span class="text-danger">
                                <?php echo form_error('name'); ?>
                            </span>
                        </div>

                        <div class="mb-3">

                            <label for="email" class="form-label">Your email</label>
                            
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" class="form-control" name="email" value="<?php echo set_value("email"); ?>" placeholder="Email">
                            </div>
                            <span class="text-danger">
                                <?php echo form_error('email'); ?>
                            </span>
                        </div>

                        <div class="mb-3">

                            <label for="password" class="form-label">Enter a Password</label>

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

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/seePassword.js" type="text/javascript"></script>
  </body>
</html>
