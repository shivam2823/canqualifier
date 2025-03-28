<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeContractorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeContractorsTable Test Case
 */
class EmployeeContractorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeContractorsTable
     */
    public $EmployeeContractors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmployeeContractors',
        'app.Employees',
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
        $config = TableRegistry::getTableLocator()->exists('EmployeeContractors') ? [] : ['className' => EmployeeContractorsTable::class];
        $this->EmployeeContractors = TableRegistry::getTableLocator()->get('EmployeeContractors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EmployeeContractors);

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
