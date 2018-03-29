<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\check\agency\edit.html";i:1509093905;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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

    <div class="form-group" style="display: none;">
        <label for="id" class="control-label col-xs-12 col-sm-2"><?php echo __('ID'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="id" name="row[id]" value="<?php echo $row['id']; ?>" data-rule="required;id" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="file1" class="control-label col-xs-12 col-sm-2"><?php echo __('File1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="file1" class="form-control" size="50" name="row[file1]" type="text" value="<?php echo $row['file1']; ?>" disabled="disabled">
                <span><button type="button" id="1plupload-image" class="btn btn-danger plupload" data-input-id="file1" data-mimetype="image/*" data-multiple="false" data-preview-id="1-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="1fachoose-image" class="btn btn-primary fachoose" data-input-id="file1" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="1-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="file2" class="control-label col-xs-12 col-sm-2"><?php echo __('File2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="file2" class="form-control" size="50" name="row[file2]" type="text" value="<?php echo $row['file2']; ?>" disabled="disabled">
                <span><button type="button" id="2plupload-image" class="btn btn-danger plupload" data-input-id="file2" data-mimetype="image/*" data-multiple="false" data-preview-id="2-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="2fachoose-image" class="btn btn-primary fachoose" data-input-id="file2" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="2-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="file3" class="control-label col-xs-12 col-sm-2"><?php echo __('File3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="file3" class="form-control" size="50" name="row[file3]" type="text" value="<?php echo $row['file3']; ?>" disabled="disabled">
                <span><button type="button" id="3plupload-image" class="btn btn-danger plupload" data-input-id="file3" data-mimetype="image/*" data-multiple="false" data-preview-id="3-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="3fachoose-image" class="btn btn-primary fachoose" data-input-id="file3" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="3-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="file4" class="control-label col-xs-12 col-sm-2"><?php echo __('File4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="file4" class="form-control" size="50" name="row[file4]" type="text" value="<?php echo $row['file4']; ?>" disabled="disabled">
                <span><button type="button" id="4plupload-image" class="btn btn-danger plupload" data-input-id="file4" data-mimetype="image/*" data-multiple="false" data-preview-id="4-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="4fachoose-image" class="btn btn-primary fachoose" data-input-id="file4" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="4-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="file5" class="control-label col-xs-12 col-sm-2"><?php echo __('File5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="file5" class="form-control" size="50" name="row[file5]" type="text" value="<?php echo $row['file5']; ?>" disabled="disabled">
                <span><button type="button" id="5plupload-image" class="btn btn-danger plupload" data-input-id="file5" data-mimetype="image/*" data-multiple="false" data-preview-id="5-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="5fachoose-image" class="btn btn-primary fachoose" data-input-id="file5" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="5-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="state" class="control-label col-xs-12 col-sm-2"><?php echo __('State'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[state]', ['commited'=>__('Commited'), 'success'=>__('Success'),'faild'=>__('Faild')], $row['state']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" id="btnsubmit" onclick="formsubmit()" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
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
            url: "http://api.xiyueyi.cn:8687/verify/agencyOrder/",
            data: {state: state,verify_data_id:id},
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