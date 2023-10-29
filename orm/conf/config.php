<?php

  $serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
  $serviceContainer->checkVersion(2);
  $serviceContainer->setAdapterClass('default', 'mysql');
  $manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('default');
  $manager->setConfiguration(array (
    'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
    'dsn' => 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'attributes' =>
    array (
      'ATTR_EMULATE_PREPARES' => false,
      'ATTR_TIMEOUT' => 30,
    ),
    'model_paths' =>
    array (
      0 => 'src',
      1 => 'vendor',
    ),
  ));
  $serviceContainer->setConnectionManager($manager);
  $serviceContainer->setDefaultDatasource('default');
  require_once __DIR__ . '/loadDatabase.php';
