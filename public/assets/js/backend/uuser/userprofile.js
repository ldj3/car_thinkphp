define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'uuser/userprofile/index',
					edit_url: 'uuser/userprofile/edit',
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
                        {field: 'mobile', title: __('Mobile')},
                        {field: 'fullname', title: __('Fullname')},
                        {field: 'member_level', title: __('Member_level')},
                        {field: 'agency_of_shop_id', title: __('Agency_of_shop_id')},
                        {field: 'hot_agency', title: __("Hot_agency"), formatter: Table.api.formatter.status},
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