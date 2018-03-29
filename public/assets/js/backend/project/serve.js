define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'project/serve/index',
                    add_url: 'project/serve/add',
                    edit_url: 'project/serve/edit',
                    del_url: 'project/car/del',
                    multi_url: 'project/serve/multi',
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
                        {field: 'name', title: __('Name')},
                        {field: 'title', title: __('Title')},
                        {field: 'sales', title: __('Sales')},
                        {field: 'title_image', title: __('Title_image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'detail_image', title: __('Detail_image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'is_hot', title: __('Is_hot'),operate: false, formatter: Table.api.formatter.status},
                        {field: 'is_Preferential', title: __('Is_Preferential'),operate: false, formatter: Table.api.formatter.status},
                        {field: 'is_off', title: __('Is_off'),operate: false, formatter: Table.api.formatter.status},
                        {field: 'shop_id', title: __('Shop_id'), operate: '='},
                        {field: 'shop_name', title: __('Shop_id'), operate: '='},
                        {field: 'add_time', title: __('Add time'), formatter: Table.api.formatter.datetime},
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