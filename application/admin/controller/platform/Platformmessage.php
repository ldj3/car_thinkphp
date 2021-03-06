<?php

namespace app\admin\controller\platform;

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
class Platformmessage extends Backend
{

    protected $searchFields = 'id,content,created_time';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Platformmessage');
        
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
                if ($v['to_user_id'] != NULL) {
                    $user_name = Db::table('user_profile')->field('fullname')->where('user_id','=',$v['to_user_id'])->select();
                    $v['to_user_id'] = $user_name['0']['fullname'];
                }
                $new[$k] = $v;
            }
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }
        return $this->view->fetch();
    } 

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            $params['created_time'] = time();

            switch ($params['member']) {
                case 'single':
                    $params['to_user_id'] = $params['to_user_id'];
                    break;
                case 'all':
                    $params['to_user_id'] = NUll;
                    break;
                case 'agency':
                    $params['to_user_id'] = NUll;
                    break;
            }
            if ($params['to_user_id'] != NUll) {
                $user_id = Db::table('user_profile')->field('user_id')->where('id','=',$params['to_user_id'])->select();
                $params['to_user_id'] = $user_id['0']['user_id'];
            }

            if ($params)
            {
                // print_r($params);exit();
                $this->model->save($params);
                $this->success();
            }
            $this->error();
        }
        return $this->view->fetch();
    }


    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            switch ($params['member']) {
                case 'single':
                    $params['to_user_id'] = $params['to_user_id'];
                    break;
                case 'all':
                    $params['to_user_id'] = NUll;
                    break;
                case 'agency':
                    $params['to_user_id'] = NUll;
                    break;
            }
            if ($params['to_user_id'] != NUll) {
                $user_id = Db::table('user_profile')->field('user_id')->where('id','=',$params['to_user_id'])->select();
                $params['to_user_id'] = $user_id['0']['user_id'];
            }
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
