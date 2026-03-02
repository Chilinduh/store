<?php

use yii\rest\UrlRule as RestUrlRule;
use yii\web\UrlRule;

return [
  '' => 'site/index',
  'index' => 'site/index',
  'about' => 'site/about',
  'users' => 'user/index',
  'brands' => 'brands/index',
  'products' => 'products/index',
  'catalog' => 'catalog/index',
  'register' => 'auth/register',
  'cart' => 'cart/order',
  'POST login' => 'auth/login',
  'login' => 'auth/login',
  'logout' => 'auth/logout',
  'POST logout' => 'auth/logout',
  'checkout' => 'cart/checkout',
  'order' => 'cart/order',
  'product' => 'product/index',

  '<action:\w+>'=>'<action>/index',
  '<controller:\w+>/<id:\d+>'=>'<controller>/update',
  '<controller:\w+>/<id:\d+>/delete'=>'<controller>/delete',
  '<controller:\w+>/<id:\d+>/<action>'=>'<controller>/<action>',

  'category-groups/<id:\d+>/delete' => 'category-groups/delete',

  'city' => 'city/index',

  'settings/city' => 'settings/city',
  'settings/index' => 'settings',
  'materials/index' => 'materials',

  'orders/<id:\d+>/update' => 'orders/update',
  'orders/<id:\d+>/delete' => 'orders/delete',
  'GET, POST orders/<id:\d+>/update' => 'orders/update',
  'GET orders/<id:\d+>/products' => 'orders/products',
  'GET orders/<id:\d+>' => 'orders/update',

  'blocks-types/<id:\d+>' => 'blocks-types/update',
  'blocks-types/<id:\d+>/delete' => 'blocks-types/delete',
  'category-groups/<id:\d+>' => 'category-groups/update',

  'cargo-request/<id:\d+>' => 'cargo-request/update',
  'cargo-driver/<id:\d+>' => 'cargo-driver/update',
  'cargo-carrier/<id:\d+>' => 'cargo-carrier/update',
  'cargo-counterparty/<id:\d+>' => 'cargo-counterparty/update',

  'cargo-request/<id:\d+>/update-good' => 'cargo-request/update-good',
  'cargo-request/<id:\d+>/update-driver' => 'cargo-request/update-driver',
  'cargo-request/<id:\d+>/update-route' => 'cargo-request/update-route',
  'cargo-request/<id:\d+>/update-route/<route_id:\d+>' => 'cargo-request/update-route',

  'cargo-orders/<id:\d+>/update-good' => 'cargo-orders/update-good',
  'cargo-orders/<id:\d+>/map' => 'cargo-orders/map',
  'cargo-orders/<id:\d+>/update-driver' => 'cargo-orders/update-driver',
  'cargo-orders/<id:\d+>/update-carrier' => 'cargo-orders/update-carrier',
  'cargo-orders/<id:\d+>/update-route' => 'cargo-orders/update-route',
  'cargo-orders/<id:\d+>/order-comment' => 'cargo-orders/order-comment',
  'cargo-orders/<id:\d+>/carrier-comment' => 'cargo-orders/carrier-comment',
  'cargo-orders/<id:\d+>/update-route/<route_id:\d+>' => 'cargo-orders/update-route',
  'cargo-orders/<id:\d+>' => 'cargo-orders/update',

  'good-request/<id:\d+>/count' => 'good-request/count',
  'good-request/<id:\d+>/status' => 'good-request/status',
  'good-request/<id:\d+>/delete' => 'good-request/delete',
  'good-request/<id:\d+>' => 'good-request/update',
  'good-request/route-start' => 'good-request/route-start',

  'good-write-off/<id:\d+>/delete' => 'good-write-off/delete',

  'good-write-off/<id:\d+>' => 'good-write-off/update',

  'attributes-groups/<id:\d+>' => 'attributes-groups/update',
  'attributes-groups/<id:\d+>/product-attributes' => 'attributes-groups/product-attributes',
  'attributes-groups/<attribute_group_id:\d+>/attributes/<id:\d+>/delete' => 'attributes-groups/attribute-delete',


  'review/<id:\d+>/update' => 'review/update',
  'review/<id:\d+>/delete' => 'review/delete',
  'GET, POST review/<id:\d+>/update' => 'review/update',

  'delivery-types/<id:\d+>/update' => 'delivery-types/update',
  'delivery-types/<id:\d+>/delete' => 'delivery-types/delete',
  'GET, POST delivery-types/<id:\d+>/update' => 'delivery-types/update',

  'units/<id:\d+>/update' => 'units/update',
  'units/<id:\d+>/delete' => 'units/delete',
  'GET, POST units/<id:\d+>/update' => 'units/update',

  'news/<id:\d+>/delete' => 'news/delete',
  'news/<id:\d+>' => 'news/update',

  'colors/<id:\d+>' => 'colors/update',
  'colors/<id:\d+>/delete' => 'colors/delete',
  'GET, POST colors/<id:\d+>/update' => 'colors/update',

  'city/update/<id:\d+>' => 'city/update',
  'city/delete/<id:\d+>' => 'city/delete',
  'GET, POST city/update/<id:\d+>' => 'city/update',

  'POST files/<id:\d+>/update' => 'files/update',

  'POST products/<id:\d+>/ingredients/create' => 'products/ingredients-update',
  'products/<id:\d+>/ingredients/<ingredient_id:\d+>/delete' => 'products/ingredients-delete',

  'color-groups' => 'color-groups/index',
  'color-groups/<id:\d+>' => 'color-groups/update',
  'color-groups/<id:\d+>/products' => 'color-groups/products',
  'color-groups/<id:\d+>/products/<group_id:\d+>/delete' => 'color-groups/products-delete',
  'color-groups/<id:\d+>/delete' => 'color-groups/delete',
  'GET, POST color-groups/update/<id:\d+>' => 'color-groups/update',

  'weight-groups' => 'weight-groups/index',
  'weight-groups/<id:\d+>' => 'weight-groups/update',
  'weight-groups/<id:\d+>/products' => 'weight-groups/products',
  'weight-groups/<id:\d+>/products/<group_id:\d+>/delete' => 'weight-groups/products-delete',
  'weight-groups/<id:\d+>/delete' => 'weight-groups/delete',
  'GET, POST weight-groups/update/<id:\d+>' => 'weight-groups/update',

  'payment-types' => 'payment-types/index',
  'payment-types/update/<id:\d+>' => 'payment-types/update',
  'payment-types/delete/<id:\d+>' => 'payment-types/delete',
  'GET, POST payment-types/update/<id:\d+>' => 'payment-types/update',

  'manufacturers' => 'manufacturers/index',
  'manufacturers/update/<id:\d+>' => 'manufacturers/update',
  'manufacturers/delete/<id:\d+>' => 'manufacturers/delete',
  'GET, POST manufacturers/update/<id:\d+>' => 'manufacturers/update',

  'packaging-type' => 'packaging-type/index',
  'packaging-type/update/<id:\d+>' => 'packaging-type/update',
  'packaging-type/delete/<id:\d+>' => 'packaging-type/delete',
  'GET, POST packaging-typ/update/<id:\d+>' => 'packaging-type/update',


  'ingredients' => 'ingredients/index',
  'ingredients/update/<id:\d+>' => 'ingredients/update',
  'ingredients/delete/<id:\d+>' => 'ingredients/delete',
  'GET, POST ingredients/update/<id:\d+>' => 'ingredients/update',

  'menu' => 'menu/index',
  'menu/update/<id:\d+>' => 'menu/update',
  'menu/delete/<id:\d+>' => 'menu/delete',
  'GET, POST menu/update/<id:\d+>' => 'menu/update',

  'image' => 'image/index',
  'image/update/<id:\d+>/update' => 'image/update',
  'image/update/<id:\d+>' => 'image/index',
  'image/create' => 'image/create',
  'image/delete/<id:\d+>' => 'image/delete',
  'GET, POST image/update/<id:\d+>' => 'image/update',

  'category' => 'category/index',
  'category/<parent_id:\d+>' => 'category/index',
  'category/<parent_id:\d+>/sub/<sub_id:\d+>' => 'category/index',
  'category/<parent_id:\d+>/sub/<sub_id:\d+>/create' => 'category/create',
  'category/<id:\d+>/update' => 'category/update',
  'category/<id:\d+>/create' => 'category/create',
  'category/<id:\d+>/delete' => 'category/delete',
  'GET, POST category/update/<id:\d+>' => 'category/update',
  'category/create' => 'category/create',

  'brands/update/<id:\d+>' => 'brands/update',
  'brands/<id:\d+>/delete' => 'brands/delete',
  'GET, POST brands/update/<id:\d+>' => 'brands/update',
  'brands/create' => 'brands/create',

  'user' => 'user/index',
  'user/<id:\d+>/update' => 'user/update',
  'user/<id:\d+>/delete' => 'user/delete',
  'GET, POST user/update/<id:\d+>' => 'user/update',
  'user/create' => 'user/create',

  'category-type' => 'category-type/index',
  'categoryType/update/<id:\d+>' => 'categoryType/update',
  'categoryType/delete/<id:\d+>' => 'categoryType/delete',
  'GET, POST categoryType/update/<id:\d+>' => 'categoryType/update',
  'categoryType/create' => 'user/create',

  'products/<id:\d+>' => 'products/update',
  'products/<id:\d+>/update-files' => 'products/update-files',
  'products/<id:\d+>/prices' => 'products/prices',

  'products/<id:\d+>/update-sources' => 'products/update-sources',

  'products/<id:\d+>/related' => 'products/related',
  'products/<id:\d+>/create' => 'products/create',
  'products/<id:\d+>/delete' => 'products/delete',
  'products/<id:\d+>/materials' => 'products/materials',
  'products/<id:\d+>/attributes' => 'products/attributes',
  'products/<id:\d+>/materials/<material_id:\d+>/delete' => 'products/materials-delete',
  'products/<id:\d+>/files/<file_id:\d+>/delete' => 'products/images-delete',
  'GET, POST products/update/<id:\d+>' => 'products/update',

  'property/<id:\d+>' => 'property/update',

  'products/<id:\d+>/images/<image_id:\d+>/delete' => 'products/images-delete',

  'products/<id:\d+>/groups' => 'products/groups',
  'GET, POST products/update/<id:\d+>/items' => 'products/groups',

  'sizes/<id:\d+>' => 'sizes/update',

  'stocks/<id:\d+>' => 'stocks/update',
  'stocks/create' => 'stocks/create',
  'stocks/<id:\d+>/delete' => 'stocks/delete',
  'product-stock/<id:\d+>' => 'product-stock/update',
  'product-stock/<id:\d+>/delete' => 'product-stock/delete',

  'products/<id:\d+>/groups/<group_id:\d+>' => 'products/groups-update',
  'products/<id:\d+>/groups/<group_id:\d+>/create' => 'products/groups-create',
  'products/<id:\d+>/groups/<group_id:\d+>/delete' => 'products/groups-delete',
];
