<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesTable Test Case
 */
class ServicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicesTable
     */
    public $Services;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Services',
        'app.Categories',
        'app.ClientServices',
        'app.Products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Services') ? [] : ['className' => ServicesTable::class];
        $this->Services = TableRegistry::getTableLocator()->get('Services', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Services);

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
