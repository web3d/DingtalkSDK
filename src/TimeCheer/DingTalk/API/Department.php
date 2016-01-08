<?php

/*
 * Created Datetime:2016-1-8 19:41:48
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

namespace TimeCheer\DingTalk\API;

/**
 * 部门管理
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class Department extends Base {
    
    const API_LIST = '/department/list';
    const API_GET = '/department/get';
    const API_CREATE = '/department/create';
    const API_UPDATE = '/department/update';
    const API_DELETE = '/department/delete';
    
    /**
     * 获取部门列表
     * @link http://ddtalk.github.io/dingTalkDoc/?spm=a3140.7785475.0.0.6qW6Py#管理通讯录
     * @return array 数组中结构参看相应数据实体类
     * @see \TimeCheer\DingTalk\Entity\Department []
     */
    public function query() {
        $data = $this->doGet(self::API_LIST);
        if ($data === false || empty($data['department'])) {
            return array();
        }
        
        return $data['department'];
    }
    
    /**
     * 获取部门详情
     * @param int $id
     * @return array
     * @see \TimeCheer\DingTalk\Entity\Department
     */
    public function get($id) {
        $data = $this->doGet(self::API_GET, array('id' => $id));
        
        if ($data === false) {
            return array();
        }
        
        return $data;
    }
    
    /**
     * 创建部门
     * @param string $name
     * @param int $parentid
     * @param int $order
     * @param bool $createDeptGroup
     * @return int|bool 失败返回false 成功返回id
     */
    public function create($name, $parentid, $order = 0, $createDeptGroup = false) {
        $result = $this->doPost(
                self::API_CREATE, 
                array('name' => $name, 'parentid' => $parentid, 
                    'order' => $order, 'createDeptGroup' => $createDeptGroup)
                );
        
        return empty($result['id']) ? false : $result['id'];
    }
    
    /**
     * 更新部门
     * @param \TimeCheer\DingTalk\Entity\Department $dept
     * @return bool
     */
    public function update(\TimeCheer\DingTalk\Entity\Department $dept) {
        $result = $this->doPost(self::API_UPDATE, (array) $dept);
        
        return ($result === false) ? false : true;
    }
    
    /**
     * 删除部门
     * @param int $id
     * @return boolean
     */
    public function delete($id) {
        $data = $this->doGet(self::API_DELETE, array('id' => $id));
        
        if ($data === false) {
            return false;
        }
        
        return true;
    }
}
