<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mia's Web Store | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mia's Web Store</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url();?>" target="_blank">View Site</a></li>
			<li><a href="<?php echo base_url();?>admin/authenticate/logout">Logout</a></li>
          </ul>
          <?php $attributes = array('class' => 'navbar-form navbar-right'); ?>
          <?php echo form_open('admin/products/index', $attributes); ?>
          	<?php 
            	$data = array(
            		'name'        => 'keywords',
            		'class'       => 'form-control',
            		'placeholder' => 'Search Products...'
            	);
            
            	echo form_input($data);
            ?>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">