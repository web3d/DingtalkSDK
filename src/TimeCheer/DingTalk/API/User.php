<?php

/*
 * Created Datetime:2016-1-8 19:44:11
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 成员相关接口
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class User {
    const API_GET = '/user/get';
    const API_CREATE = '/user/create';
    const API_UPDAE = '/user/update';
    const API_DELETE = '/user/delete';
    const API_DELETE_ALL = '/user/batchdelete';
    const API_LIST = '/user/list';
    const API_LIST_SIMPLE = '/user/simplelist';
    const API_GET_INFO = '/user/getuserinfo';
}
