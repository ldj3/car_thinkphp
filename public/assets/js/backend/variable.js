define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'variable/index',
                    edit_url: 'variable/edit',
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
                        {field: 'id', title: 'ID'},
                        {field: 'withdraw_fee_mul', title: __('Withdraw_fee_mul')},
                        {field: 'withdraw_fee_plus', title: __('Withdraw_fee_plus')},
                        {field: 'all_return_cycle', title: __('All_return_cycle')},
                        {field: 'brokerage_proportion', title: __('Brokerage_proportion')},
                        {field: 'car_threshold', title: __('Car_threshold')},
                        {field: 'high_fixed_commission', title: __("High_fixed_commission")},
						{field: 'low_fixed_commission', title: __("Low_fixed_commission")},
						{field: 'brokerage_return_cycle', title: __("Brokerage_return_cycle")},
						{field: 'commission_proportion_between_agents', title: __("Commission_proportion_between_agents")},
                        {field: 'first_pay_proportion', title: __("First_pay_proportion")},
                        {field: 'online_pay_threshold', title: __("Online_pay_threshold")},
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