Admin Grid Product Thumbnails
=====================
Use this extension to conveniently display product thumbnails in admin grids.

Facts
-----
- version: 1.0.0
- extension key: Mzentrale_ProductThumb
- [extension on GitHub](https://github.com/mzentrale/Mzentrale_ProductThumb)

Description
-----------
This extension was directly inspired by a [similar module][ptag] written by [Daniele Gagliardi][dg].

The same functionality is achieved using a light-weight approach, avoiding class rewrites and preferring layout XML instead.

The module is configurable in system configuration: options can be found under
    
    System > Admin > Product Grid Thumbnails

Compatibility
-------------
- Magento >= 1.5
- Might work properly on earlier versions as well, even though it was not tested.

Installation Instructions
-------------------------
1. Copy all the files contained in `src` folder into your document root.
2. Alternatively, use [modman][modman] or [modgit][modgit] to install.
3. Clear the cache, logout from the admin panel and then login again.

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/mzentrale/Mzentrale_ProductThumb/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Francesco Marangi | mzentrale    
[@fmarangi](https://twitter.com/fmarangi)

License
-------
[The MIT License](http://opensource.org/licenses/MIT)

Copyright
---------
Copyright (c) 2012 mzentrale | eCommerce - eBusiness

[ptag]: http://www.magentocommerce.com/magento-connect/catalog/product/view/id/14614/s/product-image-in-administration-grid-8656/
[dg]: http://www.danielegagliardi.it/
[modman]: https://github.com/colinmollenhour/modman/wiki/Tutorial
[modgit]: https://github.com/jreinke/modgit
