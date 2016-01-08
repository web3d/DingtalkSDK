<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require 'JSONObject.php';

$jo = new JSONObject;

$json_str = '{
    "userid": "zhangsan",
           "name": "张三",
    "tel" : "010-123333",
    "workPlace" :"",
    "remark" : "",
    "mobile" : "13800000000",
    "email" : "dingding@aliyun.com",
    "active" : true,
    "orderInDepts" : "{1:10, 2:20}",
    "isAdmin" : false,
    "isBoss" : false,
    "dingId" : "WsUDaq7DCVIHc6z1GAsYDSA",
    "isLeaderInDepts" : "{1:true, 2:false}",
    "isHide" : false,
    "department": [1, 2],
    "position": "工程师",
    "avatar": "dingtalk.com/abc.jpg",
    "jobnumber": "111111",
    "extattr": {
                "爱好":"旅游",
                "年龄":"24"
                }
        }';


echo $jo->toClass('User', json_decode($json_str, true));
