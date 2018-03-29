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
class Serve extends Backend
{

    protected $model = null;
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'name,sales,shop_id,deposit';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Projectserve');
        
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
                    ->where('type','service')
                    ->order($sort, $order)
                    ->count();
            $list = $this->model
                    ->where($where)
                    ->where('type','service')
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $k => $v) {
              $shop_id = $v['shop_id'];
              $shop_name = Db::table('ws_products_shop')->field('name')->where('id','=',$shop_id)->select();
              $v['shop_name'] = $shop_name['0']['name'];
              $new[$k] = $v;
            }

            $result = array("total" => $total, "rows" => $list);
            $result =  json_encode($result);
            print_r($result);exit();
        }
        return $this->view->fetch();
    }

    /**
    * 生成规格属性
    */
    public function getMultiStands(){
           if(isset ($_POST['stand_val'])){
                   $stand_val = $_POST['stand_val'];
                   $nStand = explode(',', $stand_val);
                   $nStand = array_unique($nStand);
                   
                   //数组分割
                   foreach ($nStand as $k => $v) {
                           if ($v) {
                                   $nArray[] = $this->_cutArray($v);
                           }
                   }
                   
                   $lastCreateStand = $this->_restrArray($nArray);
//                   print_r($lastCreateStand);exit;
                   $array_key = array_keys($lastCreateStand);
                   if (count($lastCreateStand) == 1) {
                           foreach ($lastCreateStand as $key => $val) {
                                   foreach ($val as $tk => $tv) {
                                           $arArray[$tk][] = $tv;
                                   }
                           }
                   } else {
                           //数组重组
                           foreach ($lastCreateStand[$array_key[0]] as $k => $v) {
                                   $newArray[] = $this->_doOP($lastCreateStand, $v);
                           }
                           foreach ($newArray as $key => $val) {
                                   foreach ($val as $ts => $tv) {
                                           $arArray[] = $this->ArrMd2Ud(array_reverse($tv));
                                   }
                           }
                   }
//			print_r($arArray);exit;
                   $html = '<table id="standsAttrTable_cont"><thead ><tr >';
                   foreach ($array_key as $standkey => $item) {
                           $html.='<td width="70"  align="center" bgcolor="#e5e5e5" name="guige">'.$item.'</td>';
                   }
                   $html .= '<td width="120" align="center" bgcolor="#e5e5e5">库存</td><td width="120" align="center" bgcolor="#e5e5e5">价格</td><td  align="center" bgcolor="#e5e5e5">手续费</td></tr></thead>';
                   foreach ($arArray as $skey => $sitem) {
                           $html .= '<tr>';
                           foreach ($sitem as $tkey => $titem) {
                                   $html .= '<td align="center">'.$titem.'<input type="hidden" name="multi[base]['.$skey.'][stands]['.$tkey.']" value="'.$titem.'"></td>';
                           }
                           $html .= '<td align="center"><input type="text"  class="field multi-sku-price" style="width:70px;" name="multi[base]['.$skey.'][refer_price]" data-skey="'.$skey.'" value=""></td><td align="center"><input type="text" style="width:70px;" class="field" name="multi[base]['.$skey.'][weight]" value=""></td><td align="center"><input type="text" style="width:60px;" class="field" name="multi[base]['.$skey.'][volume]" value=""></td></tr>';
                   }
                   $html .= '</table>';
                   echo $html;exit;
           }

   }
    //判断数组中某个键是否包含某个字符串，并返回该键的数组
    function checkArrayKey($array, $string) {
        $a = array();
        foreach ($array as $k => $val) {
            if (strpos($k, $string) !== false) {
                $newArray[] = $k;
            }
        }
        return $newArray;
    }
    /**
     * 将多维数组转为一维数组
     * @param array $arr
     * @return array
     */
    function ArrMd2Ud($arr) {
        #将数值第一元素作为容器，作地址赋值。
        $ar_room = &$arr[key($arr)];
        #第一容器不是数组进去转呀
        if (!is_array($ar_room)) {
            #转为成数组
            $ar_room = array($ar_room);
        }
        #指针下移
        next($arr);
        #遍历
        while (list($k, $v) = each($arr)) {
//            echo __FUNCTION__;exit;
            #是数组就递归深挖，不是就转成数组
            $v = is_array($v) ? $this->ArrMd2Ud($v) : array($v);
            #递归合并
            $ar_room = array_merge_recursive($ar_room, $v);
            #释放当前下标的数组元素
            unset($arr[$k]);
        }
        return $ar_room;
    }
    /*********************************************
     * _doOP 构造新数组，以满足前台表格的设计
     * $array 将要进行重新构造的数组。 $pre_val要组合的值
     * $linshi临时变量，用来存储递归时的数组
     * return array
     * @mark 2012/8/11
     * ******************************************** */
    function _doOP($array, $pre_val = false, $linshi = array()) {
        array_shift($array);
        $count = count($array);
        $ttt = array();

        if (count($array) > 0) {
            $array_key = array_keys($array);
            foreach ($array[$array_key[0]] as $key => $val) {
                $jima = $key;
                $ttt[] = $val;
            }
            if ($ttt && $linshi) {
                foreach ($ttt as $k => $v) {
                    foreach ($linshi as $bk => $bv) {
                        $newArray[] = array($v, $bv);
                    }
                }
            } else {
                if ($ttt == '') {
                    return;
                }
                foreach ($ttt as $k => $v) {
                    $newArray[] = array($v);
                }
            }
            return $this->_doOP($array, $pre_val, $newArray);
        } else {
            if ($linshi == '') {
                return;
            }
            foreach ($linshi as $k => $v) {

                $linshi[$k][] = $pre_val;
            }
            return $linshi;
        }
    }
    /*     * **********************
     * 将前台传递过来的数据进行分割处理
     * $str string model: '{'+prop+':'+$(this).val()+'}';
     * return array
     * @mark 2012/8/11
     * ********************** */

    function _cutArray($str) {
        $new = explode('{', $str);
        $new2 = explode('}', $new[1]);
        $new3 = explode(':', $new2[0]);

        foreach ($new3 as $key => $val) {
            if ($key != 0) {
                $n[$new3[0]][] = $val;
            }
        }
        return $n;
    }

    /*     * *******************
     * _restrArray 将分割后的数组进行重新构造
     * $array传递过来分割后的数组
     * return array;
     * @mark 2012/8/11
     * ******************** */

    function _restrArray($array) {
        foreach ($array as $key => $val) {
            foreach ($array as $k => $v) {
                if ($val == $v) {
                    foreach ($val as $i => $j) {
                        $new[$i][] = $j[0];
                    }
                }
            }
        }
        return $new;
    }
	/**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $data = $this->request->post();
            $params = $data['row'];
            unset($data['row']);//拿着产品值赋值后删除掉
//            print_r($data);exit;
            $props_name = $this->checkArrayKey($data, 'prop_'); //查找都有哪些规格
            foreach ($props_name as $key => $value) {
                $valArray = explode('_', $value);
                $val = array_filter($data['val_' . $valArray[1]], create_function('$v ', 'return !empty($v);'));    //自动过滤掉为空的值
                $props[$key][$data[$value]] = $val;
                unset($data['val_' . $valArray[1]]);
                unset($data[$value]);
            }
//            print_r($props);exit;//这里是规格名称，要执行保存到数据库中，使用foreach遍历              
//            print_r($data);exit;//规格属性数据处理

            // $shop_id = $params['shop_id'];
            // $shop_name = db('products_shop')->field('name')->where('id','=',$shop_id)->select();
            // $name = $shop_name['0']['name'];
            // print_r($name);exit();


            $params['add_time'] = time();
            $params['deposit'] = '0';
            $b = 'http://image.xiyueyi.cn';
            $min_image = $b.$params['min_image'];
            unset($b);
            unset($params['min_image']);
            $abc = $data['multi']['base'];
            $array2 = array_column($abc, 'weight');
            $minprice = min($array2);
            $maxprice = max($array2);
            $params['min_price'] = $minprice;
            $params['max_price'] = $maxprice;
            unset($abc);
            unset($array2);
            $params['type'] = 'service';
            $a = 'http://image.xiyueyi.cn';
            $title_image = $a.$params['title_image'];
            $detail_image = $a.$params['detail_image'];
            unset($a);
            $params['title_image'] = $title_image;
            $params['detail_image'] = $detail_image;
            if ($params)
            {
                $this->model->save($params);
                $product_id = $this->model->id;
                if($product_id){
                    //规格名称保存数据库
                    $property_ids = $lastCreateStand = $group_ids = array();
                    foreach ($props as $pkey => $pvalue) {
//                        print_r($props);exit;
                        foreach ($pvalue as $pk => $pv) {
                            $t1 = array('property_name'=>$pk,'product_id'=>$product_id);
                            $pr_model = model('Property');                      
                            $property_data = $pr_model->insert($t1);//插入
                            if($property_data){
                                $property_id = $pr_model->getLastInsID();
                                $property_ids[]=$property_id;
                                unset($pr_model);
                                foreach ($pv as $k=>$v){
                                    $t2 = array(
                                        'name'=>$v,
                                        'product_id'=>$product_id,
                                        'property_id'=>$property_id
                                    );
                                    $value_model = model('Propertyvalue');
                                    $propertyvalue_data = $value_model->insert($t2);
                                    $propertyvalue_id = $value_model->getLastInsID();
                                    $lastCreateStand[$property_id][$k]=$propertyvalue_id;
                                    unset($value_model);
                                }
                            }
                        }
                    }
                    //处理规则
                   $array_key = array_keys($lastCreateStand);
                   if (count($lastCreateStand) == 1) {
                           foreach ($lastCreateStand as $key => $val) {
                                   foreach ($val as $tk => $tv) {
                                           $arArray[$tk][] = $tv;
                                   }
                           }
                   } else {
                           //数组重组
                           foreach ($lastCreateStand[$array_key[0]] as $k => $v) {
                                   $newArray[] = $this->_doOP($lastCreateStand, $v);
                           }
                           foreach ($newArray as $key => $val) {
                                   foreach ($val as $ts => $tv) {
                                           $arArray[] = $this->ArrMd2Ud(array_reverse($tv));
                                   }
                           }
                   }
                    //处理多规格属性
                    if (isset($data['multi'])) {
//                        print_r($data['multi']['base']);exit;
                       foreach ($data['multi']['base'] as $key => $value) {
                           //检查规格中的空格
                           foreach($value['stands'] as $k=>$v){
                               if(preg_match('/\s/',$v)){
                                   exit(json_encode(array('status'=>0,'msg'=>'规格属性值['.$v.']中含有空格，请修改')));
                               }
                           }
                           foreach ($arArray[$key] as $s_k=>$s_v){
                               $group_ids[] = $property_ids[$s_k].':'.$s_v;
                           }
                           $product_property_group_id = implode(',', $group_ids);
                           $group_ids = array();//每循环一次把$group_ids值清空
                           $t3 = array(
                               'min_image' => $min_image,
                               'product_property_group_id'=> $product_property_group_id,
                               'stock'=> '999999',
                               'price'=>$value['weight'],
                               'tax'=> '0',
                               'product_id'=>$product_id,
                           );
                           $sku_model = model('Sku');
                           $sku_data = $sku_model->insert($t3);
                           unset($sku_model);
                       }
                   } else {
                       exit(json_encode(array('status'=>0,'msg'=>'请先生成规格')));
                   }
                }
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
        // print_r($ids);exit();
        if ($ids)
        {
            $sql = "SET FOREIGN_KEY_CHECKS=0";
            $key = $this->model->query($sql);
            $count = $this->model->destroy($ids);
            $sku = Db::table('ws_products_sku')->where('product_id','=',$ids)->delete();
            $property = Db::table('ws_products_productproperty')->where('product_id','=',$ids)->delete();
            $Propertyvalue = Db::table('ws_products_productpropertyvalue')->where('product_id','=',$ids)->delete();
            if ($count)
            {
                $this->success();
            }
            $sql2 = "SET FOREIGN_KEY_CHECKS=1";
            $key2 = $this->model->query($sql2);
        }
        $this->error(__('Parameter %s can not be empty', 'ids'));
    }



}
