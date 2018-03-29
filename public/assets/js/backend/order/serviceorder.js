define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/serviceorder/index',
					edit_url: 'order/serviceorder/edit',
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
                        {field: 'product_property', title: __('Product_property')},
						{field: 'created_time', title: __('Created_time'), formatter: Table.api.formatter.datetime},
						{field: 'show_order_code', title: __('Show_order_code')},
						{field: 'pay_code', title: __('Pay_code')},
						{field: 'pay_from', title: __('Pay_from'),operate: false, formatter: Table.api.formatter.status},
						{field: 'shop_id', title: __("Shop_id")},
						{field: 'user_id', title: __('User_id')},
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