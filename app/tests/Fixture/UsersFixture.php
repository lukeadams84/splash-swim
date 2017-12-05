<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'username' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'password' => ['type' => 'string', 'length' => 510, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'email' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'firstname' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'lastname' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'phone' => ['type' => 'string', 'length' => 40, 'default' => 'NULL', 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'address1' => ['type' => 'string', 'length' => 100, 'default' => 'NULL', 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'address2' => ['type' => 'string', 'length' => 100, 'default' => 'NULL', 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'town' => ['type' => 'string', 'length' => 100, 'default' => 'NULL', 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'county' => ['type' => 'string', 'length' => 100, 'default' => 'NULL', 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'role' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null, 'collate' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'firstname' => 'Lorem ipsum dolor sit amet',
            'lastname' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsum dolor sit amet',
            'address1' => 'Lorem ipsum dolor sit amet',
            'address2' => 'Lorem ipsum dolor sit amet',
            'town' => 'Lorem ipsum dolor sit amet',
            'county' => 'Lorem ipsum dolor sit amet',
            'role' => 'Lorem ipsum dolor sit amet',
            'created' => 1512497791,
            'modified' => 1512497791
        ],
    ];
}
