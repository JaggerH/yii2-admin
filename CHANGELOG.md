Yii2 Admin Change Log
==========================

2.3
-----

 

2.0
---------------------

- Chg: Remove dependenci to `yiisoft/yii2-jui` (jackhunir).
- Chg: Add asset bundle for jui autocomplete (jackhunir).


1.0.4
-----------------------

- Bug: #102: Unique validation of the permission and role (jackhunir).
- Enh: Clear cache when menu change (jackhunir).
- Enh: Ensure get latest state of `user` component (jackhunir).


1.0.3
------


1.0.2
------

- Enh: Add Portuguese language to translation message (iforme).
- Enh: configurable Navbar defined in module config (Stefano Mtangoo).
- Enh: Add Italian language to translation message (realtebo).

1.0.1
-----

- Enh: Add Persian language to translation message (jafaripur).
- Enh: Add French language to translation message (marsuboss).


1.0.0
-----

- Enh: Internationalization (sosojni).
- Enh: Add Russian language to translation message (m0zart89).


1.0.0-rc 
--------

- Bug #12: Allow another module name (jackhunir).
- Bug: #19: Added table prefix to table `menu` for some query (jackhunir, liu0472).
- Bug: #24: change `$cache === null` to `isset($cache)` (jackhunir).
- Bug: Bug fix. Ensure array has index before check `in_array()` (jackhunir).
- Bug: Typo fix, replace `AssigmentController` to `AssignmentController` (jackhunir).
- Enh: Custom side menu via `jackh\admin\Module::items` (mdmunir).
- Enh: Added menu manager (jackhunir).
- Enh: Migration for table menu (jackhunir).
- Enh: Added Menu order (jackhunir).
- Enh: Add `db` and `cache` configuration (jackhunir).
- Enh: Add comment docs for entire class (jackhunir).
- Enh: Add documentation (jackhunir).
- Enh #57: Allow user to assign permission directly (jackhunir).
- Chg #10: `cache` is not used anymore (jackhunir).
- Chg #11: Only use required style sheet (jackhunir).
- Chg: Using `VarDumper::export` to save `data` of `jackh\models\AuthItem` (mdmunir).
- Chg: Allow using another `yii\rbac\Rule` instance (jackhunir).
- Chg: Remove prefix `menu_` from column name of table `menu` (jackhunir).
- Chg: Added column `data` to table `menu` (jackhunir).
- Chg: Can customize return of `jackh\admin\components\AccessHelper::getAssignedMenu()` with provide a callback to method (mdmunir). 
- Chg: Add require "yiisoft/yii2-jui" to composer.json (jackhunir, hashie5).
- Chg: #21: Force set allow `null` to column `parent` in database migration (jackhunir).
- Chg: Remove `jackh\admin\components\BizRule` (mdmunir).
- Chg: Change convert string to `yii\rbac\Item::$data` with `Json::decode()` (jackhunir).
- Chg: Add extra param to route (jackhunir).
- Chg: Add ability to get sparated menu. See [Using Menu](docs/guide/using-menu.md) (jackhunir).
- Chg: Refactor layout (jackhunir).
- Chg: Change `AccessHelper` to `MenuHelper` (jackhunir).
- Chg: Change migration path name (jackhunir).
- Chg: `db` and `cache` configuration via `$app->params['jackh.admin.configs']` (mdmunir).
- Chg: #29: Change `yii\caching\GroupDependency` to `yii\caching\TagDependency` (jackhunir).
- Chg: Remove `jackh\admin\Module::allowActions`. Set access control directly with `mdm\admin\components\AccessControl` (mdmunir).
- Chg: Change cache strategy (jackhunir).
- Chg: `jackh\admin\components\DbManager` now inherited from `yii\rbac\DbManager` (mdmunir).
- Chg: Change module default layout (jackhunir).
- Chg: Change back items to controllers (jackhunir).
- Chg: Set default layout to `null` (jackhunir).
- Chg #53: Fixed typo. Change Role to Permission (jackhunir).
- Chg: Simplify using layout (jackhunir).
