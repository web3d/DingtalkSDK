<?php

namespace TimeCheer\DingTalk\API;

/**
 * 考勤
 *
 * @author jibo
 */
class Attendance extends Base {
    
    const API_LIST = '/attendance/list';

    /**
     * 获取员工考勤打卡数据
     * @param string $userId
     * @param $workDateFrom yyyy-MM-dd hh:mm:ss
     * @param $workDateTo yyyy-MM-dd hh:mm:ss
     * @return array
     */
    public function query($userId, $workDateFrom, $workDateTo) {
        $data = $this->doPost(self::API_LIST, array('userId' => $userId, 'workDateFrom' => $workDateFrom, 'workDateTo' => $workDateTo));
        if ($data === false || empty($data['recordresult'])) {
            return array();
        }
        return $data['recordresult'];
    }
}
