<?php

namespace app\admin\controller\shop;

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
class Car extends Backend
{

    protected $model = null;
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'name,telephone,address';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Shopcar');
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
                    ->where('type','product')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->where('type','product')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            foreach ($list as $k => $v) {
              // $user_id = $v['user_id'];
              $user_name = Db::table('user_profile')->field('name')->where('user_id','=',$v['user_id'])->select();
              // var_dump(expression)($user_name);
              $city_code = $v['city'];
              $city_name = Db::table('cities')->field('name')->where('code',$city_code)->select();
              $v['city'] = $city_name['0']['name'];
              $v['user_id'] = $user_name['0']['name'];
              $new[$k] = $v;
            }
            // exit();
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
            $user_id = $params['user_id'];
            $params['type'] = 'product';
            $params['status'] = 'normal';
            $a = 'http://image.xiyueyi.cn';
            $title_image = $a.$params['title_image'];
            $detail_image = $a.$params['detail_image'];
            unset($a);
            $params['title_image'] = $title_image;
            $params['detail_image'] = $detail_image;
            $city_id = $params['city'];
            $city = Db::table('cities')->field('code')->where('id','=',$city_id)->select();
            $params['city'] = $city['0']['code'];

            // $city_id = $params['city'];
            $user_profile_userid = Db::table('user_profile')->field('user_id')->where('id','=',$params['user_id'])->select();
            $params['user_id'] = $user_profile_userid['0']['user_id'];
            if ($params)
            {
                model('Member')->where('user_id',$user_id)->update(array("is_shop_account"=>"1"));
                $this->model->save($params);
                $this->success();
                $this->content = $params;
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
        $row_city = Db::table('cities')->field('id')->where('code','=',$row['city'])->select();
        $row['city'] = $row_city['0']['id'];
        // print_r($row['user_id']);exit();
        $user_profile_user_id = Db::table('user_profile')->field('id')->where('user_id','=',$row['user_id'])->select();
        // print_r($user_profile_user_id);exit();
        if ($user_profile_user_id != NULL) {
            $row['user_id'] = $user_profile_user_id['0']['id'];
        }
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            $title_image = $params['title_image'];
            $detail_image = $params['detail_image'];
            
            if (strpos($title_image, 'image.xiyueyi.cn')) {
              $params['title_image'] = $title_image;
            }else {
              $a = 'http://image.xiyueyi.cn';
              $title_image = $a.$params['title_image'];
              unset($a);
              $params['title_image'] = $title_image;
            }

            if (strpos($detail_image, 'image.xiyueyi.cn')) {
              $params['detail_image'] = $detail_image;
            }else {
              $a = 'http://image.xiyueyi.cn';
              $detail_image = $a.$params['detail_image'];
              unset($a);
              $params['detail_image'] = $detail_image;
            }
            $city_id = $params['city'];
            $city = Db::table('cities')->field('code')->where('id','=',$city_id)->select();
            $params['city'] = $city['0']['code'];
            $user_profile_userid = Db::table('user_profile')->field('user_id')->where('id','=',$params['user_id'])->select();
            $params['user_id'] = $user_profile_userid['0']['user_id'];
            unset($row_city);
            unset($user_profile_userid);
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
