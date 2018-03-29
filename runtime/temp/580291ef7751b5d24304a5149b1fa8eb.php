<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\check\agencyauthenticate\edit.html";i:1509328919;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
        <label for="company_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Company_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="company_name" name="row[company_name]" value="<?php echo $row['company_name']; ?>" data-rule="required" disabled="disabled" />
        </div>
    </div>
	<div class="form-group">
        <label for="company_address" class="control-label col-xs-12 col-sm-2"><?php echo __('Company_address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="company_address" name="row[company_address]" value="<?php echo $row['company_address']; ?>" data-rule="required" disabled="disabled"/>
        </div>
    </div>
    <div class="form-group">
        <label for="AgencyPicID1" class="control-label col-xs-12 col-sm-2"><?php echo __('AgencyPicID1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="AgencyPicID1" class="form-control" size="50" name="row[AgencyPicID1]" type="text" value="<?php echo $row['AgencyPicID1']; ?>" disabled="disabled">
                <span><button type="button" id="1plupload-image" class="btn btn-danger plupload" data-input-id="AgencyPicID1" data-mimetype="image/*" data-multiple="false" data-preview-id="1-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="1fachoose-image" class="btn btn-primary fachoose" data-input-id="AgencyPicID1" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="1-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="AgencyPicID2" class="control-label col-xs-12 col-sm-2"><?php echo __('AgencyPicID2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="AgencyPicID2" class="form-control" size="50" name="row[AgencyPicID2]" type="text" value="<?php echo $row['AgencyPicID2']; ?>" disabled="disabled">
                <span><button type="button" id="2plupload-image" class="btn btn-danger plupload" data-input-id="AgencyPicID2" data-mimetype="image/*" data-multiple="false" data-preview-id="2-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="2fachoose-image" class="btn btn-primary fachoose" data-input-id="AgencyPicID2" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="2-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="AgencyPicID3" class="control-label col-xs-12 col-sm-2"><?php echo __('AgencyPicID3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="AgencyPicID3" class="form-control" size="50" name="row[AgencyPicID3]" type="text" value="<?php echo $row['AgencyPicID3']; ?>" disabled="disabled">
                <span><button type="button" id="3plupload-image" class="btn btn-danger plupload" data-input-id="AgencyPicID3" data-mimetype="image/*" data-multiple="false" data-preview-id="3-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="3fachoose-image" class="btn btn-primary fachoose" data-input-id="AgencyPicID3" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="3-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="AgencyPicID4" class="control-label col-xs-12 col-sm-2"><?php echo __('AgencyPicID4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="AgencyPicID4" class="form-control" size="50" name="row[AgencyPicID4]" type="text" value="<?php echo $row['AgencyPicID4']; ?>" disabled="disabled">
                <span><button type="button" id="4plupload-image" class="btn btn-danger plupload" data-input-id="AgencyPicID4" data-mimetype="image/*" data-multiple="false" data-preview-id="4-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="4fachoose-image" class="btn btn-primary fachoose" data-input-id="AgencyPicID4" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="4-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="AgencyPicID5" class="control-label col-xs-12 col-sm-2"><?php echo __('AgencyPicID5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="AgencyPicID5" class="form-control" size="50" name="row[AgencyPicID5]" type="text" value="<?php echo $row['AgencyPicID5']; ?>" disabled="disabled">
                <span><button type="button" id="5plupload-image" class="btn btn-danger plupload" data-input-id="AgencyPicID5" data-mimetype="image/*" data-multiple="false" data-preview-id="5-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="5fachoose-image" class="btn btn-primary fachoose" data-input-id="AgencyPicID5" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="5-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="user_name" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="user_name" name="row[user_name]" value="<?php echo $row['user_name']; ?>" disabled="disabled" />
        </div>
    </div>
    <div class="form-group">
        <label for="level" class="control-label col-xs-12 col-sm-2"><?php echo __('Level'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_select('row[level]', ['0'=>__('普通用户'), '1'=>__('会员'), '2'=>__('区级代理商'), '3'=>__('市级代理商')], $row['level'], ['id'=>'level','class'=>'form-control selectpicker','data-rule'=>'required']); ?>
        </div>
    </div>
    <div class="form-group" style="display: none;">
        <label for="user_id" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="user_id" name="row[user_id]" value="<?php echo $row['user_id']; ?>" disabled="disabled" />
        </div>
    </div>
	<div class="form-group"> 
        <label for="shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control selectpage" id="shop_id" name="row[shop_id]" data-source="car/selectpage" data-params='{"custom[type]":"product"}' value="<?php echo $row['shop_id']; ?>" data-rule="required:shop_id" />
        </div>
    </div>
    <div class="form-group">
        <label for="parent_agency_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Parent_agency_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control selectpage" id="parent_agency_id" name="row[parent_agency_id]" data-source="userprofile/selectpage" data-params='{"custom[member_level]":"3"}' value="<?php echo $row['parent_agency_id']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="remark" class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="remark" name="row[remark]" value="<?php echo $row['remark']; ?>" />
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
            <button type="submit" id="btnsubmit" onclick="formsubmit()"  class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

<script type="text/javascript">

    

    function formsubmit() {
        var state = $('input:radio[name="row[status]"]:checked').val();
        var user_id = $('input:text[name="row[user_id]"]').val();
        var remark = $('input:text[name="row[remark]"]').val();
        var shop_id = $("#shop_id").val();
        var level = $("#level").val();
        var parent_agency_id = $("#parent_agency_id").val();
        $.ajax({

            type: 'PUT',
            dataType: 'json',
            url: "http://api.xiyueyi.cn:8687/verify/userAgency/",
            data: {state: state,remark:remark,shop_id:shop_id,level:level,parent_agency_id:parent_agency_id,user_id:user_id},
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