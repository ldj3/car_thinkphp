<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\project\car\edit.html";i:1509176999;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
        <label for="name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="name" name="row[name]" value="<?php echo $row['name']; ?>" data-rule="required" />
        </div>
    </div>
	<div class="form-group">
        <label for="title" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="title" name="row[title]" value="<?php echo $row['title']; ?>" data-rule="required;title" />
        </div>
    </div>
	<div class="form-group">
        <label for="sales" class="control-label col-xs-12 col-sm-2"><?php echo __('Sales'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="sales" name="row[sales]" value="<?php echo $row['sales']; ?>" data-rule="required;sales" />
        </div>
    </div>
	<div class="form-group">
        <label for="title_image" class="control-label col-xs-12 col-sm-2"><?php echo __('Title_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="title_image" class="form-control" size="50" name="row[title_image]" type="text" value="<?php echo $row['title_image']; ?>">
                <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="title_image" data-mimetype="image/*" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="title_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="p-image"></ul>
            </div>
        </div>
    </div>
	<div class="form-group">
        <label for="detail_image" class="control-label col-xs-12 col-sm-2"><?php echo __('Detail_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="detail_image" class="form-control" size="50" name="row[detail_image]" type="text" value="<?php echo $row['detail_image']; ?>">
                <span><button type="button" id="dplupload-image" class="btn btn-danger plupload" data-input-id="detail_image" data-mimetype="image/*" data-multiple="false" data-preview-id="d-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="dfachoose-image" class="btn btn-primary fachoose" data-input-id="detail_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="d-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="deposit" class="control-label col-xs-12 col-sm-2"><?php echo __('Deposit'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="deposit" name="row[deposit]" value="<?php echo $row['deposit']; ?>" data-rule="required;deposit" />
        </div>
    </div>
    <div class="form-group">
        <label for="shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="shop_id" class="form-control selectpage" data-source="car/selectpage" data-params='{"custom[type]":"product"}' name="row[shop_id]" type="text" value="<?php echo $row['shop_id']; ?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="is_hot" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_hot'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_hot]', ['0'=>__('否'),'1'=>__('是')], $row['is_hot']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="is_Preferential" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_Preferential'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_Preferential]', ['0'=>__('否'),'1'=>__('是')], $row['is_Preferential']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="is_off" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_off'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_off]', ['0'=>__('否'),'1'=>__('是')], $row['is_off']); ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>