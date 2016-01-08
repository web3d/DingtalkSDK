<?php

/*
 * Created Datetime:2016-1-8 17:06:27
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk;

use Httpful\Request;
use Httpful\Httpful;
use Httpful\Mime;

/**
 * 对http client的封装
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Client extends Request {
    
    /**
     * HTTP Method Get
     * @param string $uri optional uri to use
     * @param string $mime expected
     * @return Request
     */
    public static function get($uri, $mime = null) {
        self::setJsonDecodeAsArray();
        
        return parent::get($uri, $mime);
    }
    
    /**
     * HTTP Method Post
     * @param string $uri optional uri to use
     * @param string $payload data to send in body of request
     * @param string $mime MIME to use for Content-Type
     * @return Request
     */
    public static function post($uri, $payload = null, $mime = null) {
        self::setJsonDecodeAsArray();
        
        return parent::post($uri, $payload, $mime);
    }
    
    /**
     * 将json对象解析结构改为数组
     */
    protected static function setJsonDecodeAsArray() {
        Httpful::get(Mime::JSON)->init(array('decode_as_array', true));
    }
    
}
