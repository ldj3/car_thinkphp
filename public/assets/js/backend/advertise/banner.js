define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'advertise/banner/index',
                    add_url: 'advertise/banner/add',
                    edit_url: 'advertise/banner/edit',
                    del_url: 'advertise/banner/del',
                    multi_url: 'advertise/banner/multi',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                escape: true,
                search: true,
                pk: 'id',
                pagination: true,
                pageList: [10, 20, 50, 'All'],
                commonSearch: true,
                columns: [
                    [
                        {field: 'state', checkbox: true, },
                        {field: 'id', title: __('ID')},
                        {field: 'title', title: __('Title')},
                        {field: 'image', title: __('Image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'detail_image', title: __('Detail_image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'url', title: __('Url')},
                        {field: 'index', title: __('Index')},
                        {field: 'add_time', title: __('Add_time')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Form.api.bindevent($("form[role=form]"));
        },
        edit: function () {
            Form.api.bindevent($("form[role=form]"));
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                $(document).on("change", "#c-type", function () {
                    $("#c-pid option[data-type='all']").prop("selected", true);
                    $("#c-pid option").removeClass("hide");
                    $("#c-pid option[data-type!='" + $(this).val() + "'][data-type!='all']").addClass("hide");
                    $("#c-pid").selectpicker("refresh");
                });
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});