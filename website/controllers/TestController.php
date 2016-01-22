<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cfasching
 * Date: 31.05.13
 * Time: 15:36
 * To change this template use File | Settings | File Templates.
 */

class TestController extends Website_Controller_Action {

    public function testAction() {

        $report = new PimTools_ImportReport();
        $report->setAction('unpublish');
        $report->setImportDate(Zend_Date::now()->get());
        $report->setType("Test");
        $report->save();

        die("meins");

    }

    public function test2Action() {

        $main = Object_Product::getById(6730);
        $color = Object_Product::getById(6731);
        $size = Object_Product::getById(11036);


        p_r("main:");
        p_r($main->getName());
        p_r($main->getHugo());
        p_r($main->getDescription());
        p_r("color:");
        p_r($color->getName());
        p_r($color->getHugo());
        p_r($color->getDescription());
        p_r("size:");
        p_r($size->getName());
        p_r($size->getHugo());
        p_r($size->getDescription());


        die("done");

    }


    public function gaAction() {


        die("done");
    }


    public function offerToolAction() {

//        $offerToolService = new OnlineShop_OfferTool_Impl_DefaultService();
        $offerToolService = OnlineShop_Framework_Factory::getInstance()->getOfferToolService();

        $carts = OnlineShop_Framework_Factory::getInstance()->getCartManager()->getCarts();
        $cart = $carts[32];
//
        $offerToolService->createNewOfferFromCart($cart, array());


//        $offer = Object_OfferToolOffer::getById(11112);
//        $offerToolService->updateOfferFromCart($offer, $cart);

//        $offers = $offerToolService->getOffersForCart($cart);

//        p_r($offers);


//        $p = Object_OfferToolCustomProduct::getById(11119);
//        $offer->addCustomItemFromProduct($p, 2);
//        $offerToolService->updateTotalPriceOfOffer($offer);

        die("done");

    }


    public function test3Action() {

            $document = Document_Printpage::getById(45);

        $html = $document->renderDocument(array());

        echo $html;

//        p_r($_SESSION);

        die();


    }

    public function test4Action() {

        $x = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager(new OnlineShop_Framework_Impl_SessionCart());
        $x->cleanUpPendingOrders();

        die("done");
    }


    public function categoryExportAction() {

        $parent = Object_ProductCategory::getById(11148);

        $entries = array();
        $this->exportChildren($parent, $entries);

        echo "<pre>";
        foreach($entries as $entry) {
            echo '"' . implode('";"', $entry) . '"' . "\n";
        }
        echo "</pre>";
        die();
    }

    private function exportChildren($parent, &$array) {
        $children = $parent->getChilds();
        if($children) {

            foreach($children as $child) {
                $entry = array();
                $entry['code'] = str_replace("-", "_", $child->getKey());
                $entry['parent'] = str_replace("-", "_", $parent->getKey());
                $entry['dynamic'] = "";
                $entry['title'] = "en_US:" . $child->getName("en_GB") . "," . "fr_FR:" . $child->getName("fr_FR");

                $array[] = $entry;

                $this->exportChildren($child, $array);
            }

        }
    }


    public function checkEventAction() {

        var_dump(Tool_Targeting_Rule::inTarget("test"));
        die();

//        $arg = NAME, ID oder Tool_Targeting_Rule - Objekt
//        ein Event kann man mit

//Tool_Targeting_Rule::fireEvent($key, $value = null)


    }


    public function cartAction() {
        // init
        $manager = OnlineShop_Framework_Factory::getInstance()->getCartManager();
        $cart = null;

        // search for the cart
        foreach($manager->getCarts() as $current)
        {
            if($current->getName() === "cart")
            {
                $cart = $current;
                break;
            }
        }

        // create new cart if not exists
        if(!$cart)
        {
            $cartId = $manager->createCart(array('name' => "cart"));
            $cart = $manager->getCart( $cartId );
        }


        //p_r($cart); die();


        $product = Object_Product::getById(4814);
        $cart->addItem($product, 1);
        $cart->setCheckoutData("DATA1", "sdfsdfsdfsdfsdfsdf asdf sf asdf asdf asdf asdf sdaf");

        $cart->save();



        p_r($_SESSION);

        die("done");

    }


