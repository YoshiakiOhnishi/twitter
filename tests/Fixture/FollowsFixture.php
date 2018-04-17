<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FollowsFixture
 *
 */
class FollowsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'fixed' => true, 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'followuser' => ['type' => 'string', 'fixed' => true, 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'username' => ['type' => 'index', 'columns' => ['username'], 'length' => []],
            'followuser' => ['type' => 'index', 'columns' => ['followuser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'follows_ibfk_1' => ['type' => 'foreign', 'columns' => ['username'], 'references' => ['users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'follows_ibfk_2' => ['type' => 'foreign', 'columns' => ['followuser'], 'references' => ['users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'username' => 'Lorem ipsum dolor ',
            'followuser' => 'Lorem ipsum dolor ',
            'created' => 1523808271
        ],
    ];
}
