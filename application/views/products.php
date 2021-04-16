<?php

//$pr_id = $data[0]->pr_id;
?>

<script>
    //pr_id = "<?php //echo $pr_id;
                ?>";
</script>

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
    <div class="container">

        <?php include 'flashdata.php';?>
        
        <div class="row">
            <div class="col-6">
                <h1 class="h2">Products</h1>
            </div>
            <div class="col-6 text-end">
                <a href="<?php echo base_url(); ?>products/create" role="button" class="btn btn-info">Create</a>
            </div>
        </div>

        <hr><br>
        

        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Search <button type="button" class="btn btn-secondary" onclick="insertButtons('Products')">Buttons</button></h4>

                <div class="card-body">
                    <div id="table_btn" class="my-3"></div>
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
                                <td>Options</td>
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
                                <td>Options</td>
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
<script src="<?php echo base_url(); ?>assets/js/insertButtons.js" type="text/javascript"></script>