<?php

/*
 * Created Datetime:2016-1-8 20:10:17
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 普通会话消息接口
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Message extends Base {
    
    const API_SEND = '/message/send';
    const API_SEND_CONVERSATION = '/message/send_to_conversation';

    /**
     * @param $message
     * @param $agentId 企业应用id
     * @param array $toUser 员工id列表，多个接收者用|分隔
     * @param array $toParty 部门id列表，多个接收者用|分隔
     * @return array
     */
    function send($message, $agentId, $toUser = null, $toParty = null) {
        $parameters = array('agentid' => $agentId);
        if ($toUser) $parameters['touser'] = $toUser;
        if ($toParty) $parameters['toparty'] = $toParty;
        $data = $this->doPost(self::API_SEND, array_merge($parameters, $message));
        return $data;
    }
}
