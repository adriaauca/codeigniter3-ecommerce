
<?php
    // STATUS
    $error = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');
    $success = $this->session->flashdata('success');

    if ($error)
    {
    ?>
    <div class="row">
        <div class="alert alert-danger alert-dismissible fade show col-md-12 my-4" role="alert">
            <?php echo $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php 
    }

    if ($warning)
    {
    ?>
    <div class="row">
        <div class="alert alert-warning alert-dismissible fade show col-md-12 my-4" role="alert">
            <?php echo $warning; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php
    }
    
    if ($success)
    {
    ?>
    <div class="row">
        <div class="alert alert-success alert-dismissible fade show col-md-12 my-4" role="alert">
            <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php
    }
?>
