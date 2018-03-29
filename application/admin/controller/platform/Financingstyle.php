<?php

namespace app\admin\controller\platform;

use app\common\controller\Backend;
use fast\Random;
use fast\Tree;

/**
 * 管理员管理
 *
 * @icon fa fa-users
 * @remark 一个管理员可以有多个角色组,左侧的菜单根据管理员所拥有的权限进行生成
 */
class Financingstyle extends Backend
{

    protected $model = null;
    protected $categorylist = [];
    protected $noNeedRight = ['selectpage'];
    protected $searchFields = 'title,add_time';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Financingstyle');
        
    }


    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost())
        {
            $params = $this->request->post("row/a");
            // $params['eventkey'] = isset($params['eventkey']) && $params['eventkey'] ? $params['eventkey'] : uniqid();
            // $params['content'] = json_encode($params['content']);
            $params['add_time'] = date("Y-m-d");
            $a = 'http://image.xiyueyi.cn';
            $params['image'] = $a.$params['image'];
            $params['icon_image'] = $a.$params['icon_image'];
            unset($a);
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
            $icon_image = $params['icon_image'];
            
            if (strpos($icon_image, 'image.xiyueyi.cn')) {
              $params['icon_image'] = $icon_image;
            }else {
              $a = 'http://image.xiyueyi.cn';
              $icon_image = $a.$params['icon_image'];
              unset($a);
              $params['icon_image'] = $icon_image;
            }
            if (strpos($params['image'], 'image.xiyueyi.cn')) {
              $params['image'] = $params['image'];
            }else {
              $a = 'http://image.xiyueyi.cn';
              $params['image'] = $a.$params['image'];
            }
            unset($a);
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
