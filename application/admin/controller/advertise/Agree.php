<?php

namespace app\admin\controller\advertise;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Agree extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'agree_name,add_time';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Agree');
        
    }


    

}
