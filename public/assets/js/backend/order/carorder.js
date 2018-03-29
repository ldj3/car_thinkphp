define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/carorder/index',
					edit_url: 'order/carorder/edit',
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
                        {field: 'order_name', title: __('Order_name')},
                        {field: 'amount', title: __('Amount')},
                        {field: 'price', title: __('Price')},
                        {field: 'tax', title: __('Tax')},
                        {field: 'total_pay', title: __('Total_pay')},
                        {field: 'product_property', title: __('Product_property')},
						{field: 'deposit', title: __('Deposit')},
						{field: 'deposit_pay', title: __('Deposit_pay'),operate: false, formatter: Table.api.formatter.status},
						{field: 'share_score', title: __('Share_score')},
						{field: 'quick_score', title: __('Quick_score')},
						{field: 'funny_bean', title: __('Funny_bean')},
						{field: 'created_time', title: __('Created_time'), formatter: Table.api.formatter.datetime},
						{field: 'buy_type', title: __('Buy_type'),operate: false, formatter: Table.api.formatter.status},
						{field: 'show_order_code', title: __('Show_order_code')},
						{field: 'pay_code', title: __('Pay_code')},
						{field: 'pay_from', title: __('Pay_from'),operate: false, formatter: Table.api.formatter.status},
						{field: 'agency_id', title: __('Agency_id')},
						{field: 'shop_id', title: __("Shop_id")},
						{field: 'user_id', title: __('User_id')},
                        {field: 'contract_code', title: __('Contract_code')},
                        {field: 'state', title: __('State'),operate: false, formatter: Table.api.formatter.flag},
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