<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\uuser\merchant\edit.html";i:1509177479;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
            <input type="text" class="form-control" id="mobile" name="row[mobile]" value="<?php echo $row['mobile']; ?>" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="fullname" class="control-label col-xs-12 col-sm-2"><?php echo __('Fullname'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="fullname" name="row[fullname]" value="<?php echo $row['fullname']; ?>" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="birth_date" class="control-label col-xs-12 col-sm-2"><?php echo __('Birth_date'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="date" class="form-control" id="birth_date" name="row[birth_date]" value="<?php echo $row['birth_date']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="avatar" class="control-label col-xs-12 col-sm-2"><?php echo __('Avatar'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="avatar" class="form-control" size="50" name="row[avatar]" type="text" value="<?php echo $row['avatar']; ?>">
                <span><button type="button" id="pluploadtitle-image" class="btn btn-danger plupload" data-input-id="avatar" data-mimetype="image/*" data-multiple="false" data-preview-id="t-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="fachoosetitle-image" class="btn btn-primary fachoose" data-input-id="avatar" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="t-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="sex" class="control-label col-xs-12 col-sm-2"><?php echo __('Sex'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[sex]', ['0'=>__('男'), '1'=>__('女')], $row['sex']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="identity_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Identity_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="identity_id" name="row[identity_id]" value="<?php echo $row['identity_id']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="is_shop_account" class="control-label col-xs-12 col-sm-2"><?php echo __('是否降级为普通用户'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_shop_account]', ['1'=>__('否'), '0'=>__('是')], $row['is_shop_account']); ?>
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