define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'check/withdraw/index',
					edit_url: 'check/withdraw/edit',
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
                        {field: 'user_id', title: __('User_id')},
                        {field: 'fullname', title: __('Fullname')},
                        {field: 'mobile', title: __('Mobile')},
                        {field: 'member_level', title: __('Member_level')},
						{field: 'fee', title: __('Fee')},
						{field: 'money', title: __('Money')},
                        {field: 'bank_card_num', title: __('Bank_card_num')},
                        {field: 'withdraw_number', title: __('Withdraw_number')},
                        {field: 'state', title: __('State'),operate: false, formatter: Table.api.formatter.flag},
                        {field: 'remarks', title: __('Remarks')},
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