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
class User extends Base {
    
    const API_GET = '/user/get';
    const API_CREATE = '/user/create';
    const API_UPDATE = '/user/update';
    const API_DELETE = '/user/delete';
    const API_DELETE_ALL = '/user/batchdelete';
    const API_LIST = '/user/list';
    const API_LIST_SIMPLE = '/user/simplelist';
    const API_GET_INFO = '/user/getuserinfo';
    
    /**
     * 获取部门成员（详情）
     * @param int $deptId
     * @return array 数组中结构参看相应数据实体类
     * @see \TimeCheer\DingTalk\Entity\User []
     */
    public function query($deptId) {
        $data = $this->doGet(self::API_LIST, array('department_id' => $deptId));
        if ($data === false || empty($data['userlist'])) {
            return array();
        }
        
        return $data['userlist'];
    }
    
    /**
     * 获取部门成员（简单）
     * @param int $deptId
     * @return array 数组中结构参看相应数据实体类 只返回其中的 userid name active
     * @see \TimeCheer\DingTalk\Entity\User []
     */
    public function querySimple($deptId) {
        $data = $this->doGet(self::API_LIST_SIMPLE, array('department_id' => $deptId));
        if ($data === false || empty($data['userlist'])) {
            return array();
        }
        
        return $data['userlist'];
    }
    
    /**
     * 获取成员详情
     * @param int $userId
     * @return array 数组中结构参看相应数据实体类 只返回其中的
     * @see \TimeCheer\DingTalk\Entity\User
     */
    public function get($userId) {
        $user = $this->doGet(self::API_GET, array('userid' => $userId));
        
        if ($user === false) {
            return array();
        }
        
        return $user;
    }

    /**
     * CODE换取用户信息
     * @param string $code
     * @return array
     */
    public function getUserInfo($code) {
        $user = $this->doGet(self::API_GET_INFO, array('code' => $code));

        if ($user === false) {
            return array();
        }

        return $user;
    }

    /**
     * 创建成员
     * @link http://ddtalk.github.io/dingTalkDoc/#创建成员
     * @param \TimeCheer\DingTalk\Entity\User $user
     * @return string|bool
     */
    public function create(\TimeCheer\DingTalk\Entity\User $user) {
        $result = $this->doPost(self::API_CREATE, (array) $user);
        
        return empty($result['userid']) ? false : $result['userid'];
    }
    
    /**
     * 更新成员
     * @param \TimeCheer\DingTalk\Entity\User $user
     * @return bool
     */
    public function update(\TimeCheer\DingTalk\Entity\User $user) {
        $result = $this->doPost(self::API_UPDATE, (array) $user);
        
        return ($result === false) ? false : true;
    }
    
    /**
     * 删除成员
     * @param string $userId
     * @return boolean
     */
    public function delete($userId) {
        $result = $this->doGet(self::API_DELETE, array('userid' => $userId));
        
        if ($result === false) {
            return false;
        }
        
        return true;
    }
    
    /**
     * 批量删除成员
     * @param array $userIds
     * @return boolean
     */
    public function deleteAll(array $userIds) {
        $result = $this->doPost(self::API_DELETE_ALL, array('useridlist' => $userIds));
        
        if ($result === false) {
            return false;
        }
        
        return true;
    }
}
