/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


pimcore.registerNS("pimcore.object.classes.data.indexFieldSelection");
pimcore.object.classes.data.indexFieldSelection = Class.create(pimcore.object.classes.data.data, {

    type: "indexFieldSelection",
    allowIndex: true,

    /**
     * define where this datatype is allowed
     */
    allowIn: {
        object: true,
        objectbrick: true,
        fieldcollection: true,
        localizedfield: true
    },        

    initialize: function (treeNode, initData) {
        this.type = "indexFieldSelection";

        this.initData(initData);

        this.treeNode = treeNode;
    },

    getTypeName: function () {
        return t("indexFieldSelection");
    },

    getGroup: function () {
        return "ecommerce";
    },

    getIconClass: function () {
        return "pimcore_icon_indexFieldSelection";
    },

    getLayout: function ($super) {

        $super();

        this.uniqeFieldId = uniqid();
        this.specificPanel.removeAll();
        this.specificPanel.add([
            {
                xtype: "spinnerfield",
                fieldLabel: t("width"),
                name: "width",
                value: this.datax.width
            },{
                xtype: "checkbox",
                fieldLabel: t("considerTenants"),
                name: "considerTenants",
                checked: this.datax.considerTenants
            },{
                xtype: "multiselect",
                id: "class_filter_groups_" + this.uniqeFieldId,
                triggerAction: "all",
                fieldLabel: t("filtergroups"),
                editable: false,
                name: "filterGroups",
                store: new Ext.data.JsonStore({
                    autoDestroy: true,
                    autoLoad: true,
                    url: '/plugin/OnlineShop/index/get-filter-groups',
                    root: 'data',
                    listeners: {
                        load: function(store) {
                            Ext.getCmp('class_filter_groups_' + this.uniqeFieldId).setValue(this.datax.filterGroups);
                        }.bind(this)
                    },
                    fields: ['data']
                }),
                valueField: 'data',
                displayField: 'data',
                itemCls: "object_field",
                width: 200
            },{
                xtype: "combo",
                triggerAction: "all",
                fieldLabel: t("preSelectMode"),
                editable: false,
                name: "multiPreSelect",
                mode: 'local',
                store: new Ext.data.ArrayStore({
                    id: 0,
                    fields: [
                        'key',
                        'value'
                    ],
                    data: [
                        ['none', t('none')],
                        ['remote_single', t('remote_single')],
                        ['remote_multi', t('remote_multi')],
                        ['local_single', t('local_single')],
                        ['local_multi', t('local_multi')]
                    ]
                }),
                valueField: 'key',
                displayField: 'value',
                width: 200,
                listeners: {
                    select: function(combo, rec) {
                        if(rec.id == "local_single" || rec.id == "local_multi") {
                            this.valueGrid.setVisible(true);
                        } else {
                            this.valueGrid.setVisible(false);
                        }

                    }.bind(this)
                },
                value: this.datax.multiPreSelect
            },
            this.getPredefinedListGrid()

        ]);
        
        return this.layout;
    },

    getPredefinedListGrid: function() {
        if(typeof this.datax.predefinedPreSelectOptions != "object") {
            this.datax.predefinedPreSelectOptions = [];
        }

        this.valueStore = new Ext.data.JsonStore({
            fields: ["key", "value"],
            data: this.datax.predefinedPreSelectOptions
        });

        this.valueGrid = new Ext.grid.EditorGridPanel({
            tbar: [{
                xtype: "tbtext",
                text: t("predefined_pre_select_options")
            }, "-", {
                xtype: "button",
                iconCls: "pimcore_icon_add",
                handler: function () {
                    var u = new this.valueStore.recordType({
                        key: "",
                        value: ""
                    });
                    this.valueStore.insert(0, u);
                }.bind(this)
            }],
            style: "margin-top: 10px",
            store: this.valueStore,
            hidden: (this.datax.multiPreSelect != "local_single" && this.datax.multiPreSelect != "local_multi"),
            selModel:new Ext.grid.RowSelectionModel({singleSelect:true}),
            columnLines: true,
            columns: [
                {header: t("display_name"), sortable: false, dataIndex: 'key', editor: new Ext.form.TextField({}),
                    width: 200},
                {header: t("value"), sortable: false, dataIndex: 'value', editor: new Ext.form.TextField({}),
                    width: 200},
                {
                    xtype:'actioncolumn',
                    width:30,
                    items:[
                        {
                            tooltip:t('up'),
                            icon:"/pimcore/static/img/icon/arrow_up.png",
                            handler:function (grid, rowIndex) {
                                if (rowIndex > 0) {
                                    var rec = grid.getStore().getAt(rowIndex);
                                    grid.getStore().removeAt(rowIndex);
                                    grid.getStore().insert(rowIndex - 1, [rec]);
                                }
                            }.bind(this)
                        }
                    ]
                },
                {
                    xtype:'actioncolumn',
                    width:30,
                    items:[
                        {
                            tooltip:t('down'),
                            icon:"/pimcore/static/img/icon/arrow_down.png",
                            handler:function (grid, rowIndex) {
                                if (rowIndex < (grid.getStore().getCount() - 1)) {
                                    var rec = grid.getStore().getAt(rowIndex);
                                    grid.getStore().removeAt(rowIndex);
                                    grid.getStore().insert(rowIndex + 1, [rec]);
                                }
                            }.bind(this)
                        }
                    ]
                },
                {
                    xtype: 'actioncolumn',
                    width: 30,
                    items: [
                        {
                            tooltip: t('remove'),
                            icon: "/pimcore/static/img/icon/cross.png",
                            handler: function (grid, rowIndex) {
                                grid.getStore().removeAt(rowIndex);
                            }.bind(this)
                        }
                    ]
                }
            ],
            autoHeight: true
        });

        return this.valueGrid;
    },
    applyData: function ($super) {

        $super();

        var options = [];

        this.valueStore.commitChanges();
        this.valueStore.each(function (rec) {
            options.push({
                key: rec.get("key"),
                value: rec.get("value")
            });
        });

        this.datax.predefinedPreSelectOptions = options;
    }
});
