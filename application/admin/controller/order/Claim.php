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
class Claim extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'claimer_name,boss_name,contract_code,claim_product_id,money,remain_periods,order_code,from_order,created_time';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Claim');
    }

    /**
     * 查看
     */
    public function index()
    {
        
        if ($this->request->isAjax())
        {
            // print_r($table);exit();
            // print_r($this);exit();
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->where('state','in','success,failed')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
            		->where($where)
                    ->where('state','in','success,failed')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $k => $v) {
                if ($v['car_id'] != NULL) {
                    $sku_id = Db::table('ws_products_sku')->field('id')->where('id','=',$v['car_id'])->find();
                    if ($sku_id['id'] != NULL) {
                        $sku_name = Db::table('ws_products_sku')->field('product_id')->where('id','=',$v['car_id'])->select();
                        if ($sku_name) {
                            $product_id = $sku_name['0']['product_id'];
                            $product_name = Db::table('ws_products_product')->field('name')->where('id','=',$product_id)->select();
                            $v['car_id'] = $product_name['0']['name'];
                        }
                    }else {
                        $v['car_id'] = '此商品已删除';
                    }
                }
              $new[$k] = $v;
            }


            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    } 

    

    

}
