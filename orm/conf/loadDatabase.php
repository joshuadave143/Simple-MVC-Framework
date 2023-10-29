<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'post' => '\\SimpleMVC\\Map\\PostTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Post' => '\\SimpleMVC\\Map\\PostTableMap',
    ),
  ),
));
