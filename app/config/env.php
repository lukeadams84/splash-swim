<?php
return [

  'Security' => [
      'salt' => env('SECURITY_SALT', '9b79d7f819473b20a426276319b6ece5868886c5882ae60b1b1f1693c7a2d0b4'),
  ],

  'Datasources' => [
      'default' => [
          'className' => 'Cake\Database\Connection',
          'driver' => 'Cake\Database\Driver\Postgres',
          'persistent' => false,
          'host' => 'roach-ui',
          'port' => '26257',
          'username' => 'splashswim',
          'password' => '5FVunvUM!',
          'database' => 'splashswim',
          'encoding' => 'utf8',
          'cacheMetadata' => true,
          'schema' => 'splashswim',
          'quoteIdentifiers' => true,
          'log' => true,
      ],
      'logs' => [
          'className' => 'Cake\Database\Connection',
          'driver' => 'Cake\Database\Driver\Mysql',
          'persistent' => false,
          'host' => 'mysql-log',
          'username' => 'splashuser',
          'password' => '5FVunvUM!',
          'database' => 'logs',
          'encoding' => 'utf8',
          'timezone' => 'UTC',
          'flags' => [],
          'cacheMetadata' => true,
          'log' => false,
          'quoteIdentifiers' => true,
          'url' => env('DATABASE_URL', null),
      ],
  ]
]
 ?>
