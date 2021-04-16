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
                <h1 class="h2">Departments</h1>
            </div>
        </div>

        <hr><br>

        <div class="row mb-4">
            <h4 class="mb-3">Create</h4>
            <form method="POST" action="<?php echo base_url(); ?>departments/store">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 text-end">
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Department Name" autocomplete="off">
                                </div>
                                <div class="col-2 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" checked value="1">
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="submit" class="btn btn-info">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mb-4">
            <h4 class="mb-3">Update</h4>
            
            <form method="POST" action="<?php echo base_url(); ?>departments/update">
                <div class="row">
                    <div class="col-4">
                        <div class="card-body">
                            <select name="id" id="id"  style="width:100%" class="form-select">
                                <?php
                                    if (!empty($departments)) {
                                        foreach ($departments as $department) {
                                    ?>
                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name ?></option>
                                    <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 text-end">
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="New Department Name" autocomplete="off">
                                </div>
                                <div class="col-2 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status" checked value="1">
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mb-4">
            <h4 class="mb-3">Search <button type="button" class="btn btn-secondary" onclick="insertButtons('Departments')">Buttons</button></h4>
            <div class="col-12">
                <div class="card-body">
                    <div id="table_btn" class="my-3"></div>
                    <table id="Departments" class="table table-hover table-striped dataTable">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Status</td>
                                <td>Options</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Status</td>
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
<script src="<?php echo base_url(); ?>assets/js/departments.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/insertButtons.js" type="text/javascript"></script>