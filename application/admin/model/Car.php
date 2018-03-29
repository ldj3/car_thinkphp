<?php

namespace app\admin\model;

use think\Model;
use think\Session;

class Car extends Model
{

    
    protected $table = 'ws_products_product';

	
	public function shopcar()
    {
        return $this->belongsTo('Shopcar', 'shop_id')->setEagerlyType(0);
    }


}
