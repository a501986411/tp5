<?php
	/**
	 *微信消息基类
	 * User: knight
	 * Date: 2017/7/10
	 * Time: 14:53
	 */

	namespace app\index\controller;
	use think\Controller;
	class WxMessageCommon
	{
		protected $MsgType = ['text'];//微信用户发送消息类型

		public function __construct()
		{
//			$this->wxToken();
		}
		//微信连接认证
		protected  function wxToken()
		{
			$get = $_GET;
			$signature = $get['signature'];//微信加密前面
			$timestamp = $get['timestamp'];//时间戳
			$nonce = $get['nonce'];//随机数
			$echostr = $get['echostr'];//随机字符串
			$token = 'chen';
			$arr = [$nonce,$timestamp,$token];
			sort($arr);
			$str = sha1(implode($arr));
			if($str ==$signature && $echostr){
				echo $echostr;
				exit;
			}
		}
	}