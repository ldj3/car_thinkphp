define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'check/agencyauthenticate/index',
					edit_url: 'check/agencyauthenticate/edit',
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
                        {field: 'company_name', title: __('Company_name')},
                        {field: 'company_address', title: __('Company_address')},
                        {field: 'AgencyPicID1', title: __('AgencyPicID1'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'AgencyPicID2', title: __('AgencyPicID2'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'AgencyPicID3', title: __('AgencyPicID3'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'AgencyPicID4', title: __('AgencyPicID4'), operate: false, formatter: Table.api.formatter.image},
						{field: 'AgencyPicID5', title: __('AgencyPicID5'), operate: false, formatter: Table.api.formatter.image},
						{field: 'remark', title: __('Remark')},
						{field: 'user_id', title: __('User_id')},
                        {field: 'status', title: __('Status'),operate: false, formatter: Table.api.formatter.status},
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