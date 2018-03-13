<?php
if($_REQUEST['step']==1){
    file_put_contents($_SERVER["DOCUMENT_ROOT"].'/ajax/log_player/log_'.$_REQUEST['name'].'.txt', print_r($_REQUEST, true).PHP_EOL.'end of step 1'.PHP_EOL);
}else{
    $srtLog=file_get_contents($_SERVER["DOCUMENT_ROOT"].'/ajax/log_player/log_'.$_REQUEST['name'].'.txt');
    file_put_contents($_SERVER["DOCUMENT_ROOT"].'/ajax/log_player/log_'.$_REQUEST['name'].'.txt', $srtLog.print_r($_REQUEST, true));
}
