define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'check/agency/index',
					edit_url: 'check/agency/edit',
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
                        {field: 'file1', title: __('File1'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'file2', title: __('File2'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'file3', title: __('File3'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'file4', title: __('File4'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'file5', title: __('File5'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'order_id', title: __('Order_id')},
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