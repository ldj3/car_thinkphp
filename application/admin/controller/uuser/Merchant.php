<?php

namespace app\admin\controller\uuser;

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
class Merchant extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'id,mobile,fullname,birth_date';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Merchant');
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
                    ->where('is_shop_account','1')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->where('is_shop_account','1')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();
            foreach ($list as $k => $v) {
              $user_id = $v['user_id'];
              $email = Db::table('auth_user')->field('email')->where('id','=',$user_id)->select();
              $v['email'] = $email['0']['email'];
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

            $pass = trim($params['password']);
            $iterations = 30000;
            $salt = Random::alnum();
            $hash = hash_pbkdf2("sha256", $pass, $salt, $iterations, $length = 0, $raw_output = true);
            $pp = base64_encode($hash);
            $password = 'pbkdf2_sha256$30000$'.$salt.'$'.$pp;

            unset($pp);
            unset($pass);
            unset($iterations);
            unset($salt);
            unset($hash);
            unset($params['password']);
            $email = $params['email'];
            unset($params['email']);
            if ($params['avatar']) {
                $b = 'http://image.xiyueyi.cn';
                $params['avatar'] = $b.$params['avatar'];
            }else {
                $params['avatar'] = '';
            }
            unset($b);
            $params['is_shop_account'] = '1';
            $params['recommend_code'] = $params['mobile'];
            $params['member_level'] = '0';
            $params['name'] = $params['fullname'];
            $identity_id = $params['identity_id'];
            if ($identity_id != NULL) {
                $params['identity_id'] = $identity_id;
            }else {
                $params['identity_id'] = NULL;
            }
            $params['identity_id'] = $params['identity_id'];
            if ($params)
            {


                $t3 = array(
                    'password'          => $password,
                    'email'             => $email,
                    'is_superuser'      => '0',
                    'username'          => time(),
                    'first_name'        => time(),
                    'last_name'         => time(),
                    'is_staff'          => '0',
                    'is_active'         => '1',
                    'last_login'        => date('Y-m-d H:i:s'),
                    'date_joined'       => date('Y-m-d H:i:s'),
                );
                $sku_model = model('Authuser');
                $sku_data = $sku_model->insert($t3);
                $authid = $sku_model->getLastInsID();


                $t4 = array(
                    'money'                         => '0',
                    'funny_bean'                    => '0',
                    'share_score'                   => '0',
                    'quick_score'                   => '0',
                    'money_add_step'                => '0',
                    'money_stock'                   => '0',
                    'all_tax_stock'                 => '0',
                    'base_brokerage_stock'          => '0',
                    'recommend_money_stock'         => '0',
                    'last_return_brokerage_at'      => 'nostart',
                    'created_time'                  => 'nostart',
                    'welfare_score'                 => '0',
                    'distributed_welfare_score'     => '0',
                    'user_id'                       => $authid,
                );
                $wealth = model('Shoppingwealth');
                $wealth_data = $wealth->insert($t4);


                $params['user_id'] = $authid;
                unset($authid);
                unset($sku_model);
                unset($wealth);
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
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            $avatar = $params['avatar'];
            $params['name'] = $params['fullname'];
            
            if ($avatar) {
                if (strpos($avatar, 'image.xiyueyi.cn')) {
                    $params['avatar'] = $avatar;
                }else {
                    $a = 'http://image.xiyueyi.cn';
                    $avatar = $a.$params['avatar'];
                    unset($a);
                    $params['avatar'] = $avatar;
                }
            }else {
                $params['avatar'] = '';
            }
            $identity_id = $params['identity_id'];
            if ($identity_id != NULL) {
                $params['identity_id'] = $identity_id;
            }else {
                $params['identity_id'] = NULL;
            }
            $params['identity_id'] = $params['identity_id'];
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
