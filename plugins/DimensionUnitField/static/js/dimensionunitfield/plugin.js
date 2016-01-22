pimcore.registerNS("pimcore.plugin.dimensionUnitField");

pimcore.plugin.dimensionUnitField = Class.create(pimcore.plugin.admin,{
    getClassName: function (){
        return "pimcore.plugin.dimensionUnitField";
    },

    initialize: function(){
		pimcore.plugin.broker.registerPlugin(this);
	},

    uninstall: function(){
    },

    pimcoreReady: function (params,broker) {
        var settingsMenu = pimcore.globalmanager.get("layout_toolbar").settingsMenu;

        settingsMenu.add({
            text: t("dimensionunits"),
            iconCls: "pimcore_icon_dimensionunit",
            cls: "pimcore_main_menu",
            handler: function () {
                try {
                    pimcore.globalmanager.get("dimensionUnitField.dimensionUnits").activate();
                }
                catch (e) {
                    pimcore.globalmanager.add("dimensionUnitField.dimensionUnits", new pimcore.plugin.dimensionUnitField.dimensionUnits());
                }
            }
        });

        settingsMenu.doLayout();

        pimcore.plugin.dimensionUnitField.helpers.initUnitStore(null);        
    }
});

new pimcore.plugin.dimensionUnitField();