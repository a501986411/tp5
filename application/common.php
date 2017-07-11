<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Route;
// admin子域名绑定到admin模块
Route::domain('admin','admin');
Route::domain('tp5.com','admin');
function enDateToCn($date)
{
    $en = ['january','february','march','april',
           'may','june','july','august','September',
           'october','november','December'];
    $cn = ['01','02','03','04','05','06','07','08','09','10','11','12'];
    return str_replace($en,$cn,$date);
}
/**
 * 数据调试
 * @param array $data 数据
 * @param string $pattern 输出类型
 * @return void
 */
function debug($data)
{
    if (config('APP_DEBUG')) {
        echo '<pre>' . PHP_EOL;
        echo '[type] ' . gettype($data) . PHP_EOL;
        echo '[data] ';
        print_r($data);
        exit;
    }
}

/**
 * xml格式转数组
 * @access public
 * @param $xml
 * @return mixed
 * @author knight
 */
function xml2Array($xml)
{
    $obj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
    $arr = json_decode(json_encode($obj),true);
    return $arr;
}

/**
 * 数组转xml格式
 * @access public
 * @param $arr
 * @param int $dom
 * @param int $item
 * @return string
 * @author knight
 */
function array2xml($arr, $dom = 0, $item = 0)
{
    if (!$dom) {
        $dom = new DOMDocument("1.0");
    }
    if (!$item) {
        $item = $dom->createElement("root");
        $dom->appendChild($item);
    }
    foreach ($arr as $key => $val) {
        $itemx = $dom->createElement(is_string($key) ? $key : "item");
        $item->appendChild($itemx);
        if (!is_array($val)) {
            $text = $dom->createTextNode($val);
            $itemx->appendChild($text);

        } else {
            arrayToXml($val, $dom, $itemx);
        }
    }
    return $dom->saveXML();
}