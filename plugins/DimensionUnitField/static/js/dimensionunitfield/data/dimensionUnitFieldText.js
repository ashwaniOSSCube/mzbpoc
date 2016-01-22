
pimcore.registerNS("pimcore.object.classes.data.dimensionUnitFieldText");
pimcore.object.classes.data.dimensionUnitFieldText = Class.create(pimcore.object.classes.data.data, {

    type: "dimensionUnitFieldText",
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
        this.type = "dimensionUnitFieldText";

        this.initData(initData);

        this.treeNode = treeNode;

        this.store = pimcore.plugin.dimensionUnitField.helpers.getClassDefinitionStore();
    },

    getTypeName: function () {
        return t("dimension_unit_field");
    },

    getGroup: function () {
            return "text";
    },

    getIconClass: function () {
        return "pimcore_icon_dimensionunit";
    },

    getLayout: function ($super) {

        $super();

        this.specificPanel.removeAll();
        this.specificPanel.add([
            {
                xtype: "spinnerfield",
                fieldLabel: t("width"),
                name: "width",
                value: this.datax.width
            },
            {
                xtype: "spinnerfield",
                fieldLabel: t("columnLength"),
                name: "columnLength",
                value: this.datax.columnLength
            },
            {
                xtype: 'superboxselect',
                allowBlank:false,
                queryDelay: 0,
                triggerAction: 'all',
                resizable: true,
                mode: 'local',
                //anchor:'100%',
                width: 600,
                minChars: 1,
                fieldLabel: t("valid_dimension_units"),
                emptyText: t("valid_dimension_units_empty_text"),
                name: 'validDimensionUnits',
                value: this.datax.validDimensionUnits,
                store: this.store,
                displayField: 'abbreviation',
                valueField: 'id',
                forceFormValue: true
            }
        ]);

        return this.layout;
    }
});
