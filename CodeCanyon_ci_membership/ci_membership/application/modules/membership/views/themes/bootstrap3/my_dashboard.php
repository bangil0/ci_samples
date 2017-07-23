<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
//var_dump($this->session->userdata());
//var_dump(get_cookie('unique_token'));
//echo CI_VERSION;
//
//if (isset($response->Errors)) {
//
//    foreach ($response->Errors as $error) {
//        $err = array(
//            'svcode' => $error->SeverityCode === DTS\eBaySDK\Shopping\Enums\SeverityCodeType::C_ERROR ? 'Error' : 'Warning',
//            'shortmsg' => $error->ShortMessage,
//            'longmsg' =>$error->LongMessage
//        );
//
//        echo $err['svcode'] . '<br/>';
//        echo $err['shortmsg']. '<br/>';
//        echo $err['longmsg']. '<br/>';
//    }
//
//}
//
//
//
//if ($response->Ack !== 'Failure') {
//    printf("The official eBay time is: %s\n", $response->Timestamp->format('H:i (\G\M\T) \o\n l jS F Y'));
//}



    echo $svcode . '<br/>';
    echo $shortmsg . '<br/>';
    echo $longmsg . '<br/>';



printf("The official eBay time is: %s\n", $response->Timestamp->format('H:i (\G\M\T) \o\n l jS F Y'));
