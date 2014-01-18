<!DOCTYPE html>
<html>
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
        
	<title><?php echo @$title; ?></title>
	
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>scripts/plugins/bootstrap/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>scripts/plugins/bootstrap/css/bootstrap-theme.min.css" />
        <?php echo @render_css("head");?>
        
        <script type="text/javascript"> var baseUrl = "<?php echo base_url().index_page();?>";</script>
        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/lib/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/lib/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/lib/additional-methods.min.js"></script>
        
        <?php echo @render_js("head");?>
  </head>
  <body>
        <?php echo @$content; ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/plugins/bootstrap/js/bootstrap.min.js"></script>
        <?php echo @render_js("body"); ?>
  </body>
</html>