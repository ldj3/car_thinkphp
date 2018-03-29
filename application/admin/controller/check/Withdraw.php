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
class Withdraw extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $searchFields = 'fullname,id,mobile,bank_card_num,withdraw_number';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Withdraw');

        
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
              if ($v['user_id'] != NULL) {
                $user_name = Db::table('user_profile')->field('fullname')->where('user_id','=',$v['user_id'])->select();
                $v['user_id'] = $user_name['0']['fullname'];
              }
              $new[$k] = $v;
            }
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        return $this->view->fetch();
    }


    /**
     * 详情编辑
     */
    public function detail($ids)
    {
        $row = $this->model->get(['id' => $ids]);
        if (!$row)
            $this->error(__('No Results were found'));
        $this->view->assign("row", $row->toArray());
        return $this->view->fetch();

        
    }



}
