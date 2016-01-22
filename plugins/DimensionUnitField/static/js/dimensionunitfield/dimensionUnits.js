pimcore.registerNS("pimcore.plugin.dimensionUnitField.dimensionUnits");
pimcore.plugin.dimensionUnitField.dimensionUnits = Class.create({

    dataUrl: '/plugin/DimensionUnitField/admin/unit-proxy',

    initialize: function () {
        this.getTabPanel();
    },

   activate: function (filter) {
        if(filter){
            this.store.baseParams.filter = filter;
            this.store.load();
            this.filterField.setValue(filter);
        }
        var tabPanel = Ext.getCmp("pimcore_panel_tabs");
        tabPanel.activate("plugin_dimensionUnitField_units");
    },

    getHint: function(){
        return "";
    },

    getTabPanel: function () {
        if (!this.panel) {
            this.panel = new Ext.Panel({
                id: "plugin_dimensionUnitField_units",
                iconCls: "pimcore_icon_dimensionunit",
                title: t("dimensionunits"),
                border: false,
                layout: "fit",
                closable:true,
                items: [this.getRowEditor()]
            });

            var tabPanel = Ext.getCmp("pimcore_panel_tabs");
            tabPanel.add(this.panel);
            tabPanel.activate("plugin_dimensionUnitField_units");

            this.panel.on("destroy", function () {
                pimcore.globalmanager.remove("dimensionUnitField.dimensionUnits");
            }.bind(this));

            pimcore.layout.refresh();
        }

        return this.panel;
    },


    getRowEditor: function () {

        var languages = this.languages;

        var proxy = new Ext.data.HttpProxy({
            url: this.dataUrl,
            method: 'post'
        });

        var readerFields = [
            {name: 'id', allowBlank: false},
            {name: 'abbreviation', allowBlank: false},
            {name: 'longname', allowBlank: true},
            {name: 'group', allowBlank: true},
            {name: 'baseunit', allowBlank: true},
            {name: 'factor', allowBlank: true}
        ];
        var typesColumns = [
            {dataIndex: 'id', header: t("id"), hidden: true, editor: new Ext.form.TextField({})},
            {dataIndex: 'abbreviation', header: t("abbreviation"), editor: new Ext.form.TextField({})},
            {dataIndex: 'longname', header: t("longname"), editor: new Ext.form.TextField({})},
            {dataIndex: 'group', header: t("group"), editor: new Ext.form.TextField({})},
            {dataIndex: 'baseunit', header: t("baseunit"), editor: new Ext.form.TextField({})},
            {dataIndex: 'factor', header: t("factor"), editor: new Ext.form.NumberField({decimalPrecision: 10})}
        ];

        typesColumns.push({
            hideable: false,
            xtype: 'actioncolumn',
            width: 30,
            items: [{
                tooltip: t('delete'),
                icon: "/pimcore/static/img/icon/cross.png",
                handler: function (grid, rowIndex) {
                    grid.getStore().removeAt(rowIndex);
                }.bind(this)
            }]
        });

        var configuredFilters = [
            {type: "string", dataIndex: "abbreviation"},
            {type: "string", dataIndex: "longname"},
            {type: "string", dataIndex: "group"},
            {type: "string", dataIndex: "baseunit"},
            {type: "numeric", dataIndex: "factor"}
        ];

        this.gridfilters = new Ext.ux.grid.GridFilters({
            encode: true,
            local: false,
            filters: configuredFilters
        });

        var reader = new Ext.data.JsonReader({
            totalProperty: 'total',
            successProperty: 'success',
            root: 'data',
            idProperty: 'id'
        }, readerFields);

        var writer = new Ext.data.JsonWriter();

        var itemsPerPage = 20;
        this.store = new Ext.data.Store({
            id: 'dimension_unit_store',
            proxy: proxy,
            reader: reader,
            writer: writer,
            remoteSort: true,
            baseParams: {
                limit: itemsPerPage
                //filter: this.preconfiguredFilter
            },            
            listeners: {
                save: function() {
                    pimcore.plugin.dimensionUnitField.helpers.getClassDefinitionStore().reload();
                }
            }
        });
        this.store.load();

        this.editor = new Ext.ux.grid.RowEditor();

        this.pagingtoolbar = new Ext.PagingToolbar({
            pageSize: itemsPerPage,
            store: this.store,
            displayInfo: true,
            displayMsg: '{0} - {1} / {2}',
            emptyMsg: t("no_objects_found")
        });

        // add per-page selection
        this.pagingtoolbar.add("-");

        this.pagingtoolbar.add(new Ext.Toolbar.TextItem({
            text: t("items_per_page")
        }));
        this.pagingtoolbar.add(new Ext.form.ComboBox({
            store: [
                [10, "10"],
                [20, "20"],
                [40, "40"],
                [60, "60"],
                [80, "80"],
                [100, "100"]
            ],
            mode: "local",
            width: 50,
            value: 20,
            triggerAction: "all",
            listeners: {
                select: function (box, rec, index) {
                    this.pagingtoolbar.pageSize = intval(rec.data.field1);
                    this.pagingtoolbar.moveFirst();
                }.bind(this)
            }
        }));        
        
        
        this.grid = new Ext.grid.GridPanel({
            frame: false,
            autoScroll: true,
            store: this.store,
            plugins: [this.editor, this.gridfilters],
            columnLines: true,
            stripeRows: true,
            columns : typesColumns,
            bbar: this.pagingtoolbar,
            sm: new Ext.grid.RowSelectionModel({singleSelect:true}),
            tbar: [
                {
                    text: t('add'),
                    handler: this.onAdd.bind(this),
                    iconCls: "pimcore_icon_add"
                },
                '-',
                {
                    text: t('delete'),
                    handler: this.onDelete.bind(this),
                    iconCls: "pimcore_icon_delete"
                },
                '-',
                {
                    text: t('reload'),
                    handler: function () {
                        this.store.reload();
                    }.bind(this),
                    iconCls: "pimcore_icon_reload"
                },'-',{
                  text: this.getHint(),
                  xtype: "tbtext",
                  style: "margin: 0 10px 0 0;"
                }
            ],
            viewConfig: {
                forceFit: true
            }
        });

        return this.grid;
    },

    onAdd: function (btn, ev) {
        var u = new this.grid.store.recordType();
        u.data.id = -1;
        this.editor.stopEditing();
        this.grid.store.insert(0, u);
        this.editor.startEditing(0);
    },

    onDelete: function () {
        var rec = this.grid.getSelectionModel().getSelected();
        if (!rec) {
            return false;
        }
        this.grid.store.remove(rec);
    }

});

