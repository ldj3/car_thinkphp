<?php

namespace app\admin\model;

use think\Model;
use think\Session;

class Recommend extends Model
{

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $table = 'fa_accounts_recommendusercommissions';

	
}
