define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'platform/platformwealth/index',
                    add_url: 'platform/platformwealth/add',
                    edit_url: 'platform/platformwealth/edit',
                    del_url: 'platform/platformwealth/del',
                    multi_url: 'platform/platformwealth/multi',
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
                        {field: 'all_funny_beans', title: __('All_funny_beans')},
                        {field: 'all_share_score', title: __('All_share_score')},
                        {field: 'all_quick_score', title: __('All_quick_score')},
                        {field: 'mon_share_score', title: __('Mon_share_score')},
                        {field: 'mon_quick_score', title: __('Mon_quick_score')},
						{field: 'cur_date', title: __('Cur_date'), formatter: Table.api.formatter.datetime},
                        {field: 'day_withdraw_money', title: __('Day_withdraw_money')},
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