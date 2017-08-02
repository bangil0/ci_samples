<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php print Settings_model::$db_config['site_title']; ?>: <?php print $template['title']; ?></title>
	<?php print $template['metadata']; ?>

	<!-- Stylesheet -->
    <link href="<?php print base_url(); ?>assets/css/adminpanel/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Stylesheet -->
    <link href="<?php print base_url(); ?>assets/css/adminpanel/custom.css" rel="stylesheet">



    <!-- Google web font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php print base_url(); ?>assets/js/vendor/jquery-2.2.1.min.js">\x3C/script>')</script>


    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php print base_url(); ?><?php print base_url(); ?>assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php print base_url(); ?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php print base_url(); ?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php print base_url(); ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php print base_url(); ?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php print base_url(); ?>assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php print base_url(); ?>assets/img/favicon/amanifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php print base_url(); ?>assets/img/favicon/ams-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="preload">
<div class="wrap header-fixed">


    <?php print $template['partials']['header']; ?>


    <?php $this->load->view('themes/'. Settings_model::$db_config['adminpanel_theme'] .'/partials/aside.php'); ?>

    <aside id="extramenu" class="extramenu right pd-15">

        <h4>
            <strong>The state of this panel is remembered with localStorage. You can disable this in our JavaScript file.</strong>
        </h4>

        <p>
            Refresh the page and you will notice that the panel stays open. The same goes for the main side menu opposite to this menu.
        </p>

        <p>
            What should I put here? A chat system, quick navigation, tools or maybe profile info? Something will be added in future versions.
        </p>

        <p>
            In the meantime if you have any ideas you are most welcome to post them on <a href="http://codecanyon.net/user/rakinjakk"><em>my profile page on Codecanyon</em></a>.
        </p>

    </aside>

    <div class="content">

        <?php print $template['body']; ?>

    </div>


    <footer class="footer">
        <?php print $template['partials']['footer']; ?>

    </footer>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
    <script src="<?php print base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php print base_url(); ?>assets/js/vendor/jquery.navgoco.js"></script>
    <script src="<?php print base_url(); ?>assets/js/vendor/jquery.slimscroll.min.js"></script>
    <script src="<?php print base_url(); ?>assets/js/vendor/bootbox.min.js"></script>
    <?php print $template['js']; ?>
    <?php $this->load->view('generic/js_system'); ?>
    <script src="<?php print base_url(); ?>assets/js/app.js"></script>

<!-- Custom JavaScript
================================================== -->
    <script src="<?php print base_url(); ?>assets/js/custom.js"></script>



</body>
</html>