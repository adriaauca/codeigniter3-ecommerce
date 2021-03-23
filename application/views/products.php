<?php

//$pr_id = $data[0]->pr_id;
?>

<script>
    //pr_id = "<?php //echo $pr_id;
                ?>";
</script>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">

        <h1 class="h2">Products</h1>
        <hr><br>
        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Create Product</h4>

                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Open Product</h4>
                <small class="text-muted">Once inside, you can modify it.</small>

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