<?php

function is_login(){
    $user = session('user_auth');
    if (empty($user)){
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

function data_auth_sign($data) {
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data);
    $code = http_build_query($data);
    $sign = sha1($code);
    return $sign;
}

function think_ucenter_md5($str, $key = 'HX_yiyuanhuanlego'){
	return '' === $str ? '' : md5(sha1($str) . $key);
}

function check_verify($code, $id = 1){
    ob_clean();
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function config_lists(){
	$data   = M('Config')->field('type,name,value')->select();
	$config = array();
	if($data && is_array($data)){
		foreach ($data as $value) {
			$config[$value['name']] = config_parse($value['type'], $value['value']);
		}
	}
	return $config;
}


function config_parse($type, $value){
	switch ($type) {
		case 3:
			$array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));
			if(strpos($value,':')){
				$value  = array();
				foreach ($array as $val) {
					list($k, $v) = explode(':', $val);
					$value[$k]   = $v;
				}
			}else{
				$value =    $array;
			}
			break;
	}
	return $value;
}

function list_to_tree($list, $pk='id', $pid = 'pid', $child = '_child', $root = 0) {
    $tree = array();
    if(is_array($list)) {
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

function tree_to_list($tree, $child = '_child', $order='id', &$list = array()){
    if(is_array($tree)) {
        $refer = array();
        foreach ($tree as $key => $value) {
            $reffer = $value;
            if(isset($reffer[$child])){
                unset($reffer[$child]);
                tree_to_list($value[$child], $child, $order, $list);
            }
            $list[] = $reffer;
        }
        $list = list_sort_by($list, $order, $sortby='asc');
    }
    return $list;
}

function time_format($time = NULL,$format='Y-m-d H:i'){
    $time = $time === NULL ? NOW_TIME : intval($time);
    return date($format, $time);
}

function url_change($model,$params,$createl=false){
	unset($params['name']);
	$reurl = U($model,$params);
	return $reurl;
}


function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
	$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$length_new = $length;
	for($i=$start; $i<$length; $i++){
		if (ord($match[0][$i]) > 0xa0){
		}else{
			$length_new++;
			$length_chi++;
		}
	}
	if($length_chi<$length){
		$length_new = $length+($length_chi/2);
	}
	$slice = join("",array_slice($match[0], $start, $length_new));
    if($suffix && $slice != $str){
		return $slice."…";
	}
    return $slice;
}

function get_cover($cover_id, $field = null){
    if(empty($cover_id)){
        return false;
    }
    $picture = M('Picture')->where(array('status'=>1))->getById($cover_id);
    if($field == 'path' && $picture){
        if(!empty($picture['url'])){
            $picture['path'] = $picture['url'];
        }else{
            $picture['path'] = __ROOT__.$picture['path'];
        }
    }
    return empty($field) ? $picture : $picture[$field];
}

function get_category_name($cid = 0){
    $info = M('Category')->field('title')->find($cid);
    if($info !== false && $info['title'] ){
        $name = $info['title'];
    } else {
        $name = '';
    }
    return $name;
}

if(!function_exists('array_column')){
    function array_column(array $input, $columnKey, $indexKey = null) {
        $result = array();
        if (null === $indexKey) {
            if (null === $columnKey) {
                $result = array_values($input);
            } else {
                foreach ($input as $row) {
                    $result[] = $row[$columnKey];
                }
            }
        } else {
            if (null === $columnKey) {
                foreach ($input as $row) {
                    $result[$row[$indexKey]] = $row;
                }
            } else {
                foreach ($input as $row) {
                    $result[$row[$indexKey]] = $row[$columnKey];
                }
            }
        }
        return $result;
    }
}

function jiang_num($num){
    $numbers = range(10000001,$num+10000001);
    shuffle($numbers);
    return implode(',',$numbers);
}

function get_shop_name($id){
    return M('Shop')->where('id='.$id)->getField('name');
}

function get_user_name($id){
	return M('User')->where('id='.$id)->getField('nickname');
}

function get_user_pic($id){
    return M('User')->where('id='.$id)->getField('headimgurl');
}

function sendMail($to, $title, $content){
    import('Com.PHPMailer.PHPMailerAutoload');
    $mail = new \PHPMailer();
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
    $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
    $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}

function dropDir($path = ''){
    if (is_file($path)) {
        unlink($path);
    } else if (is_dir($path)) {
        if (($dir = opendir($path)) !== false) {
            while (($file = readdir($dir)) !== false) {
                if ($file != '.' && $file != '..') {
                    dropDir($path . '/' . $file);
                }
            }
            rmdir($path);
        }
    }
}

function uc_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    $ckey_length = 4;
    $key = md5($key ? $key : UC_KEY);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if($operation == 'DECODE') {
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}

function xml_unserialize(&$xml, $isnormal = FALSE) {
    $xml_parser = $verify = new \Com\UCenter\XML($isnormal);
    $data = $xml_parser->parse($xml);
    $xml_parser->destruct();
    return $data;
}

function xml_serialize($arr, $htmlon = FALSE, $isnormal = FALSE, $level = 1) {
    $s = $level == 1 ? "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n" : '';
    $space = str_repeat("\t", $level);
    foreach($arr as $k => $v) {
        if(!is_array($v)) {
            $s .= $space."<item id=\"$k\">".($htmlon ? '<![CDATA[' : '').$v.($htmlon ? ']]>' : '')."</item>\r\n";
        } else {
            $s .= $space."<item id=\"$k\">\r\n".xml_serialize($v, $htmlon, $isnormal, $level + 1).$space."</item>\r\n";
        }
    }
    $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
    return $level == 1 ? $s."</root>" : $s;
}

function activity($type,$record_id = null, $user_id = null){
    $activity=M('Activity')->field('name')->where('type='.$type)->select();
    foreach((array)$activity as $value){
        activity_log($value['name'],$record_id,$user_id);
    }
}

function activity_log($activity = null,$record_id = null, $user_id = null){
    if(empty($activity) || empty($record_id)){
        return '参数不能为空';
    }
    $activity_info = M('Activity')->getByName($activity);
    if($activity_info['status'] != 1){
        return '该活动被禁用或删除';
    }

    $data['type']      =   $activity_info['type'];
    $data['activity_id']      =   $activity_info['id'];
    $data['user_id']        =   $user_id;
    $data['activity_ip']      =   ip2long(get_client_ip());
    $data['record_id']      =   $record_id;
    $data['create_time']    =   NOW_TIME;

    if(!empty($activity_info['log'])){
        if(preg_match_all('/\[(\S+?)\]/', $activity_info['log'], $match)){
            $log['user']    =   $user_id;
            $log['record']  =   $record_id;
            $log['time']    =   NOW_TIME;
            $log['data']    =   array('user'=>$user_id,'record'=>$record_id,'time'=>NOW_TIME);
            foreach ($match[1] as $value){
                $price = explode('=', $value);
                if(isset($price[1])){
                    $prices = explode('|', $price[1]);
                    if(isset($prices[1])){
                        $data[$price[0]] = call_user_func($prices[1],$log[$prices[0]]);
                    }else{
                        $data[$price[0]] = is_numeric($price[1])?$price[1]:$log[$price[1]];
                    }
                }else{
                    $param = explode('|', $value);
                    if(isset($param[1])){
                        $replace[] = call_user_func($param[1],$log[$param[0]]);
                    }else{
                        $replace[] = $log[$param[0]];
                    }
                }
            }
            $data['remark'] =   str_replace($match[0], $replace, $activity_info['log']);
        }else{
            $data['remark'] =   $activity_info['log'];
        }
    }else{
        $data['remark']     =   '操作url：'.$_SERVER['REQUEST_URI'];
    }

    if(!empty($activity_info['rule']) && $activity_info['end_time']>=NOW_TIME){
        $rules = parse_activity($activity, $user_id,$record_id);
        $res = execute_activity($rules, $activity_info['id'], $user_id);
        if($res){
             M('ActivityLog')->add($data);
        }
    }
}


function parse_activity($activity = null,$self,$relf){
    if(empty($activity)){
        return false;
    }
    if(is_numeric($activity)){
        $map = array('id'=>$activity);
    }else{
        $map = array('name'=>$activity);
    }

    $info = M('Activity')->where($map)->find();
    if(!$info || $info['status'] != 1){
        return false;
    }

    $rules = $info['rule'];
    $rules = str_replace(array('{$self}','{$relf}'), array($self,$relf), $rules);
    $rules = explode(';', $rules);
    $return = array();
    foreach ($rules as $key=>&$rule){
        $rule = explode('|', $rule);
        foreach ($rule as $k=>$fields){
            $field = empty($fields) ? array() : explode(':', $fields);
            if(!empty($field)){
                $return[$key][$field[0]] = $field[1];
            }
        }
        if(!array_key_exists('cycle', $return[$key]) || !array_key_exists('max', $return[$key])){
            unset($return[$key]['cycle'],$return[$key]['max']);
        }
    }
    return $return;
}

function execute_activity($rules = false, $activity_id = null, $user_id = null){
    if(!$rules || empty($activity_id) || empty($user_id)){
        return false;
    }

    $return = true;
    foreach ($rules as $rule){
        $map = array('activity_id'=>$activity_id, 'user_id'=>$user_id);
        if($rule['ip']){
            $map['activity_ip'] = ip2long(get_client_ip());
        }
        $map['create_time'] = array('gt', NOW_TIME - intval($rule['cycle']) * 3600);
        $exec_count = M('ActivityLog')->where($map)->count();
        if($exec_count >= $rule['max']){
            $return = false;
            continue;
        }
        $Model = M(ucfirst($rule['table']));
        $field = $rule['field'];
        $res = $Model->where($rule['condition'])->setField($field, array('exp', $rule['rule']));
        if(!$res){
            $return = false;
        }
    }
    return $return;
}

function activity_mod($price){
    return floor($price/100)*5;
}

function union_price($price,$buy_price,$num){
    return (float)substr(sprintf("%.3f",($price-$buy_price)*($num/$price)/2),0,-1);
}