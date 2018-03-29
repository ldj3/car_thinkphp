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
class Sku extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'product_id';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Sku');
        
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
                // print_r($v['product_id']);exit();
                $p_id = Db::table('ws_products_product')->field('id')->where('id','=',$v['product_id'])->find();
                if ($p_id['id'] != NUll) {
                    $product_id = $v['product_id'];
                    $product_name = Db::table('ws_products_product')->field('name')->where('id','=',$product_id)->find();
                    $v['product_name'] = $product_name['name'];
                    $a = $v['product_property_group_id'];

                    $product_property_group_id = explode(',', $v['product_property_group_id']);
                    foreach ($product_property_group_id as $product_id_array) {
                        $product_property_id = $product_id_array;
                        $property_group_id = explode(':', $product_property_id);
                        $product_property_name = Db::table('ws_products_productproperty')->field('property_name')->where('id','=',$property_group_id['0'])->select();
                        $product_property_name_value = Db::table('ws_products_productpropertyvalue')->field('name')->where('id','=',$property_group_id['1'])->select();
                        $a = $product_property_name['0']['property_name'].':'.$product_property_name_value['0']['name'];
                        $v['product_property_group_id'] .= $a;
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
