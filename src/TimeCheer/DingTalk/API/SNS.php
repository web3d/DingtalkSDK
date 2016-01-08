<?php

/*
 * Created Datetime:2016-1-8 20:14:46
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 用户账号开放
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class SNS extends Base {
    const API_GET_TOKEN = '/sns/gettoken';
    
    const API_GET_PERSISTENT_CODE = '/sns/get_persistent_code';
    
    const API_GET_SNS_TOKEN = '/sns/get_sns_token';
    const API_GET_USERINFO = '/sns/getuserinfo';
    
    /**
     * 获取钉钉开放应用的ACCESS_TOKEN
     * 第三方web服务提供商取得钉钉开放应用的appid及appsecret后，可以获取开放应用的ACCESS_TOKEN
     * @param string $appid
     * @param string $appsecret
     * @return boolean|string access_token
     */
    public function getToken($appid, $appsecret) {
        $data = $this->doGet(self::API_GET_TOKEN, array('appid' => $appid, 'appsecret' => $appsecret));
        
        if ($data === false || empty($data['access_token'])) {
            return false;
        }
        
        return $data['access_token'];
    }
    
    /**
     * 获取用户授权的持久授权码
     * @link http://ddtalk.github.io/dingTalkDoc/#获取用户授权的持久授权码
     * @param string $tmpAuthCode 用户授权给钉钉开放应用的临时授权码
     * @return boolean|array array("openid" => "",  "persistent_code" => "",  "unionid" => "")
     */
    public function getPersistentCode($tmpAuthCode) {
        $data = $this->doPost(self::API_GET_PERSISTENT_CODE, array('tmp_auth_code' => $tmpAuthCode));
        
        if ($data === false) {
            return false;
        }
        
        return $data;
    }
    
    /**
     * 获取用户授权的SNS_TOKEN
     * @param string $openid
     * @param string $persistentCode
     * @return boolean|array array("sns_token" => "", "expires_in" => 7200)
     */
    public function getSNSToken($openid, $persistentCode) {
        $data = $this->doPost(self::API_GET_SNS_TOKEN, array('openid' => $openid, 'persistent_code' => $persistentCode));
        
        if ($data === false || empty($data['sns_token'])) {
            return false;
        }
        
        return $data;
    }
    
    /**
     * 获取用户授权的个人信息
     * @link http://ddtalk.github.io/dingTalkDoc/#获取用户授权的个人信息
     * @param string $snsToken
     * @return array|boolean
     */
    public function getUserInfo($snsToken) {
        $data = $this->doGet(self::API_GET_USERINFO, array('sns_token' => $snsToken));
        
        if ($data === false || empty($data['user_info'])) {
            return false;
        }
        
        //简化结构 corp_info是一个列表,一个人可能加入多家公司
        if (isset($data['corp_info'])) {
            $data['user_info']['corp_info'] = $data['corp_info'];
        }
        
        return $data['user_info'];
    }
}
