<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StayprogramsgroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StayprogramsgroupsTable Test Case
 */
class StayprogramsgroupsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stayprogramsgroups',
        'app.activities',
        'app.tags',
        'app.testimonials',
        'app.images',
        'app.metas',
        'app.resorts',
        'app.features',
        'app.galleries',
        'app.nearbyplaces',
        'app.videos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stayprogramsgroups') ? [] : ['className' => 'App\Model\Table\StayprogramsgroupsTable'];
        $this->Stayprogramsgroups = TableRegistry::get('Stayprogramsgroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stayprogramsgroups);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
