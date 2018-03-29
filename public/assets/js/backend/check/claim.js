define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'check/claim/index',
                    edit_url: 'check/claim/edit',
                    del_url: '',
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
                        {field: 'contract_code', title: __('Contract_code')},
                        {field: 'claimer_name', title: __('Claimer')},
                        {field: 'boss_name', title: __('Boss')},
                        {field: 'claim_product_id', title: __('Claim_product_id')},
                        {field: 'money', title: __('Money')},
                        {field: 'remain_periods', title: __("Remain_periods")},
                        {field: 'order_code', title: __("Order_code")},
                        {field: 'car_id', title: __("Car_id")},
                        {field: 'from_order', title: __("From_order")},
                        {field: 'created_time', title: __('Created_time'), formatter: Table.api.formatter.datetime},
                        {field: 'state', title: __('State'),operate: false, formatter: Table.api.formatter.flag},
                        {field: 'operate', title: __('Operate'), table: table,
                                events: Table.api.events.operate,
                                formatter: Table.api.formatter.operate
                            }
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