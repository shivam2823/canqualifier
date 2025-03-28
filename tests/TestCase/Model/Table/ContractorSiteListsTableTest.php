<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContractorSiteListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContractorSiteListsTable Test Case
 */
class ContractorSiteListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContractorSiteListsTable
     */
    public $ContractorSiteLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContractorSiteLists',
        'app.Contractors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContractorSiteLists') ? [] : ['className' => ContractorSiteListsTable::class];
        $this->ContractorSiteLists = TableRegistry::getTableLocator()->get('ContractorSiteLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ContractorSiteLists);

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
