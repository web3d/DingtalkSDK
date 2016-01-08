<?php

/*
 * Created Datetime:2016-1-8 20:20:22
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * JS接口API
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class JS extends Base {
    
    const API_GET_TICKET = '/get_jsapi_ticket';
    
    /**
     * 获取jsapi_ticket
     * @return boolean|array array("ticket" => "", "expires_in" => 7200)
     */
    public function getTicket() {
        $data = $this->doGet(self::API_GET_TICKET, array('type' => 'jsapi'));
        
        if ($data === false || empty($data['ticket'])) {
            return false;
        }
        
        return $data;
    }
}
