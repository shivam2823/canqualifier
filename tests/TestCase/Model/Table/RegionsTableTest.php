<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegionsTable Test Case
 */
class RegionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegionsTable
     */
    public $Regions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Regions',
        'app.Clients',
        'app.Sites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Regions') ? [] : ['className' => RegionsTable::class];
        $this->Regions = TableRegistry::getTableLocator()->get('Regions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Regions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
