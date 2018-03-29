<?php

namespace app\admin\controller\uuser;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Userprofile extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'id,mobile,fullname,birth_date';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Userprofile');
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
                    ->where('member_level','in','2,3')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->where('member_level','in','2,3')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
	
	
	
	/**
     * Selectpage搜索
     * 
     * @internal
     */
    public function selectpage()
    {
        return parent::selectpage();
    }

}
