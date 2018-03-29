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
class Agencyauthenticate extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $searchFields = 'company_name,company_address,id';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Agencyauthenticate');

        
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
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        $user_name = Db::table('user_profile')->field('fullname')->where('user_id','=',$row['user_id'])->select();
        $row['user_name'] = $user_name['0']['fullname'];
        $row['level_name'] = $row['level'];
        switch ($row['level_name']) {
            case '0':
                $row['level_name'] = '普通用户';
                break;
            case '1':
                $row['level_name'] = '会员';
                break;
            case '2':
                $row['level_name'] = '区级代理商';
                break;
            case '3':
                $row['level_name'] = '市级代理商';
                break;
            default:
                $row['level_name'] = $row['level'];
        }
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            unset($row['user_name']);
            unset($row['level_name']);
            // print_r($params);exit();
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
