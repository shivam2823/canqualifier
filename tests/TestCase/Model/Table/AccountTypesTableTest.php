<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountTypesTable Test Case
 */
class AccountTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountTypesTable
     */
    public $AccountTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AccountTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AccountTypes') ? [] : ['className' => AccountTypesTable::class];
        $this->AccountTypes = TableRegistry::getTableLocator()->get('AccountTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AccountTypes);

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
