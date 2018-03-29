<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\check\userauthenticate\edit.html";i:1508989233;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
        <label for="id_card_location1" class="control-label col-xs-12 col-sm-2"><?php echo __('Id_card_location1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="id_card_location1" class="form-control" size="50" name="row[id_card_location1]" type="text" value="<?php echo $row['id_card_location1']; ?>" disabled="disabled">
                <span><button type="button" id="5plupload-image" class="btn btn-danger plupload" data-input-id="id_card_location1" data-mimetype="image/*" data-multiple="false" data-preview-id="5-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="5fachoose-image" class="btn btn-primary fachoose" data-input-id="id_card_location1" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="5-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="id_card_location2" class="control-label col-xs-12 col-sm-2"><?php echo __('Id_card_location2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="id_card_location2" class="form-control" size="50" name="row[id_card_location2]" type="text" value="<?php echo $row['id_card_location2']; ?>" disabled="disabled">
                <span><button type="button" id="2plupload-image" class="btn btn-danger plupload" data-input-id="id_card_location2" data-mimetype="image/*" data-multiple="false" data-preview-id="2-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="2fachoose-image" class="btn btn-primary fachoose" data-input-id="id_card_location2" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="2-image"></ul>
            </div>
        </div>
    </div>
	<div class="form-group" style="display:none">
        <label for="user_id" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="user_id" name="row[user_id]" value="<?php echo $row['user_id']; ?>" data-rule="required;user_id" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="user_name" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="user_name" name="row[user_id]" value="<?php echo $row['user_name']; ?>" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['0'=>__('已提交'), '1'=>__('未通过'),'2'=>__('已通过')], $row['status']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit"  id="btnsubmit" onclick="formsubmit()" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">
    function formsubmit() {
        var status = $('input:radio[name="row[status]"]:checked').val();
        var user_id = $('input:text[name="row[user_id]"]').val();
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            url: "http://api.xiyueyi.cn:8687/verify/userVIP/",
            data: {state: status,user_id:user_id},
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