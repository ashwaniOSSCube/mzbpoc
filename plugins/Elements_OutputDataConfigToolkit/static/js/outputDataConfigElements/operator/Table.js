pimcore.registerNS("pimcore.plugin.outputDataConfigToolkit.outputDataConfigElements.operator.Table");

pimcore.plugin.outputDataConfigToolkit.outputDataConfigElements.operator.Table = Class.create(pimcore.plugin.outputDataConfigToolkit.outputDataConfigElements.operator.Group, {
    type: "operator",
    class: "Table",
    iconCls: "pimcore_icon_operator_table",
    defaultText: "operator_table",
    windowTitle: "table_operator_settings",
    allowedTypes: {
        operator: { 
            TableRow: true
        }
    },

    getConfigDialog: function(node) {
        this.node = node;

        this.textfield = new Ext.form.TextField({
            fieldLabel: t('text'),
            length: 255,
            width: 200,
            value: this.node.attributes.configAttributes.label
        });

        this.tooltip = new Ext.form.TextArea({
            fieldLabel: t('tooltip'),
            length: 255,
            width: 200,
            height: 100,
            value: this.node.attributes.configAttributes.tooltip
        });

        this.configPanel = new Ext.Panel({
            layout: "form",
            bodyStyle: "padding: 10px;",
            items: [this.textfield, this.tooltip],
            buttons: [{
                text: t("apply"),
                iconCls: "pimcore_icon_apply",
                handler: function () {
                    this.commitData();
                }.bind(this)
            }]
        });

        this.window = new Ext.Window({
            width: 400,
            height: 250,
            modal: true,
            title: t(this.windowTitle),
            layout: "fit",
            items: [this.configPanel]
        });

        this.window.show();
    },

    commitData: function() {
        this.node.attributes.configAttributes.label = this.textfield.getValue();
        this.node.attributes.configAttributes.tooltip = this.tooltip.getValue();
        this.node.setText( this.textfield.getValue() );
        this.window.close();
    }


});