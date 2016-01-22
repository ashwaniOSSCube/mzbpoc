
pimcore.registerNS("pimcore.object.tags.dimensionUnitField");
pimcore.object.tags.dimensionUnitField = Class.create(pimcore.object.tags.abstract, {

    type: "dimensionUnitField",

    initialize: function (data, fieldConfig) {
        this.data = data;
        this.fieldConfig = fieldConfig;

        this.store = new Ext.data.JsonStore({
            autoDestroy: true,
            root: 'data',
            fields: ['id', 'abbreviation']
        });

        pimcore.plugin.dimensionUnitField.helpers.initUnitStore(this.setData.bind(this), fieldConfig.validDimensionUnits);
    },

    setData: function(data) { 
        this.storeData = data;
        this.store.loadData(data);
    },

    getLayoutEdit: function () {

        var input = {
            itemCls: "object_field"
        };

        if (this.data && !isNaN(this.data.value)) {
            input.value = this.data.value;
        }

        if (this.fieldConfig.width) {
            input.width = this.fieldConfig.width;
        }

        input.decimalPrecision = 20;

        var options = {
            mode: 'local',
            width: 70,
            triggerAction: "all",
            autoSelect: true,
            editable: false,
            allowBlank: false,
            forceSelection: true,
            store: this.store,
            itemCls: "object_field",
            valueField: 'id',
            displayField: 'abbreviation'
        };

        if(this.data) {
            options.value = this.data.unit;
        } else if(this.storeData.data[0]) {
            options.value = this.storeData.data[0].id;
        }

        this.unitField = new Ext.form.ComboBox(options);

        this.inputField = new Ext.ux.form.SpinnerField(input);

        this.component = new Ext.form.CompositeField({
            xtype: 'compositefield',
            fieldLabel: this.fieldConfig.title,
            combineErrors: false,
            items: [this.inputField, this.unitField],
            itemCls: "object_field"
        });


        return this.component;
    },


    getLayoutShow: function () {

        var input = {
            fieldLabel: this.fieldConfig.title,
            name: this.fieldConfig.name,
            cls: "object_field"
        };

        if (this.data && this.data.value) {
            input.value = this.data.value;
        }

        if (this.fieldConfig.width) {
            input.width = this.fieldConfig.width;
        }

        this.component = new Ext.form.TextField(input);
        this.component.disable();

        return this.component;
    },

    getValue: function () {
        return {
            unit: this.unitField.getValue(),
            value: this.inputField.getValue()
        };
    },

    getName: function () {
        return this.fieldConfig.name;
    },

    isInvalidMandatory: function () {
        if (this.unitField.getValue() && this.inputField.getValue()) {
            return false;
        }
        return true;
    }
});