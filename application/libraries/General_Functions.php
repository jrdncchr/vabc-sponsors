<?php
/**
 * Created by PhpStorm.
 * User: danero
 * Date: 3/16/16
 * Time: 9:51 AM
 */

class General_Functions {

    function generate_random_str($length = 10, $uppercase = false) {
        if($uppercase) {
            return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        } else {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }
    }

} 