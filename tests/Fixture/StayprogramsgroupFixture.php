<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StayprogramsgroupFixture
 *
 */
class StayprogramsgroupFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'stayprogramsgroup';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Id' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Group_Name' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Activities' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'DOC' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'DOU' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'Id' => 1,
            'Group_Name' => 'Lorem ipsum dolor sit amet',
            'Activities' => 'Lorem ipsum dolor sit amet',
            'Status' => 1,
            'DOC' => '2016-02-03 10:59:17',
            'DOU' => '2016-02-03 10:59:17'
        ],
    ];
}
