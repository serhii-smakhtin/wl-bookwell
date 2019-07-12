<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title>BookWell - The Ultimate Marketing Tool</title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

<header>
    <div class="content">
        <a href="<?php echo get_home_url(); ?>">
            <img src="<?php echo bookwell()->options->site_logo_url;?>" alt="">
        </a>
        <div>
            <a class="requestdemo" href="#requestdemo">REQUEST A DEMO</a>
        </div>
    </div>
</header>