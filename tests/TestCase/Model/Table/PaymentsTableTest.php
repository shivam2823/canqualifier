<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentsTable Test Case
 */
class PaymentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentsTable
     */
    public $Payments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Payments',
        'app.Contractors',
        'app.ContractorInvoices',
        'app.PaymentDetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Payments') ? [] : ['className' => PaymentsTable::class];
        $this->Payments = TableRegistry::getTableLocator()->get('Payments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Payments);

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
