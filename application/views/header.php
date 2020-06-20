<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $PAGE_TITLE; ?></title>
<!-- Stylesheet -->
<link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/fonts/fonts.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/jquery.bxslider.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.jqChart.css" />
<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/responsive.css" rel="stylesheet">
<!--<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>public/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.jqChart.min.js" type="text/javascript"></script>
<!-- link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" -->
<!-- Stylesheet -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement('style')
  msViewportStyle.appendChild(
    document.createTextNode(
      '@-ms-viewport{width:auto!important}'
    )
  )
  document.querySelector('head').appendChild(msViewportStyle)
}
</script>

</head>
<body>
<script>var base_url = "<?php echo base_url(); ?>";</script>