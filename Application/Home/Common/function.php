<?php

function get_url(){
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

function is_weixin(){
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false  || strpos($_SERVER['HTTP_USER_AGENT'], 'MiniQB') !== false ) {
		return true;
	}	
	return false;
}

function get_recharge($type) {
    switch ($type){
        case 1  : return    '余额';     break;
        case 2  : return    '微信';     break;
        case 3  : return    '支付宝';     break;
        case 4  : return    '网银';     break;
        default : return    false;      break;
    }
}
?>