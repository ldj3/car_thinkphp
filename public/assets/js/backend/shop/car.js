define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'shop/car/index',
                    add_url: 'shop/car/add',
                    edit_url: 'shop/car/edit',
                    del_url: 'shop/car/del',
                    multi_url: 'shop/car/multi',
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
                        {field: 'name', title: __('Name')},
                        {field: 'title_image', title: __('Title_image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'detail_image', title: __('Detail_image'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'province', title: __("Province")},
						{field: 'city', title: __("City")},
                        {field: 'address', title: __("Address")},
                        {field: 'telephone', title: __("Telephone")},
                        {field: 'created_time', title: __('Created_time'), formatter: Table.api.formatter.datetime},
                        {field: 'user_id', title: __("User_id")},
                        {field: 'is_hot', title: __('Is_hot'), formatter: Table.api.formatter.status},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status},
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