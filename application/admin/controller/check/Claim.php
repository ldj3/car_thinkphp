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
class Claim extends Backend
{

    protected $model = null;
    protected $categorylist = [];
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
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->where($where)
                    ->where('state','reviewed')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
            		->where($where)
                    ->where('state','reviewed')
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

    
    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        if ($row['car_id'] != NULL) {
                    $sku_id = Db::table('ws_products_sku')->field('id')->where('id','=',$row['car_id'])->find();
                    if ($sku_id['id'] != NULL) {
                        $sku_name = Db::table('ws_products_sku')->field('product_id')->where('id','=',$row['car_id'])->select();
                        if ($sku_name) {
                            $product_id = $sku_name['0']['product_id'];
                            $product_name = Db::table('ws_products_product')->field('name')->where('id','=',$product_id)->select();
                            $row['car_id'] = $product_name['0']['name'];
                        }
                    }else {
                        $row['car_id'] = '此商品已删除';
                    }
                }
        // print_r($row['user_name']);exit();
        if (!$row)
            $this->error(__('No Results were found'));
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            unset($row['user_name']);
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
     * 删除
     */
    public function del($ids = "")
    {
        if ($ids)
        {
            $this->model->index();
        }
        $this->error(__('Parameter %s can not be empty', 'ids'));
    }
    

}