    public function cart2Action() {
        // init
        $manager = OnlineShop_Framework_Factory::getInstance()->getCartManager();
        $cart = $manager->getCartByName("cart");

        p_r($cart->getItems());
        p_r($cart->checkoutData);

        die("done");
    }

    public function svgAction() {


        $asset = Asset::getById(4874);
        $asset->clearThumbnails(true);

        $thumb = $asset->getThumbnail(array(
            "width" => 1800
        ));

        header("Content-Type: image/png");

        while(@ob_end_flush());
        flush();

        readfile($thumb->getFileSystemPath());
        exit;
    }


    public function fashAction() {
//
//        $string = '{"data":{"o_id":1953079,"o_classId":9,"o_virtualProductId":1953079,"o_virtualProductActive":true,"o_parentId":1953076,"o_type":"object","categoryIds":",829347,","parentCategoryIds":",829347,829346,","priceSystemName":"frischeis","active":true,"inProductList":true,"name":"UPM Veranda WPC Terrassendiele Silver Ash","combinedProductDescription":"UPM Veranda ist in den Farben\nBrasilian Walnut und Silver Ash erh\u00e4ltlich\nund ist beidseitig verwendbar.\n\nDie Oberfl\u00e4che mit Holzstruktur auf der\neinen Seite wie auch die fein geriffelte\nOberfl\u00e4che auf der anderen weisen\nnat\u00fcrlich wirkende unregelm\u00e4\u00dfige dunkle\nMaserungen auf.\n\nDie geschlossene Oberfl\u00e4che von UPM\nProFi Veranda zeichnet sich durch eine\ngute Widerstandsf\u00e4higkeit gegen\u00fcber\nFlecken und Verschmutzungen aus.\nDa UPM ProFi Veranda aus ligninfreien\nZellulosefasern gefertigt ist, bietet es zudem\noptimierte Farbbest\u00e4ndigkeit.\n\nUPM ProFi Veranda wird in Deutschland\nhergestellt.","remoteId":"55961\/4240","bk":"01","pme":"M","lme":"STK","thickness":25,"length":4000,"width":140,"vkPrice":13.9,"color":null,"qualitaet":null,"dauerhaftigkeitsklasse":null,"profileCoating":null,"profileProfileType":null,"profileSurface":null,"profileComposition":null,"terrassendieleTerraceType":"wpc","terrassendieleTerraceWoodSpecies":"terraceWoodSpecies31","timberQuality":null,"profiledTimberQuality":null,"constructionTimberDryness":null,"constructionTimberQualitySurface":null,"constructionTimberType":null,"constructionTimberSorting":null,"plywoodComposition":null,"plywoodSurface":null,"plywoodSurfaceStructure":null,"plywoodQuality":null,"plywoodBonding":null,"plywoodSpecies":null,"plywoodBondingGeneral":null,"plywoodSpeciesInnerPly":null,"brandName":null,"metaattributes":"#;#al#;#ok#;#","stockinformation01":null,"stockinformation02":null,"stockinformation03":null,"stockinformation04":null,"stockinformation05":null,"stockinformation08":null,"stockinformation09":null,"stockinformation10":null,"stockinformation13":null,"stockinformation14":null,"stockinformation15":null,"stockinformation21":null,"stockinformation22":null,"boardattributes":null,"boardProfiling":null,"boardRadiusBoard":null,"boardRadiusWindowSill":null,"boardDecking":null,"boardSinkMounting":null,"boardDecorOneSided":null,"boardWoodPanelLamella":null,"boardOsbJoint":null,"boardRawBoardJoint":null,"boardSupportingMaterial":null,"boardProductGroup":null,"boardClassification":null,"boardEmissionCategory":null,"boardCore":null,"decorDecortype":null,"decorHolzart":null,"decorFarbton":null,"decorBrightness":null,"decorTexture":null,"floorBodenbelag":null,"floorDesign":null,"floorVerbindung":null,"floorSurface":null,"floorStruktur":null,"floorColor":null,"floorsSpecies":null,"articleNumberSupplierFloor":null,"floorSorting":null,"floorSurfaceTreatment":null,"floorProfileType":null,"floorProfileHeightRange":null,"floorProfileSurface":null,"floorOilCapacity":null,"floorSkirtingSpecies":null,"floorProductLine":null,"floorComposition":null,"floorSkirtingFinish":null,"floorCollection":null,"floorBrightness":null,"floorTexture":null,"buildingMaterial":null,"buildingMaterialProduct":null,"buildingMaterialApplication":null,"buildingMaterialThermalConductivity":null,"buildingMaterialDensity":null,"doorSeries":null,"doorSurface":null,"doorWoodSpecies":null,"doorDirection":null,"doorGlazingType":null,"doorFrameType":null,"doorFrameEdgeFinish":null,"doorFittingType":null,"doorFittingSurface":null,"doorFittingKeyWay":null,"doorFittingEN1906Class":null,"doorFittingLayout":null,"doorFittingLeverOn":null,"doorFrameOrientation":null,"doorFrameWoodSpecies":null,"doorFittingSeries":null,"mainShopCategoryName":"WPC Terrasse","mainShopCategorySearchTerms":"  "},"relations":[{"src":1953079,"src_virtualProductId":1953079,"dest":36537,"fieldname":"mainProductImage","type":"asset"},{"src":1953079,"src_virtualProductId":1953079,"dest":829347,"fieldname":"mainShopCategory","type":"object"},{"src":1953079,"src_virtualProductId":1953079,"dest":1949893,"fieldname":"technologies","type":"object"},{"src":1953079,"src_virtualProductId":1953079,"dest":32886,"fieldname":"supplier","type":"object"}],"subtenants":[]}';
//        $crc = crc32($string);
//        p_r($crc);
//
//
//
//        $string = '{"data":{"o_id":1953079,"o_classId":9,"o_virtualProductId":1953079,"o_virtualProductActive":true,"o_parentId":1953076,"o_type":"object","categoryIds":",829347,","parentCategoryIds":",829347,829346,","priceSystemName":"frischeis","active":true,"inProductList":true,"name":"UPM Veranda WPC Terrassendiele Silver Ash..","combinedProductDescription":"UPM Veranda ist in den Farben\nBrasilian Walnut und Silver Ash erh\u00e4ltlich\nund ist beidseitig verwendbar.\n\nDie Oberfl\u00e4che mit Holzstruktur auf der\neinen Seite wie auch die fein geriffelte\nOberfl\u00e4che auf der anderen weisen\nnat\u00fcrlich wirkende unregelm\u00e4\u00dfige dunkle\nMaserungen auf.\n\nDie geschlossene Oberfl\u00e4che von UPM\nProFi Veranda zeichnet sich durch eine\ngute Widerstandsf\u00e4higkeit gegen\u00fcber\nFlecken und Verschmutzungen aus.\nDa UPM ProFi Veranda aus ligninfreien\nZellulosefasern gefertigt ist, bietet es zudem\noptimierte Farbbest\u00e4ndigkeit.\n\nUPM ProFi Veranda wird in Deutschland\nhergestellt.","remoteId":"55961\/4240","bk":"01","pme":"M","lme":"STK","thickness":25,"length":4000,"width":140,"vkPrice":13.9,"color":null,"qualitaet":null,"dauerhaftigkeitsklasse":null,"profileCoating":null,"profileProfileType":null,"profileSurface":null,"profileComposition":null,"terrassendieleTerraceType":"wpc","terrassendieleTerraceWoodSpecies":"terraceWoodSpecies31","timberQuality":null,"profiledTimberQuality":null,"constructionTimberDryness":null,"constructionTimberQualitySurface":null,"constructionTimberType":null,"constructionTimberSorting":null,"plywoodComposition":null,"plywoodSurface":null,"plywoodSurfaceStructure":null,"plywoodQuality":null,"plywoodBonding":null,"plywoodSpecies":null,"plywoodBondingGeneral":null,"plywoodSpeciesInnerPly":null,"brandName":null,"metaattributes":"#;#al#;#ok#;#","stockinformation01":null,"stockinformation02":null,"stockinformation03":null,"stockinformation04":null,"stockinformation05":null,"stockinformation08":null,"stockinformation09":null,"stockinformation10":null,"stockinformation13":null,"stockinformation14":null,"stockinformation15":null,"stockinformation21":null,"stockinformation22":null,"boardattributes":null,"boardProfiling":null,"boardRadiusBoard":null,"boardRadiusWindowSill":null,"boardDecking":null,"boardSinkMounting":null,"boardDecorOneSided":null,"boardWoodPanelLamella":null,"boardOsbJoint":null,"boardRawBoardJoint":null,"boardSupportingMaterial":null,"boardProductGroup":null,"boardClassification":null,"boardEmissionCategory":null,"boardCore":null,"decorDecortype":null,"decorHolzart":null,"decorFarbton":null,"decorBrightness":null,"decorTexture":null,"floorBodenbelag":null,"floorDesign":null,"floorVerbindung":null,"floorSurface":null,"floorStruktur":null,"floorColor":null,"floorsSpecies":null,"articleNumberSupplierFloor":null,"floorSorting":null,"floorSurfaceTreatment":null,"floorProfileType":null,"floorProfileHeightRange":null,"floorProfileSurface":null,"floorOilCapacity":null,"floorSkirtingSpecies":null,"floorProductLine":null,"floorComposition":null,"floorSkirtingFinish":null,"floorCollection":null,"floorBrightness":null,"floorTexture":null,"buildingMaterial":null,"buildingMaterialProduct":null,"buildingMaterialApplication":null,"buildingMaterialThermalConductivity":null,"buildingMaterialDensity":null,"doorSeries":null,"doorSurface":null,"doorWoodSpecies":null,"doorDirection":null,"doorGlazingType":null,"doorFrameType":null,"doorFrameEdgeFinish":null,"doorFittingType":null,"doorFittingSurface":null,"doorFittingKeyWay":null,"doorFittingEN1906Class":null,"doorFittingLayout":null,"doorFittingLeverOn":null,"doorFrameOrientation":null,"doorFrameWoodSpecies":null,"doorFittingSeries":null,"mainShopCategoryName":"WPC Terrasse","mainShopCategorySearchTerms":"  "},"relations":[{"src":1953079,"src_virtualProductId":1953079,"dest":36537,"fieldname":"mainProductImage","type":"asset"},{"src":1953079,"src_virtualProductId":1953079,"dest":829347,"fieldname":"mainShopCategory","type":"object"},{"src":1953079,"src_virtualProductId":1953079,"dest":1949893,"fieldname":"technologies","type":"object"},{"src":1953079,"src_virtualProductId":1953079,"dest":32886,"fieldname":"supplier","type":"object"}],"subtenants":[]}';
//        $crc = crc32($string);
//        p_r($crc);

        p_r($this->getParam("hugo"));


        die("done");


    }


    /**
     * product list demo
     */
    public function productListAction()
    {
        // init
        $this->enableLayout();
        $shopFactory = OnlineShop_Framework_Factory::getInstance();


        // bsp filter
//        $this->setParam('color', ['aqua']);


        // create product list
        $productList = $shopFactory->getIndexService()->getProductListForCurrentTenant();
        $productList->setLimit(10);
        $this->view->productList = $productList;


        // init filter
        $filterDefinition = \Pimcore\Model\Object\FilterDefinition::getByPath( '/filter-definitions/default' );
        $filterService = $shopFactory->getFilterService( $this->view );
        $activeFilter = $filterService->initFilterService( $filterDefinition, $productList, $this->getAllParams() );


        // view data
        $this->view->filterDefinition = $filterDefinition;
        $this->view->filterService = $filterService;
        $this->view->activeFilter = $activeFilter;
    }
}