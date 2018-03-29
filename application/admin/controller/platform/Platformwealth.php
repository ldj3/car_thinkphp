<?php

namespace app\admin\controller\platform;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Platformwealth extends Backend
{

    protected $searchFields = 'all_funny_beans,all_share_score,all_quick_score,mon_share_score,mon_quick_score';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Platformwealth');
        
    }

}
