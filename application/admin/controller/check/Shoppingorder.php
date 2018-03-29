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
class Shoppingorder extends Backend
{

    protected $model = null;
    protected $searchFields = 'contract_code,buy_contract_code,order_name,price,tax,created_time';
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Shoppingorder');

        
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
                    ->where('state','in','auditing,imcomplete')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->where('state','in','auditing,imcomplete')
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

    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        // print_r($row['deposit_pay']);exit();
        switch ($row['deposit_pay']) {
            case '1':
                $row['deposit_pay'] = '是';
                break;
            case '0':
                $row['deposit_pay'] = '否';
                break;
            default:
                $row['deposit_pay'] = $row['deposit_pay'];
        }
        switch ($row['buy_type']) {
            case 'all_return':
                $row['buy_type'] = '全额全返';
                break;
            case 'rent_instead_buy':
                $row['buy_type'] = '以租代购';
                break;
            case 'format3':
                $row['buy_type'] = '买断收益';
                break;
            case 'service':
                $row['buy_type'] = '购买服务';
                break;
            default:
                $row['buy_type'] = $row['buy_type'];
        }
        switch ($row['pay_from']) {
            case 'alipay':
                $row['pay_from'] = '支付宝';
                break;
            case 'weixin':
                $row['pay_from'] = '微信';
                break;
            default:
                $row['pay_from'] = $row['pay_from'];
        }
        if ($row['agency_id'] != NULL) {
            $agency_name = Db::table('user_profile')->field('fullname')->where('user_id','=',$row['agency_id'])->select();
            $row['agency_id'] = $agency_name['0']['fullname'];
        }
        if ($row['shop_id'] != NULL) {
            $shop_name = Db::table('ws_products_shop')->field('name')->where('id','=',$row['shop_id'])->select();
            $row['shop_id'] = $shop_name['0']['name'];
        }
        if ($row['user_id'] != NULL) {
            $user_name = Db::table('user_profile')->field('fullname')->where('id','=',$row['user_id'])->select();
            $row['user_id'] = $user_name['0']['fullname'];
        }
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            unset($row['agency_id']);
            unset($row['shop_id']);
            unset($row['user_id']);
            unset($row['deposit_pay']);
            unset($row['buy_type']);
            unset($row['pay_from']);
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
