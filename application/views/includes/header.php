<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS - Bootstrap 5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- CSS - Our's -->
    <link href="<?php echo base_url(); ?>assets/css/header.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/hideArrowsInputNumber.css" rel="stylesheet" type="text/css" />

    <!-- CSS - DATATABLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css" />

    <!-- CSS - DATATABLES - SEARCH_BUILDER -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables-searchbuilder/css/searchBuilder.bootstrap5.min.css" /> <!-- EN LA WEB NO ESTÀ! actualment s'està utilitzant el de BT4! -->

    <!-- CSS - DATATABLES - RESPONSIVE -->
    <!-- EN LA WEB NO ESTÀ! -->
    
    <!-- CSS - DATATABLES - BUTTONS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap5.min.css" />

    <!-- JS - JQUERY -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js" type="text/javascript"></script>

    <!-- JS - BASE_URL -->
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <title><?php echo $headerInfo['pageTitle']; ?></title>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?php echo base_url() ?>">My Store</a>
        

        <?php
        if ($this->session->userdata('fk_role_id') == FALSE || ($this->session->userdata('fk_role_id') == TRUE && ROLE_ADMIN != $this->session->userdata('fk_role_id')))
		{
        ?>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search ..." aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                        My Chart
                    </a>
                </li>
            </ul>
        <?php
        }
        ?>
        
        <?php 
        if(!$this->session->userdata('name'))
        {
        ?>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?php echo base_url() ?>login">
                        Login
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?php echo base_url() ?>register">
                        Sign Up
                    </a>
                </li>
            </ul>
        <?php
        }
        else
        {
        ?>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        echo 'Hello, '.$headerInfo['name'].'!';
                    ?>                    
                </a>

                <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="dropdownMenuLink" style="left: -65px;top: 50px;">
                    <a class="dropdown-item" href="<?php echo base_url() ?>profile" type="button">Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url() ?>logout" type="button">Sign Out</a>
                </div>
            </li>
        </ul>

        <?php
        }
        ?>
    </header>

    <div class="container-fluid mt-5">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <?php 
                    if(isset($headerInfo['nav_links']))
                    {
                        foreach ($headerInfo['nav_links'] as $id => $links)
                        {
                            if ($id == 0)
                            {
                            ?>
                                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                    <span><?php echo $links; ?></span>
                                </h6>
                                <ul class="nav flex-column mb-2">
                            <?php
                            }
                            else
                            {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#<?php echo $links; ?>">
                                        <?php echo $links; ?>
                                    </a>
                                </li>
                            <?php
                            }
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </nav>