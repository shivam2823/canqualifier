<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsTable Test Case
 */
class ClientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsTable
     */
    public $Clients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Clients',
        'app.AccountTypes',
        'app.States',
        'app.Countries',
        'app.Users',
        'app.ClientQuestions',
        'app.ClientServices',
        'app.Questions',
        'app.Regions',
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
        $config = TableRegistry::getTableLocator()->exists('Clients') ? [] : ['className' => ClientsTable::class];
        $this->Clients = TableRegistry::getTableLocator()->get('Clients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Clients);

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
