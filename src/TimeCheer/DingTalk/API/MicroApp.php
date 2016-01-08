<?php

/*
 * Created Datetime:2016-1-8 19:47:48
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 微应用
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class MicroApp {
    const API_CREATE = '/microapp/create';
    
    /**
     * 创建微应用
     * @param \TimeCheer\DingTalk\Entity\MicroApp $app
     * @return int|boolean
     */
    public function create(\TimeCheer\DingTalk\Entity\MicroApp $app) {
        $result = $this->doPost(self::API_CREATE, (array) $app);
        
        return empty($result['id']) ? false : $result['id'];
    }
}
