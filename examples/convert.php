<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require 'JSONObject.php';

$jo = new JSONObject;

$json_str = '{
           "id": 2,
    "name": "钉钉事业部",
    "order" : 10,
    "parentid": 1,
    "createDeptGroup": true,
    "autoAddUser": true,
    "deptHiding" : true,
    "deptPerimits" : "3|4",
    "orgDeptOwner" : "manager1122",
    "deptManagerUseridList" : "manager1122|manager3211"
        }';


echo $jo->toClass('Department', json_decode($json_str, true));
