<?php
error_reporting(0); //Setting this to E_ALL showed that that cause of not redirecting were few blank lines added in some php files.

error_reporting(~0);
ini_set('display_errors', 1);


$db_config_path = '../application/config/database.php';


// Only load the classes in case the user submitted the form
if($_POST) {

    // Load the classes and create the new objects
    require_once('Install_Core.php');
    require_once('Install_Database.php');
    $core = new Install_Core();
    $database = new Install_Database();


    // Validate the post data
    if($core->validate_post($_POST) == true)
    {

        if ($database->create_tables($_POST) == false)
        {
            $message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
        }
        else if ($core->write_config($_POST) == false)
        {
            $message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
        }

        // If no errors, redirect to registration page
        if(!isset($message)) {
            @chmod($db_config_path, 0644);
            $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
            $redir .= "://" . $_SERVER['HTTP_HOST'];
            $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
            $redir = str_replace('installer/', '', $redir);
            header( 'Location: ' . $redir . 'utils/install' ) ;
        }
    }
    else {
        $message = $core->show_message('error','Not all fields have been filled in correctly. The host, username, password, and database name are required.');
    }

    @chmod($db_config_path, 0644);
}


@chmod($db_config_path, 0777);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CI Membership installer</title>
    <link href="../assets/css/adminpanel/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1 class="text-center">CI Membership Installer</h1>
<?php






if(is_writable($db_config_path)){?>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">

            <?php if(isset($message)) {echo '<p class="alert alert-danger mg-t-10">' . $message . '</p>';}?>

            <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend>Database settings</legend>

                    <div class="form-group">
                        <label for="hostname">Hostname</label>
                        <input type="text" id="hostname" value="localhost" class="form-control" name="hostname">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="database">Database Name</label>
                        <input type="text" id="database" class="form-control" name="database">
                    </div>

                    <div class="form-group">
                        <label for="database">Database Port</label>
                        <input type="text" id="dbport" class="form-control" name="dbport">
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary f900"><i class="fa fa-check pd-r-5"></i> Install database</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>


<?php } else { ?>
    <p class="error">
        It seems chmod did not work, please make sure PHP has the ability to perform this action on your server.<br>
        <code>http://php.net/manual/en/function.chmod.php</code><br><br>
        You can also make application/config/database.php writable by hand and put it back to 0644 after installing.
    </p>
<?php } ?>
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script>window.jQuery || document.write('<script src="http://brunomatthys.com/dev/cim3/assets/js/vendor/jquery-2.2.1.min.js">\x3C/script>')</script>
<script src="../assets/js/app.js"></script>
</body>
</html>