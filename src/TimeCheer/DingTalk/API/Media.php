<?php

/*
 * Created Datetime:2016-1-8 20:11:57
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;
use Httpful\Mime;
use Httpful\Request;

/**
 * 多媒体文件
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Media extends Base {
    const API_GET = '/media/get';
    const API_UPLOAD = '/media/upload';

    /**
     * 上传多媒体文件
     * @param $type string: image|voice|file
     * @param $file string: absolute file path
     * @return array
     */
    function upload($type, $file) {
        $url = $this->apiPrefix . self::API_UPLOAD . '?access_token=' . $this->accessToken . '&type=' . $type;
        $response = Request::post($url)
            ->attach(['media' => $file])
            ->expects(Mime::JSON)
            ->send();
        $data = $this->filterResult($response->body);
        return $data;
    }
}
