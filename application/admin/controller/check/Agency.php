<?php

namespace app\admin\controller\check;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;
use think\Db;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Agency extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $searchFields = 'order_id,id';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Agency');

        
    }

    /**
     * 查看
     */
    public function index()
    {
        
        if ($this->request->isAjax())
        {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            foreach ($list as $k => $v) {
            	
            	$order_name = Db::table('ws_shopping_order')->field('show_order_code')->where('id','=',$v['order_id'])->select();
            	$v['order_id'] = $order_name['0']['show_order_code'];

            	$new[$k] = $v;
            }
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        return $this->view->fetch();
    }

}
