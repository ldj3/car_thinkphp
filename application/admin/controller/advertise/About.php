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
class About extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'company_phone,add_time';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('About');
        
    }


    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            // $params['eventkey'] = isset($params['eventkey']) && $params['eventkey'] ? $params['eventkey'] : uniqid();
            // $params['content'] = json_encode($params['content']);
            $params['add_time'] = date("Y-m-d");
            if ($params)
            {
                $this->model->save($params);
                $this->success();
                $this->content = $params;
            }
            $this->error();
        }
        return $this->view->fetch();
    }

}
