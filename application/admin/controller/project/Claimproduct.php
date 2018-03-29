<?php

namespace app\admin\controller\project;

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
class Claimproduct extends Backend
{

    protected $model = null;
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'money,remain_periods,periods_money,id';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Claimproduct');
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
                $show_order_code = Db::table('ws_shopping_order')->field('show_order_code')->where('id','=',$v['order_id'])->select();
                $v['order_id'] = $show_order_code['0']['show_order_code'];
                $user_name = Db::table('user_profile')->field('fullname')->where('user_id',$v['user_id'])->select();
                $v['user_id'] = $user_name['0']['fullname'];
                $new[$k] = $v;
            }
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }



	/**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
            $show_order_code = Db::table('ws_shopping_order')->field('show_order_code')->where('id','=',$row['order_id'])->select();
            $row['order_id'] = $show_order_code['0']['show_order_code'];
            $user_name = Db::table('user_profile')->field('fullname')->where('user_id',$row['user_id'])->select();
            $row['user_id'] = $user_name['0']['fullname'];
        switch ($row['off_shelf']) {
            case '1':
                $row['off_shelf'] = '是';
                break;
            case '0':
                $row['off_shelf'] = '否';
                break;
            default:
                $row['off_shelf'] = $row['off_shelf'];
        }
        switch ($row['is_hot']) {
            case '1':
                $row['is_hot'] = '是';
                break;
            case '0':
                $row['is_hot'] = '否';
                break;
            default:
                $row['is_hot'] = $row['is_hot'];
        }
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            // print_r($params);exit();
            $params['money'] = $params['remain_periods'] * $row['periods_money'];
            unset($row['off_shelf']);
            unset($row['is_hot']);
            if ($params)
            {
                foreach ($params as $k => &$v)
                {
                    $v = is_array($v) ? implode(',', $v) : $v;
                }
                try
                {
                    //是否采用模型验证
                    if ($this->modelValidate)
                    {
                        $name = basename(str_replace('\\', '/', get_class($this->model)));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : true) : $this->modelValidate;
                        $row->validate($validate);
                    }
                    $result = $row->save($params);
                    if ($result !== false)
                    {
                        $this->success();
                    }
                    else
                    {
                        $this->error($row->getError());
                    }
                }
                catch (think\exception\PDOException $e)
                {
                    $this->error($e->getMessage());
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }    

    

}
