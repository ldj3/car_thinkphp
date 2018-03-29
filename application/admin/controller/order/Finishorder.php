<?php

namespace app\admin\controller\order;

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
class Finishorder extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Finishorder');

        
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
                    ->where('state','in','success,failed,nopass')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where('state','in','success,failed,nopass')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            foreach ($list as $k => $v) {
              if ($v['agency_id'] != NULL) {
                $agency_name = Db::table('user_profile')->field('fullname')->where('user_id','=',$v['agency_id'])->select();
                $v['agency_id'] = $agency_name['0']['fullname'];
              }
              if ($v['shop_id'] != NULL) {
                $shop_name = Db::table('ws_products_shop')->field('name')->where('id','=',$v['shop_id'])->select();
                $v['shop_id'] = $shop_name['0']['name'];
              }
              if ($v['user_id'] != NULL) {
                $user_name = Db::table('user_profile')->field('fullname')->where('id','=',$v['user_id'])->select();
                $v['user_id'] = $user_name['0']['fullname'];
              }
              $new[$k] = $v;
            }
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        return $this->view->fetch();
    } 


}
