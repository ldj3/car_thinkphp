<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\uuser\areaagent\add.html";i:1509177335;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
                                <form id="add-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label for="mobile" class="control-label col-xs-12 col-sm-2"><?php echo __('Mobile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="mobile" name="row[mobile]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="fullname" class="control-label col-xs-12 col-sm-2"><?php echo __('Fullname'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="fullname" name="row[fullname]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="birth_date" class="control-label col-xs-12 col-sm-2"><?php echo __('Birth_date'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="date" class="form-control" id="birth_date" name="row[birth_date]" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="control-label col-xs-12 col-sm-2"><?php echo __('Password'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="password" name="row[password]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-xs-12 col-sm-2"><?php echo __('Email'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="email" name="row[email]" value="" />
        </div>
    </div>
	<div class="form-group">
        <label for="avatar" class="control-label col-xs-12 col-sm-2"><?php echo __('Avatar'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="avatar" class="form-control" size="50" name="row[avatar]" type="text" value="">
                <span><button type="button" id="pluploadtitle-image" class="btn btn-danger plupload" data-input-id="avatar" data-mimetype="image/*" data-multiple="false" data-preview-id="t-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="fachoosetitle-image" class="btn btn-primary fachoose" data-input-id="avatar" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="t-image"></ul>
            </div>
        </div>
    </div>

	<div class="form-group">
        <label for="parent_user_profile_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Parent_user_profile_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="parent_user_profile_id" class="form-control selectpage" data-source="userprofile/selectpage" data-params='{"custom[member_level]":"3"}'  name="row[parent_user_profile_id]" type="text" value="" data-rule="required">
        </div>
    </div>
    <div class="form-group">
        <label for="sex" class="control-label col-xs-12 col-sm-2"><?php echo __('Sex'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[sex]', ['0'=>__('男'), '1'=>__('女')]); ?>
        </div>
    </div>
	<div class="form-group">
        <label for="identity_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Identity_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="identity_id" name="row[identity_id]" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="recommend_user_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Recommend_user_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control selectpage" id="recommend_user_id" data-source="userprofile/selectpage" data-params='{"custom[fullname]"}' name="row[recommend_user_id]" value="" />
        </div>
    </div>
    <div class="form-group">
        <label for="agency_of_shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Agency_of_shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="agency_of_shop_id" class="form-control selectpage" data-source="car/selectpage" data-params='{"custom[type]":"product"}' name="row[agency_of_shop_id]" type="text" value="" data-rule="required">
        </div>
    </div>
    <div class="form-group">
        <label for="hot_agency" class="control-label col-xs-12 col-sm-2"><?php echo __('Hot_agency'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[hot_agency]', ['1'=>__('热门代理商'), '0'=>__('非热门代理商')]); ?>
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