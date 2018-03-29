<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\project\serve\add.html";i:1509177611;s:78:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\layout\default.html";i:1502881244;s:75:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\meta.html";i:1502881244;s:77:"E:\phpStudy\WWW\fastadmin\public/../application/admin\view\common\script.html";i:1502881244;}*/ ?>
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
                                <script type="text/javascript" language="javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<form id="add-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="name" name="row[name]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="title" name="row[title]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="sales" class="control-label col-xs-12 col-sm-2"><?php echo __('Sales'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="sales" name="row[sales]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="title_image" class="control-label col-xs-12 col-sm-2"><?php echo __('Title_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="title_image" class="form-control" size="50" name="row[title_image]" type="text" value="">
                <span><button type="button" id="pluploadtitle-image" class="btn btn-danger plupload" data-input-id="title_image" data-mimetype="image/*" data-multiple="false" data-preview-id="t-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="fachoosetitle-image" class="btn btn-primary fachoose" data-input-id="title_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="t-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="detail_image" class="control-label col-xs-12 col-sm-2"><?php echo __('Detail_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="detail_image" class="form-control" size="50" name="row[detail_image]" type="text" value="">
                <span><button type="button" id="dpluploaddetail-image" class="btn btn-danger plupload" data-input-id="detail_image" data-mimetype="image/*" data-multiple="false" data-preview-id="d-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="dachoosedetail-image" class="btn btn-primary fachoose" data-input-id="detail_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="d-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="min_image" class="control-label col-xs-12 col-sm-2"><?php echo __('Min_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="form-inline">
                <input id="min_image" class="form-control" size="50" name="row[min_image]" type="text" value="">
                <span><button type="button" id="mpluploaddetail-image" class="btn btn-danger plupload" data-input-id="min_image" data-mimetype="image/*" data-multiple="false" data-preview-id="m-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                <span><button type="button" id="mfachoosedetail-image" class="btn btn-primary fachoose" data-input-id="min_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                <ul class="row list-inline plupload-preview" id="m-image"></ul>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="shop_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Shop_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="shop_id" class="form-control selectpage" data-source="car/selectpage" data-params='{"custom[type]":"service"}' name="row[shop_id]" type="text" value="" >
        </div>
    </div>
    <div class="form-group">
        <label for="is_hot" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_hot'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_hot]', ['0'=>__('否'),'1'=>__('是')]); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="is_Preferential" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_Preferential'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_Preferential]', ['0'=>__('否'),'1'=>__('是')]); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="is_off" class="control-label col-xs-12 col-sm-2"><?php echo __('Is_off'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[is_off]', ['0'=>__('否'),'1'=>__('是')]); ?>
        </div>
    </div>
    <div class="form-frame-body" style="width:1180px;">
    <table width="100%"  cellpadding="0" cellspacing="0">
        <tr>
            <td class="form-frame-lab">属性：</td>
            <td style="width:auto">       
            <table width="100%" class="form-table gg-table" cellpadding="0" cellspacing="0" id="standsTable" style="width:100%; border-top:0;">
                <thead>
                <tr>
                    <td width="120" align="center" style="background:#e5e5e5;">
                        <div style="width:120px;">属性名称<span style="color:#999999">(如：颜色)</span></div>
                    </td>
                    <td style="background:#e5e5e5;">
                        属性值<span style="color:#999999">(如：红色)</span>
                    </td>
                </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td>&emsp;</td>
                        <td>
                            <input type="button"  class="l-button" style="float:left" value="添加规格"  id="addStand"  />
                            <input type="button"  id="delStand" style="float:left; margin-left:10px;" class="l-button"  value="删除规格" >
                            <input type="button" value="生成规格" style="float:left; margin-left:10px;" class="l-button btn-info" id="standSave">
                        </td>
                    </tr>
                </tfoot>
            </table>
            <!-- -->        
            </td>
        </tr>

        <tr>
            <td class="form-frame-lab">属性值：<h4 style="color: red">库存，手续费不用填</h4></td>
            <td style="width:auto">
            <table width="100%" class="form-table gg-table" cellpadding="0" cellspacing="0" id="standsAttrTable" style="width:100%; border-top:0;">
            </table>
        </tr>

    </table>

    <div id="car_ss"></div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" id="gget_id" class="btn btn-success btn-embossed"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>

</form>

<style>

.notdbo td{ border-width:0;}

#standsTable td{
    width:auto;
}
#m_goods_cargos_cont td{
    border-bottom:1px solid #CCC;
}
</style>
<script>
$(function(){
    if(window.MULTI_STANDS_INITED) return;
    window.MULTI_STANDS_INITED = true;
    var $standsRows = $('#standsTable tbody');
    var addStandRow = function(){
        var tr_num=$standsRows.find('tr').size();
        var $tr = $("<tr><td  align='center' ><input type='text' class='field' style='width:50px;' name='prop_"+tr_num+"'></td></tr>");
        var $val_td = $('<td></td>');
        for(var i=1;i<=8;i++){
            $val_td.append(
                $('<input />').addClass('field').css({width:80,marginRight:5})
                                          .attr({type:'text',name:'val_'+tr_num + '[]'})
            );
        }
        $standsRows.append($tr.append($val_td));
        
    }
    //
    addStandRow();
    
    $("#addStand").click(function(){ addStandRow();});

    $("#delStand").click(function()
    {
        if($standsRows.find('tr').size() > 1){
            $standsRows.find('tr:last-child').remove(); 
        }
    });
    $("#standSave").click(function()
    {
        var s = $standsRows.find('tr').size();
        var stand_val = new Array();
        for(var i=0;i<s;i++)
        {
            var cur = i;
            var prop = $("input[name='prop_"+cur+"']").val();
            stand_val[i] = new Array();
            $("input[name='val_"+cur+"[]']").each(function(m)
            {
                if($(this).val() !='')
                {
                  stand_val[i][m] = '{'+prop+':'+$(this).val()+'}'; 
                }
            });
        }
        var url='project/Car/getMultiStands';
        var params='stand_val='+stand_val;
        $.ajax({
            type: "post",
            url: url,
            data:params,
            success: function(result)
            {
                $('#car_ss').html(result);
            },
            error: function()
            {
              return false;
            }
        });     
    });
});
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