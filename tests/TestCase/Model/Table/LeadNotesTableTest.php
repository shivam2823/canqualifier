<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadNotesTable Test Case
 */
class LeadNotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadNotesTable
     */
    public $LeadNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LeadNotes',
        'app.Leads',
        'app.CustomerRepresentative'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LeadNotes') ? [] : ['className' => LeadNotesTable::class];
        $this->LeadNotes = TableRegistry::getTableLocator()->get('LeadNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LeadNotes);

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
