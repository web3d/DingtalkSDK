<?php

/*
 * Created Datetime:2016-1-8 20:53:52
 * Creator:Jimmy Jaw <web3d@live.cn>
 * Copyright:TimeCheer Inc. 2016-1-8 
 * 
 */

/**
 * 将json数据字符串转换为php class类
 *
 * @author Jimmy Jaw <web3d@live.cn>
 */
class JSONObject {
    
    public function toClass($className, array $json_array) {
        $str = "<?php \n";
        
        $str .= "\n";
        $str .= "class {$className} {/** created by JSONObject */\n\n";
        
        if (count($json_array) > 0) {
            foreach ($json_array as $key => $value) {
                if (is_int($value)) {
                    $type = 'int';
                } elseif (is_string($value)) {
                    $type = 'string';
                } elseif (is_bool($value)) {
                    $type = 'string';
                } else {
                    $type = 'mixed';
                }
                
                $str .= "    /**\n";
                $str .= "     * @var {$type} \${$key} 如'{$value}'\n";
                $str .= "     */\n";
                
                $str .= "    public \${$key};\n\n";
            }
        }
        
        $str .= '}';
        
        return $str;
    }
}
