<?php

//$pr_id = $data[0]->pr_id;
?>

<script>
    //pr_id = "<?php //echo $pr_id;
                ?>";
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">

        <div class="row">
            <div class="col-6">
                <h1 class="h2">Products</h1>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo base_url(); ?>products/create" role="button" class="btn btn-info">Create Product</a>
            </div>
        </div>

        <hr><br>
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="mb-3">Update all the Products</h4>
                <small class="text-muted">Select which camp would you like to update to all the products at once.</small>

                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username">
                        <span class="input-group-text">=</span>
                        <input type="text" class="form-control" placeholder="Recipient's username">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Update!</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Open Product</h4>
                <small class="text-muted">Once inside, you can modify or delete the selected product.</small>

                <div class="card-body">
                    <table id="Products" class="table table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Model</td>
                                <td>Color</td>
                                <td>Price</td>
                                <td>Last Price</td>
                                <td>Discount</td>
                                <td>Disc. Status</td>
                                <td>Status</td>
                                <td>Department</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Model</td>
                                <td>Color</td>
                                <td>Price</td>
                                <td>Last Price</td>
                                <td>Discount</td>
                                <td>Disc. Status</td>
                                <td>Status</td>
                                <td>Department</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- JS -->
<script src="<?php echo base_url(); ?>assets/js/products.js" type="text/javascript"></script>