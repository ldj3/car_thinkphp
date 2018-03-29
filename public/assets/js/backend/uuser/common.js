define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'uuser/common/index',
                    add_url: 'uuser/common/add',
                    edit_url: 'uuser/common/edit',
                    multi_url: 'uuser/common/multi',
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
                        {checkbox: true, },
                        {field: 'id', title: 'ID'},
                        {field: 'mobile', title:  __('Mobile')},
                        {field: 'fullname', title: __('Fullname')},
                        {field: 'email', title:  __('Email')},
                        {field: 'birth_date', title: __("Birth_date")},
                        {field: 'recommend_code', title: __("Recommend_code")},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Form.api.bindevent($("form[role=form]"), function (data) {
                Fast.api.close(data);
            });
            Controller.api.bindevent();
        },
        edit: function () {
            Form.api.bindevent($("form[role=form]"));
            Controller.api.bindevent();
        },
    };
    return Controller;
});