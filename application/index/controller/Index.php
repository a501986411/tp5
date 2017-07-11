<?php
namespace app\index\controller;
use think\Log;
class Index extends WxMessageCommon
{
    public function index()
    {
        $data = $GLOBALS['HTTP_RAW_POST_DATA'];
        $data = xml2Array($data);
        $retStr = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%d</CreateTime>
        <MsgType><![CDATA[%s]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        </xml>";
    $ret = sprintf($retStr,$data['FromUserName'],$data['ToUserName'],time(),$data['MsgType'],$data['Content']);
        return $ret;
    }
    public function createIndex()
    {
        return view();
    }

}
