<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\uuser\userprofile\edit.html";i:1507449972;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
        <label for="mobile" class="control-label col-xs-12 col-sm-2"><?php echo __('Mobile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="mobile" name="row[mobile]" value="<?php echo $row['mobile']; ?>" data-rule="required;mobile" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="fullname" class="control-label col-xs-12 col-sm-2"><?php echo __('Fullname'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="fullname" name="row[fullname]" value="<?php echo $row['fullname']; ?>" data-rule="required;fullname" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="member_level" class="control-label col-xs-12 col-sm-2"><?php echo __('Member_level'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="member_level" name="row[member_level]" value="<?php echo $row['member_level']; ?>" data-rule="required;member_level" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="agency_of_shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Agency_of_shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="agency_of_shop_id" name="row[agency_of_shop_id]" value="<?php echo $row['agency_of_shop_id']; ?>" data-rule="required;agency_of_shop_id" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="hot_agency" class="control-label col-xs-12 col-sm-2"><?php echo __('Hot_agency'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[hot_agency]', ['0'=>__('否'), '1'=>__('是')], $row['hot_agency']); ?>
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