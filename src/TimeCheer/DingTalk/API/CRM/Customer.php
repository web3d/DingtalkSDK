<?php

/*
 * Created Datetime:2016-1-8 19:57:34
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API\CRM;

/**
 * 员工客户管理接口
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Customer {
    const API_GET = '/crm/customer/get';
    const API_CREATE = '/crm/customer/create';
    const API_UPDAE = '/crm/customer/update';
    const API_DELETE = '/crm/customer/delete';
    const API_LIST = '/crm/customer/list';
    const API_UNBIND = '/crm/empcustomer/delete';
}
