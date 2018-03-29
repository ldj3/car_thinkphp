<?php

namespace app\admin\controller\advertise;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Banner extends Backend
{

    protected $searchFields = 'title,index';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Banner');
        
    }



    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            $params['add_time'] = date("Y-m-d");
            $a = 'http://image.xiyueyi.cn';
            $image = $a.$params['image'];
            $detail_image = $a.$params['detail_image'];
            unset($a);
            $params['image'] = $image;
            $params['detail_image'] = $detail_image;
            $params['url'] = $detail_image;
            if ($params)
            {
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
            $image = $params['image'];
            $detail_image = $params['detail_image'];
            
            if (strpos($image, 'image.xiyueyi.cn')) {
              $params['image'] = $image;
            }else {
              $a = 'http://image.xiyueyi.cn';
              $image = $a.$params['image'];
              unset($a);
              $params['image'] = $image;
            }

            if (strpos($detail_image, 'image.xiyueyi.cn')) {
              $params['detail_image'] = $detail_image;
            }else {
              $a = 'http://image.xiyueyi.cn';
              $detail_image = $a.$params['detail_image'];
              unset($a);
              $params['detail_image'] = $detail_image;
            }
            $params['url'] = $detail_image;
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
