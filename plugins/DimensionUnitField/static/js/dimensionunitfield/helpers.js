// some global helper functions
pimcore.registerNS("pimcore.plugin.dimensionUnitField.helpers.x");

pimcore.plugin.dimensionUnitField.helpers.storeLoaded = false;
pimcore.plugin.dimensionUnitField.helpers.store = null;

pimcore.plugin.dimensionUnitField.helpers.initUnitStore = function(callback, filters) {
    if(!pimcore.plugin.dimensionUnitField.helpers.storeLoaded) {
        pimcore.plugin.dimensionUnitField.helpers.storeLoaded = true;
        pimcore.plugin.dimensionUnitField.helpers.store = new Ext.data.JsonStore({
            autoDestroy: true,
            autoLoad: true,
            url: '/plugin/DimensionUnitField/admin/unit-list',
            root: 'data',
            fields: ['id', 'abbreviation'],
            listeners: {
                load: function() {
                    pimcore.plugin.dimensionUnitField.helpers.getData(callback, filters);
                }.bind(this)
            }
        });
    } else {
        pimcore.plugin.dimensionUnitField.helpers.getData(callback, filters);
    }

}

pimcore.plugin.dimensionUnitField.helpers.getData = function(callback, filters) {
    if(callback) {
        pimcore.plugin.dimensionUnitField.helpers.store.clearFilter();
        var filterArray = filters.split(',');

        var data = [];
        for(var i = 0; i < filterArray.length; i++) {
            var rec = pimcore.plugin.dimensionUnitField.helpers.store.getById(filterArray[i]);
            if(rec) {
                data.push(rec.data);
            }
        }
        callback({data: data});
    }
}

pimcore.plugin.dimensionUnitField.helpers.classDefinitionStore = null;
pimcore.plugin.dimensionUnitField.helpers.getClassDefinitionStore = function() {
    if(!pimcore.plugin.dimensionUnitField.helpers.classDefinitionStore) {
        pimcore.plugin.dimensionUnitField.helpers.classDefinitionStore = new Ext.data.JsonStore({
            //autoDestroy: true,
            autoLoad: true,
            url: '/plugin/DimensionUnitField/admin/unit-list',
            root: 'data',
            fields: ['id', 'abbreviation']
        });
    }
    return pimcore.plugin.dimensionUnitField.helpers.classDefinitionStore;
}
