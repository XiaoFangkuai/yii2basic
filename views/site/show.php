<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-8-24
 * Time: 9:53
 */

/*$message = array_merge($message, ['pineapple']);
$message = array_reverse($message);*/
foreach ($message as $value){
    echo "Value:".$value."\t";
}
if(isset($param)) {
    echo "<br> $param";
}
