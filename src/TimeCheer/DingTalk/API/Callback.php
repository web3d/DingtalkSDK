<?php

/*
 * Created Datetime:2016-1-8 20:02:41
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 事件回调接口
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Callback extends Base {
    static $event = array(
        'user_add_org' => 'user_add_org',
        'user_modify_org' => 'user_modify_org',
        'user_leave_org' => 'user_leave_org',
        'org_admin_add' => 'org_admin_add',
        'org_admin_remove' => 'org_admin_remove',
        'org_dept_create' => 'org_dept_create',
        'org_dept_modify' => 'org_dept_modify',
        'org_dept_remove' => 'org_dept_remove',
        'org_remove' => 'org_remove',
        'chat_add_member' => 'chat_add_member',
        'chat_remove_member' => 'chat_remove_member',
        'chat_quit' => 'chat_quit',
        'chat_update_owner' => 'chat_update_owner',
        'chat_update_title' => 'chat_update_title',
        'chat_disband' => 'chat_disband',
        'chat_disband_microapp' => 'chat_disband_microapp',
    );

    const API_LIST = '/call_back/get_call_back';
    const API_REGISTER = '/call_back/register_call_back';
    const API_GET = '/call_back/get_call_back';
    const API_UPDATE = '/call_back/update_call_back';
    const API_DELETE = '/call_back/delete_call_back';
    const API_FAILED_RESULT_GET = '/call_back/get_call_back_failed_result';

    private $aesKey;
    private $token;

    function __construct($accessToken, $aesKey = '', $token = '') {
        parent::__construct($accessToken);
        $this->aesKey = $aesKey;
        $this->token = $token;
    }

    /**
     * 注册回调接口
     * @url 回调地址
     * @event 事件数组，如['user_add_org', 'user_modify_org']
     */
    public function register($url, $event) {
        $data = $this->doPost(self::API_REGISTER, array('url' => $url, 'call_back_tag' => $event, 'aes_key' => $this->aesKey, 'token' => $this->token));
        return $data;
    }

    /**
     * 获取回调接口
     * @return array|bool|mixed
     */
    public function get() {
        $data = $this->doGet(self::API_GET);
        return $data;
    }

    /**
     * 更新回调接口
     * @param $url
     * @param $event
     * @return array|bool|mixed
     */
    public function update($url, $event) {
        $data = $this->doPost(self::API_REGISTER, array('url' => $url, 'call_back_tag' => $event, 'aes_key' => $this->aesKey, 'token' => $this->token));
        return $data;

    }

    /**
     * 删除回调接口
     * @return array|bool|mixed
     */
    public function delete() {
        $data = $this->doGet(self::API_DELETE);
        return $data;
    }
}
