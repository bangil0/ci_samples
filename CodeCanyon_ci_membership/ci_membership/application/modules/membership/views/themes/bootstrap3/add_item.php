<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
if(isset($check)) {
    foreach ($check as $key => $value) {
        echo $key . ': ' . $value . '<br />';
    }
}

if(isset($response)){

    printf("The official eBay time is: %s\n", $response->Timestamp->format('H:i (\G\M\T) \o\n l jS F Y'));
}

