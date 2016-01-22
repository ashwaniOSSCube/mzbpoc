pimcore.registerNS("pimcore.plugin.rating");

pimcore.plugin.rating = Class.create(pimcore.plugin.admin, {


    getClassName: function () {
        return "pimcore.plugin.rating";
    },

    initialize: function() {
        pimcore.plugin.broker.registerPlugin(this);
    },


    uninstall: function() {
        //TODO: hide all rating info tabs
    },

    addRatingInfo: function (object, type) {

        Ext.Ajax.request({
            url: "/plugin/Rating/admin/get-rating/",
            method: "get",
            params: {id:object.id,type:type},
            success: function (transport) {
                if (transport.status == 200 && transport.responseText != 'null') {
                    var dataJSON = Ext.util.JSON.decode(transport.responseText);
                    var len = object.tab.items.items[0].items.length;
                    object.tab.items.items[0].insert(len, "-");
                    object.tab.items.items[0].insert(len + 1,
                            {
                                text: dataJSON.average + ' ' + t('rating_points') + ' (' + dataJSON.total + ' ' + t('ratings_total') + ')',
                                xtype: 'tbtext',
                                cls: "rating_plugin_star"
                            }
                    );
                    object.tab.items.items[0].doLayout();
                    pimcore.layout.refresh();
                }

            }.bind(this)
        })

    },

    postOpenObject: function(object, type) {
        this.addRatingInfo(object, type);

    },
    postOpenDocument: function(object, type) {
        this.addRatingInfo(object, type);
    },
    postOpenAsset: function(object, type) {
        this.addRatingInfo(object, type);
    }

});

new pimcore.plugin.rating();

