## 1 - Installation
Get the latest version of the e-commerce framework, copy it to your project and install the framework. 


## 2 - Configure product and product category classes
As products and product categories simple pimcore objects can be used. In order add e-commerce specific functionality to these pimcore objects, certain base classes or interfaces need to implemented. 
For detailed information of the needed functionality see source code documentation of the abstract classes and interfaces. 
TODO: ADD LINKS HERE

### Product
There are two ways of preparing a pimcore class for product-usage in the ecommerce-framework
1. The pimcore class needs to implement the abstract class `OnlineShop_Framework_AbstractProduct`
   * this is useful, when product index and checkout functionality is based on the e-commerce framework. 
2. Make sure that the pimcore class implements either `OnlineShop_Framework_ProductInterfaces_IIndexable` or `OnlineShop_Framework_ProductInterfaces_ICheckoutable` - or both, depending on the use case it is used for.
   * this is useful, when e.g. only checkout functionality is based on the e-commerce framework, but not the product presentation. 
   * the interfaces define methods that are needed for the two use cases and need to be implemented. 


> For the abstract class use the parent class functionality of pimcore. For implementing the interfaces use either the parent class functionality or the class map functionality of pimcore (see also <https://www.pimcore.org/wiki/display/PIMCORE3/Class-Mappings+-+Overwrite+pimcore+models>). 

### Product Category
When a product category class is used, this class needs to implement the abstract class `OnlineShop_Framework_AbstractCategory`


> For product categories only one pimcore class should be used. For products, several pimcore classes can be used. Eventually the index update scripts need to be adapted. 


## 3 - Configuring OnlineShopConfig.xml
TODO: ADD LINKS HERE

Open /website/var/plugins/OnlineShop/OnlineShopConfig.xml and adjust the settings. This configuration file is the central configuration for the e-commerce framework and defines the concrete implementations and configurations for all modules. 

So this configuration file specifies thinks like
- cart manager
- price systems
- availability systems
- checkout manager and checkout steps
- payment providers
- index service and which attributes should be in the product index
- pricing manager
- ...
For detailed information see comments within the xml file. Depending on your use case, you might not need all components configured in the xml file. 

Things you need to adjust when using the product index: 
* productindex - columns (adust the sample attributes to attributes that are available in your product class). 

> During development you will return to this file and adjust the settings multiple times. 

> This setting file is cached due to performance issues. You need to clean up the configuration cache in the pimcore backend so that the changes take affect.