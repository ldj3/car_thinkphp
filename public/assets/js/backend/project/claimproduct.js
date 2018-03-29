define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'project/claimproduct/index',
                    add_url: 'project/claimproduct/add',
                    edit_url: 'project/claimproduct/edit',
                    del_url: 'project/claimproduct/del',
                    multi_url: 'project/claimproduct/multi',
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
                        {field: 'money', title: __('Money')},
                        {field: 'remain_periods', title: __('Remain_periods')},
                        {field: 'periods_money', title: __('Periods_money')},
                        {field: 'off_shelf', title: __('Off_shelf'),operate: false, formatter: Table.api.formatter.status},
                        {field: 'is_hot', title: __('Is_hot'),operate: false, formatter: Table.api.formatter.status},
                        {field: 'order_id', title: __('Order_id')},
                        {field: 'user_id', title: __('User_id')},
                        {field: 'created_time', title: __('Created_time'), formatter: Table.api.formatter.datetime},
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
    };
    return Controller;
});