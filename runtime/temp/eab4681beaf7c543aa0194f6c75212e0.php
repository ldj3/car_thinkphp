<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\check\claim\edit.html";i:1509515763;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
        <label for="claimer_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Claimer'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="claimer_name" name="row[claimer_name]" value="<?php echo $row['claimer_name']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="boss_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Boss'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="boss_name" name="row[boss_name]" value="<?php echo $row['boss_name']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="claim_product_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Claim_product_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="claim_product_id" name="row[claim_product_id]" value="<?php echo $row['claim_product_id']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="money" class="control-label col-xs-12 col-sm-2"><?php echo __('Money'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="money" name="row[money]" value="<?php echo $row['money']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="car_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Car_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="car_id" name="row[car_id]" value="<?php echo $row['car_id']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="remain_periods" class="control-label col-xs-12 col-sm-2"><?php echo __('Remain_periods'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="remain_periods" name="row[remain_periods]" value="<?php echo $row['remain_periods']; ?>" disabled="disabled" data-rule="required" />
        </div>
    </div>
	<div class="form-group">
        <label for="order_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Order_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="order_code" name="row[order_code]" value="<?php echo $row['order_code']; ?>" disabled="disabled" data-rule="required" />
        </div>
    </div>
	<div class="form-group">
        <label for="from_order" class="control-label col-xs-12 col-sm-2"><?php echo __('From_order'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="from_order" name="row[from_order]" value="<?php echo $row['from_order']; ?>" disabled="disabled" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="contract_code" class="control-label col-xs-12 col-sm-2"><?php echo __('Contract_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="contract_code" name="row[contract_code]" value="<?php echo $row['contract_code']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="state" class="control-label col-xs-12 col-sm-2"><?php echo __('State'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[state]', ['reviewed'=>__('Reviewed'), 'success'=>__('Success'),'faild'=>__('Faild')], $row['state']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">
    function formsubmit() {
        var state = $('input:radio[name="row[state]"]:checked').val();
        var id = $('input:text[name="row[id]"]').val();
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            // url: "http://192.168.31.111:8008/verify/order/",
            url: "http://api.xiyueyi.cn:8687/verify/order/",
            data: {state:state,claim_order_id:id},
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