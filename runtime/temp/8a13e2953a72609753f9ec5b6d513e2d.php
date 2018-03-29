<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\check\shoppingorder\edit.html";i:1508928115;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label for="id" class="control-label col-xs-12 col-sm-2"><?php echo __('ID'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="id" name="row[id]" value="<?php echo $row['id']; ?>" data-rule="required;id" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="order_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Order_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="order_name" name="row[order_name]" value="<?php echo $row['order_name']; ?>" data-rule="required;order_name" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="amount" class="control-label col-xs-12 col-sm-2"><?php echo __('Amount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="amount" name="row[amount]" value="<?php echo $row['amount']; ?>" data-rule="required;amount" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="total_pay" class="control-label col-xs-12 col-sm-2"><?php echo __('Total_pay'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="total_pay" name="row[total_pay]" value="<?php echo $row['total_pay']; ?>" data-rule="required;total_pay" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="product_property" class="control-label col-xs-12 col-sm-2"><?php echo __('Product_property'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="product_property" name="row[product_property]" value="<?php echo $row['product_property']; ?>" data-rule="required;product_property" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="deposit" class="control-label col-xs-12 col-sm-2"><?php echo __('Deposit'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="deposit" name="row[deposit]" value="<?php echo $row['deposit']; ?>" data-rule="required;deposit" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="share_score" class="control-label col-xs-12 col-sm-2"><?php echo __('Share_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="share_score" name="row[share_score]" value="<?php echo $row['share_score']; ?>" data-rule="required;share_score" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="quick_score" class="control-label col-xs-12 col-sm-2"><?php echo __('Quick_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="quick_score" name="row[quick_score]" value="<?php echo $row['quick_score']; ?>" data-rule="required;quick_score" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="funny_bean" class="control-label col-xs-12 col-sm-2"><?php echo __('Funny_bean'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="funny_bean" name="row[funny_bean]" value="<?php echo $row['funny_bean']; ?>" data-rule="required;funny_bean" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="show_order_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Show_order_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="show_order_code" name="row[show_order_code]" value="<?php echo $row['show_order_code']; ?>" data-rule="required;show_order_code" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="pay_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Pay_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="pay_code" name="row[pay_code]" value="<?php echo $row['pay_code']; ?>" data-rule="required;pay_code" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="buy_type" class="control-label col-xs-12 col-sm-2"><?php echo __('Buy_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="buy_type" name="row[buy_type]" value="<?php echo $row['buy_type']; ?>" data-rule="required;buy_type" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="deposit_pay" class="control-label col-xs-12 col-sm-2"><?php echo __('Deposit_pay'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="deposit_pay" name="row[deposit_pay]" value="<?php echo $row['deposit_pay']; ?>" data-rule="required;deposit_pay" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="pay_from" class="control-label col-xs-12 col-sm-2"><?php echo __('Pay_from'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="pay_from" name="row[pay_from]" value="<?php echo $row['pay_from']; ?>" data-rule="required;pay_from" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="agency_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Agency_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="agency_id" name="row[agency_id]" value="<?php echo $row['agency_id']; ?>" data-rule="required;agency_id" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="shop_id" name="row[shop_id]" value="<?php echo $row['shop_id']; ?>" data-rule="required;shop_id" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="user_id" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="user_id" name="row[user_id]" value="<?php echo $row['user_id']; ?>" data-rule="required;user_id" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="control-label col-xs-12 col-sm-2"><?php echo __('Price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="price" name="row[price]" value="<?php echo $row['price']; ?>" data-rule="required;price"  />
        </div>
    </div>
    <div class="form-group">
        <label for="tax" class="control-label col-xs-12 col-sm-2"><?php echo __('Tax'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="tax" name="row[tax]" value="<?php echo $row['tax']; ?>" data-rule="required;tax"  />
        </div>
    </div>
    <div class="form-group">
        <label for="contract_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Contract_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="contract_code" name="row[contract_code]" value="<?php echo $row['contract_code']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="buy_contract_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Buy_contract_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="buy_contract_code" name="row[buy_contract_code]" value="<?php echo $row['buy_contract_code']; ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="state" class="control-label col-xs-12 col-sm-2"><?php echo __('State'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[state]', ['auditing'=>__('Auditing'), 'imcomplete'=>__('Imcomplete'),'failed'=>__('Failed'),'success'=>__('Success'),'nopass'=>__('Nopass'),'consumed'=>__('Consumed')], $row['state']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" id="btnsubmit" onclick="formsubmit()"  class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">
    function formsubmit() {
        var state = $('input:radio[name="row[state]"]:checked').val();
        var id = $('input:text[name="row[id]"]').val();
        var price = $('input:text[name="row[price]"]').val();
        var tax = $('input:text[name="row[tax]"]').val();
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            // url: "http://192.168.31.111:8008/verify/order/",
            url: "http://api.xiyueyi.cn:8687/verify/order/",
            data: {state:state,order_id:id,price:price,tax:tax},
            success: function(resp) {
                    Form.api.bindevent($("form[role=form]"));
                    Controller.api.bindevent();
            },
            error: function(error) {
                return false;
            }
        });
    }

</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>