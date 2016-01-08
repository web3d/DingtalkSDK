<?php

/*
 * 钉钉服务器端API封装
 * Created Datetime:2016-1-8 16:12:19
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

use TimeCheer\DingTalk\Client as HttpClient;

/**
 * API访问基类
 * 
 * 定义api的地址前缀\封装通用访问方法等
 * @link http://ddtalk.github.io/dingTalkDoc/
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Base {

    /**
     *
     * @var string api地址
     */
    protected $apiPrefix = 'https://oapi.dingtalk.com';
    
    /**
     *
     * @var string $accessToken
     */
    protected $accessToken;
    
    protected $errorCode;
    
    protected $errorMsg;
    
    const CODE_SUCC = 0;
    const CODE_NET_FAIL = -10000;

    /**
     * 
     * @param string $accessToken
     */
    public function __construct($accessToken) {
        $this->setToken($accessToken);
    }
    
    /**
     * 设置access_token
     * @param string $accessToken
     */
    public function setToken($accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * 发起get请求
     * @param string $api 具体api端uri
     * @param array $params get请求需带的参数,不包括access_token
     * @return mixed|array|bool ===false为失败
     */
    public function doGet($api, $params = array()) {
        $response = HttpClient::get($this->buildUrl($api, $params))->send();
        
        return $this->filterResult($response->body);
    }

    /**
     * 发起post请求
     * @param string $api
     * @param array $data
     * @param array $params
     * @return mixed|array|bool ===false为失败
     */
    public function doPost($api, $data, $params = array()) {
        $response = HttpClient::post($this->buildUrl($api, $params))
                ->sendsJson()
                ->body($data)
                ->send();
        
        return $this->filterResult($response->body);
    }
    
    /**
     * 对返回结果做过滤处理
     * @param mixed $data
     * @return mixed ===false为失败
     */
    protected function filterRseult($data) {
        if (!isset($data['errcode'])) {
            $this->setError(self::CODE_NET_FAIL, '网络错误');
            return false;
        }
        
        $this->setError($data['errcode'], $data['errmsg']);
        if (self::CODE_SUCC !== $data['errcode']) {
            return false;
        }
                
        unset($data['errcode'], $data['errmsg']);
        
        return $data;
    }


    /**
     * 设置错误消息
     * @param int $code
     * @param strin $msg
     */
    protected function setError($code, $msg) {
        $this->errorCode = $code;
        $this->errorMsg = $msg;
    }
    
    /**
     * 
     * @return int 错误代码
     */
    public function getErrCode() {
        return $this->errorCode;
    }
    
    /**
     * 
     * @return string 错误消息
     */
    public function getErrMsg() {
        return $this->errorMsg;
    }

    /**
     * 拼接完整的url
     * @param string $api
     * @param array $params
     * @return string
     */
    protected function buildUrl($api, $params = array()) {
        return $this->apiPrefix . $api . '?' . http_build_query(array_merge(
                        $params, 
                        array('access_token' => $this->accessToken))
                );
    }

}
