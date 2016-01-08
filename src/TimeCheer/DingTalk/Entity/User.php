<?php

/*
 * Created Datetime:2016-1-8 21:09:15
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\Entity;

/**
 * 接口用户数据实体
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class User {/** created by JSONObject */

    /**
     * @var string $userid 如 'zhangsan'
     */
    public $userid;

    /**
     * @var string $name 如 '张三'
     */
    public $name;

    /**
     * @var string $tel 如 '010-123333'
     */
    public $tel;

    /**
     * @var string $workPlace 如 ''
     */
    public $workPlace;

    /**
     * @var string $remark 如 ''
     */
    public $remark;

    /**
     * @var string $mobile 如 '13800000000'
     */
    public $mobile;

    /**
     * @var string $email 如 'dingding@aliyun.com'
     */
    public $email;

    /**
     * @var boolean $active 如 true
     */
    public $active;

    /**
     * @var string $orderInDepts 如 '{1:10, 2:20}'
     */
    public $orderInDepts;

    /**
     * @var boolean $isAdmin 如 false
     */
    public $isAdmin;

    /**
     * @var boolean $isBoss 如 false
     */
    public $isBoss;

    /**
     * @var string $dingId 如 'WsUDaq7DCVIHc6z1GAsYDSA'
     */
    public $dingId;

    /**
     * @var string $isLeaderInDepts 如 '{1:true, 2:false}'
     */
    public $isLeaderInDepts;

    /**
     * @var boolean $isHide 如 false
     */
    public $isHide;

    /**
     * @var array $department 如 
     */
    public $department;

    /**
     * @var string $position 如 '工程师'
     */
    public $position;

    /**
     * @var string $avatar 如 'dingtalk.com/abc.jpg'
     */
    public $avatar;

    /**
     * @var string $jobnumber 如 '111111'
     */
    public $jobnumber;

    /**
     * @var array $extattr 如 
     */
    public $extattr;

}