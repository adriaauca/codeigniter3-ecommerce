<?php

    if (isset($product))
    {
        $max_quantity = $product->quantity;
    }
?>

<script>
    <?php

        if (isset($product))
        {
        ?>
            max_quantity = "<?php echo $max_quantity;?>";
        <?php
        }
    ?>
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="Information">
    
    <div class="container">

        <?php
            if (!isset($product))
            {
            ?>
                <form method="POST" action="<?php echo base_url(); ?>products/store">
            <?php
            }
            else{
                echo '<br><br>';
            }
        ?>

        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 g-3">

            <?php
                if (isset($product))
                {
                ?>
                    <div class="col my-auto">

                        <div id="carouselExampleFade" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>

                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <img class="w-100" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571750967/Ecommerce/ef192a21ec96.jpg"  alt="...">
                                </div>

                                <div class="carousel-item">
                                    <img class="w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                                </div>

                                <div class="carousel-item">
                                    <img class="w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" alt="Sample">
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">

                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">

                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                <?php
                }
                else
                {
                ?>
                    <div class="col my-auto">
                        <div class="form-group">
                            <label for="image">Select the product image</label>
                            <input type="file" class="form-control-file" id="image">
                        </div>
                        <span class="text-danger">
                            <?php echo form_error('image'); ?>
                        </span>
                    </div>
                <?php
                }
            ?>

            <div class="col">
                <h4>
                    <?php
                        if (isset($product))
                        {
                            echo $product->name;
                        }
                        else
                        {
                            echo '<input class="form-control form-control-sm" type="text" name="name" placeholder="Name"><span class="text-danger">'.form_error('email').'</span>';
                        }
                    ?>
                </h4>
                <p class="mb-2 text-muted text-uppercase small">
                    <?php
                        if (isset($department))
                        {
                            echo $department;
                        }
                        else
                        {
                        ?>
                            <select class="custom-select form-control form-control-sm" name="fk_department_id">
                                <?php
                                    foreach ($all_departments as $department)
                                    {
                                        echo '<option value="'.$department->id.'">'.$department->name.'</option>';
                                    }
                                ?>
                            </select>
                            <span class="text-danger">
                                <?php echo form_error('fk_department_id'); ?>
                            </span>
                        <?php
                        }
                    ?>
                </p>

                <?php
                    if (isset($product))
                    {
                        if ($product->discount_status == 1)
                        {
                            echo '<p><span class="promocion">Promoción</span></p>';
                        }
                    }
                ?>

                <?php
                    if (isset($product))
                    {
                    ?>
                        <div class="my-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                <path d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                            </svg>
                        </div>
                    <?php
                    }
                ?>

                <div class="row my-3">
                    <div class="col-12">
                        <span class="description">
                            <div class="price-layer">

                                <?php
                                    if (isset($product))
                                    {
                                        if ($product->discount_status == 1)
                                        {
                                ?>
                                            <div class="old" style="margin-top: 6px;"><?php echo $product->last_price; ?>€</div>
                                            <div class="discount"><?php echo $product->discount; ?>%</div>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="status" checked>
                                            <label class="form-check-label" for="status">Status</label>
                                        </div>
                                        <br>
                                    <?php
                                    }
                                ?>
                            </div>
                            
                            <div class="actual">

                                <?php
                                    if (isset($product))
                                    {
                                        echo $product->price.'€';
                                    }
                                    else
                                    {
                                    ?>
                                        <div class="input-group">
                                            <input class="form-control form-control-sm" type="text" name="price">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                ?>
                            </div>
                        </span>
                    </div>

                    <?php
                        if (!isset($product))
                        {
                        ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-danger">
                                            <?php echo form_error('status'); ?>
                                        </span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="text-danger">
                                            <?php echo form_error('price'); ?>
                                        </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                        <?php
                        }
                    ?>
                </div>

                <div class="row my-3">
                    <div class="col-12">
                        <?php
                            if (isset($product))
                            {
                                echo $product->description;
                            }
                            else
                            {
                                echo '<textarea class="form-control form-control-sm" name="description" placeholder="Description"></textarea><span class="text-danger">'.form_error("description").'</span>';
                            }
                        ?>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4">
                        <strong>Model</strong>
                    </div>
                    <div class="col-8">
                        <?php
                            if (isset($product))
                            {
                                echo $product->model;
                            }
                            else
                            {
                                echo '<input class="form-control form-control-sm" type="text" name="model"><span class="text-danger">'.form_error("model").'</span>';
                            }
                        ?>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4">
                        <strong>Color</strong>
                    </div>
                    <div class="col-8">
                        <?php
                            if (isset($product))
                            {
                                echo $product->color;
                            }
                            else
                            {
                                echo '<input class="form-control form-control-sm" type="text" name="color"><span class="text-danger">'.form_error("color").'</span>';
                            }
                        ?>
                    </div>
                </div>

                <hr>

                <div class="row my-3">
                    <div class="col-4">
                        <?php
                            if (isset($product))
                            {
                            ?>
                                Quantity
                                <br>
                                <span id="max_quantity">[Max. <?php echo $max_quantity; ?>]</span>
                            <?php
                            }
                            else
                            {
                                echo 'Quantity';
                            }
                        ?>
                    </div>
                    <div class="col-4">
                        <?php
                            if (isset($product))
                            {
                            ?>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" id="minus">-</button>
                                    </div>
                                    <input class="form-control" type="number" id="quantity" name="quantity" value="1" max="<?php echo $max_quantity; ?>" style="text-align:center;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" id="plus">+</button>
                                    </div>
                                </div>
                            <?php
                            }
                            else
                            {
                                echo '<input class="form-control form-control-sm" type="number" name="quantity"><span class="text-danger">'.form_error("quantity").'</span>';
                            }
                        ?>
                        
                    </div>
                </div>

                <div class="text-end">
                    <?php
                        if (isset($product))
                        {
                        ?>
                            <button type="button" class="btn btn-light border border-dark btn-md mr-1 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                                Add to cart
                            </button>
                        <?php
                        }
                        else
                        {
                        ?>
                            <button type="submit" class="btn btn-primary">Save & Create</button>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="row mt-5" id="Details">

            <div class="col-12">
                <br><br>
                <h4>Product Details</h4>
            </div>
        </div>
        <div class="row p-3">
            <?php
                if (isset($product))
                {
                    echo $product->details;
                }
                else
                {
                    echo '<textarea class="form-control form-control-lg" name="details" placeholder="Details"></textarea><span class="text-danger">'.form_error("details").'</span>';
                }
            ?>
        </div>

        <?php
            if (!isset($product))
            {
            ?>
                </form>
            <?php
            }
        ?>

        <?php
            if (isset($product))
            {
            ?>
                <div class="row mt-5" id="Related Products">
                    <div class="col-12">
                    <br><br>
                        <h4>Related Products</h4>
                    </div>
                </div>

                <div class="row text-center p-3">

                    <div class="col-md-6 col-lg-3">

                        <div class="">

                            <div class="">
                                <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                            </div>

                            <div class="pt-4">

                                <h5>Fantasy T-shirt</h5>
                                <h6>12.99 $</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">

                        <div class="">

                            <div class="">
                                <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                            </div>

                            <div class="pt-4">

                                <h5>Fantasy T-shirt</h5>
                                <h6>12.99 $</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">

                        <div class="">

                            <div class="">
                                <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                            </div>

                            <div class="pt-4">

                                <h5>Fantasy T-shirt</h5>
                                <h6>12.99 $</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">

                        <div class="">

                            <div class="">
                                <img class="img-fluid w-100" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" alt="Sample">
                            </div>

                            <div class="pt-4">

                                <h5>Fantasy T-shirt</h5>
                                <h6>12.99 $</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5" id="Comments">
                    <div class="col-12">
                        <br><br>
                        <h4>Comments</h4>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="d-flex flex-row align-items-center">
                                    <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="rounded-circle mr-2">
                                    <span class="mx-3">
                                        <small class="fw-bold text-primary">james_olesenn</small>
                                    </span>
                                </div>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                <div class="px-4">
                                    Very good laptop quality price
                                </div>
                            </div>
                            <p class="text-end"><small>2 days ago</small></p>
                        </div>
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="d-flex flex-row align-items-center">
                                    <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="rounded-circle mr-2">
                                    <span class="mx-3">
                                        <small class="fw-bold text-primary">olan_sams</small>
                                    </span>
                                </div>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2 align-items-center">
                                <div class="px-4">
                                    Normal laptop, it could be much better
                                </div>
                            </div>
                            <p class="text-end"><small>3 days ago</small></p>
                        </div>

                        <div class="card p-3">
                            <div class="row">

                                <div class="col-12">
                                    <h6>Add a review</h6>
                                </div>

                                <div class="col-12 mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                </div>

                                <div class="col-12 mt-4">
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Your review"></textarea>
                                </div>

                                <div class="col-12 mt-4 text-end">
                                    <button type="button" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        ?>
    </div>
</main>

<?php
    if (isset($product))
    {
    ?>
        <script src="<?php echo base_url(); ?>assets/js/addDeleteQuantityInputNumber.js" type="text/javascript"></script>
    <?php
    }
?>