RBAC Manager for Yii 2
======================
GUI manager for RABC (Role Base Access Control) Yii2. Easy to manage authorization of user.

[![Latest Stable Version](https://poser.pugx.org/mdmsoft/yii2-admin/v/stable.png)](https://packagist.org/packages/mdmsoft/yii2-admin)
[![Total Downloads](https://poser.pugx.org/mdmsoft/yii2-admin/downloads.png)](https://packagist.org/packages/mdmsoft/yii2-admin)
[![Reference Status](https://www.versioneye.com/php/mdmsoft:yii2-admin/reference_badge.svg)](https://www.versioneye.com/php/mdmsoft:yii2-admin/references)
[![Dependency Status](https://www.versioneye.com/php/mdmsoft:yii2-admin/dev-master/badge.png)](https://www.versioneye.com/php/mdmsoft:yii2-admin/dev-master)
[![HHVM Status](https://img.shields.io/hhvm/mdmsoft/yii2-admin.svg)](http://hhvm.h4cc.de/package/mdmsoft/yii2-admin)
[![Code Climate](https://img.shields.io/codeclimate/github/mdmsoft/yii2-admin.svg)](https://codeclimate.com/github/mdmsoft/yii2-admin)

Documentation
-------------
> **Important: If you install version 3.x, please see [this readme](https://github.com/mdmsoft/yii2-admin/blob/3.master/README.md#upgrade-from-2x).**


- [Change Log](CHANGELOG.md).
- [Authorization Guide](http://www.yiiframework.com/doc-2.0/guide-security-authorization.html). Important, read this first before you continue.
- [Basic Usage](docs/guide/basic-usage.md).
- [Using Menu](docs/guide/using-menu.md).
- [Api](https://mdmsoft.github.io/yii2-admin/index.html).

Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require mdmsoft/yii2-admin "~1.0"
or
php composer.phar require mdmsoft/yii2-admin "~2.0"
```

or for the dev-master

```
php composer.phar require mdmsoft/yii2-admin "2.x-dev"
```

Or, you may add

```
"mdmsoft/yii2-admin": "~2.0"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.

### Install From the Archive

Download the latest release from here [releases](https://github.com/mdmsoft/yii2-admin/releases), then extract it to your project.
In your application config, add the path alias for this extension.

```php
return [
    ...
    'aliases' => [
        '@mdm/admin' => 'path/to/your/extracted',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
        ...
    ]
];
```

Usage
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            ...
        ]
        ...
    ],
    ...
    'components' => [
        ...
        'authManager' => [
            'class' => 'yii\rbac\PhpManager', // or use 'yii\rbac\DbManager'
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
];
```
See [Yii RBAC](http://www.yiiframework.com/doc-2.0/guide-security-authorization.html#role-based-access-control-rbac) for more detail.
You can then access Auth manager through the following URL:

```
http://localhost/path/to/index.php?r=admin
http://localhost/path/to/index.php?r=admin/route
http://localhost/path/to/index.php?r=admin/permission
http://localhost/path/to/index.php?r=admin/menu
http://localhost/path/to/index.php?r=admin/role
http://localhost/path/to/index.php?r=admin/assignment
```

To use the menu manager (optional), execute the migration here:
```
yii migrate --migrationPath=@mdm/admin/migrations
```

If you use database (class 'yii\rbac\DbManager') to save rbac data, execute the migration here:
```
yii migrate --migrationPath=@yii/rbac/migrations
```

Customizing Assignment Controller
---------------------------------

Assignment controller properties may need to be adjusted to the User model of your app.
To do that, change them via `controllerMap` property. For example:

```php
    'modules' => [
        'admin' => [
            ...
            'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'user_id',
                    'usernameField' => 'username',
                    'fullnameField' => 'profile.full_name',
                    'extraColumns' => [
                        [
                            'attribute' => 'full_name',
                            'label' => 'Full Name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->full_name;
                            },
                        ],
                        [
                            'attribute' => 'dept_name',
                            'label' => 'Department',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->dept->name;
                            },
                        ],
                        [
                            'attribute' => 'post_name',
                            'label' => 'Post',
                            'value' => function($model, $key, $index, $column) {
                                return $model->profile->post->name;
                            },
                        ],
                    ],
                    'searchClass' => 'app\models\UserSearch'
                ],
            ],
            ...
        ]
        ...
    ],

```

- Required properties
    - **userClassName** Fully qualified class name of your User model  
        Usually you don't need to specify it explicitly, since the module will detect it automatically
    - **idField** ID field of your User model  
        The field that corresponds to Yii::$app->user->id.  
        The default value is 'id'.
    - **usernameField** User name field of your User model  
        The default value is 'username'.
- Optional properties
    - **fullnameField** The field that specifies the full name of the user used in "view" page.  
        This can either be a field of the user model or of a related model (e.g. profile model).  
        When the field is of a related model, the name should be specified with a dot-separated notation (e.g. 'profile.full_name').  
        The default value is null.
    - **extraColumns** The definition of the extra columns used in the "index" page  
        This should be an array of the definitions of the grid view columns.  
        You may include the attributes of the related models as you see in the example above.  
        The default value is an empty array.
    - **searchClass** Fully qualified class name of your model for searching the user model  
        You have to supply the proper search model in order to enable the filtering and the sorting by the extra columns.  
        The default value is null.


Customizing Layout
------------------

By default, the admin module will use the layout specified in the application level.
In that case you have to write the menu for this module on your own.

By specifying the `layout` property, you can use one of the built-in layouts of the module:
'left-menu', 'right-menu' or 'top-menu', all equipped with the menu for this module.

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu', // defaults to null, using the application's layout without the menu
                                     // other avaliable values are 'right-menu' and 'top-menu'
        ],
        ...
    ],
```

If you use one of them, you can also customize the menu. You can change menu label or disable it.

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu',
            'menus' => [
                'assignment' => [
                    'label' => 'Grant Access' // change label
                ],
                'route' => null, // disable menu
            ],
        ],
        ...
    ],
```

While using a dedicated layout of the module, you may still want to have it wrapped in your application's main layout
that has your application's nav bar and your brand logo on it.
You can do it by specifying the `mainLayout` property with the application's main layout. For example:

```php
    'modules' => [
        'admin' => [
            ...
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            ...
        ],
        ...
    ],
```

[screenshots](https://goo.gl/r8RizT)
