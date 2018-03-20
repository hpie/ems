<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
        <base href="<?php echo $base_url; ?>" />

        <title><?php echo $page_title; ?></title>

        <?php
        foreach ($meta_data as $name => $content) {
            if (!empty($content))
                echo "<meta name='$name' content='$content'>" . PHP_EOL;
        }

        foreach ($stylesheets as $media => $files) {
            foreach ($files as $file) {
                $url = starts_with($file, 'http') ? $file : base_url($file);
                echo "<link href='$url' rel='stylesheet' media='$media'>" . PHP_EOL;
            }
        }

        foreach ($scripts['head'] as $file) {
            $url = starts_with($file, 'http') ? $file : base_url($file);
            echo "<script src='$url'></script>" . PHP_EOL;
        }
        ?>
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css" media="all" />-->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" media="all" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all" />
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ui.theme.css" type="text/css" media="all" />-->
        <!--<link type="text/css" href="<?php echo base_url() ?>assets/css/ui.jqgrid.css" rel="stylesheet" />-->
        <!--<link type="text/css" href="<?php echo base_url() ?>assets/css/jquery.searchFilter.css" rel="stylesheet" />-->
        <!--<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/grid.locale-en.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jqGrid.min.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.layout.js"></script>-->
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" type="text/css" media="all" />-->
        <!--<script src="<?php echo base_url(); ?>assets/js/datepicker.min.js" type="text/javascript"></script>-->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- SUNIL - Added for form grouping -->
        <style type="text/css">
            fieldset { 
                display: block;
                margin-left: 2px;
                margin-right: 2px;
                padding-top: 0.35em;
                padding-bottom: 0.625em;
                padding-left: 0.75em;
                padding-right: 0.75em;
                border: 2px groove;
            }
        </style>
    </head>
    <body class="<?php echo $body_class; ?>">