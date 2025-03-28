<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CronQuestionUpdatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CronQuestionUpdatesTable Test Case
 */
class CronQuestionUpdatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CronQuestionUpdatesTable
     */
    public $CronQuestionUpdates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CronQuestionUpdates',
        'app.Clients',
        'app.Categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CronQuestionUpdates') ? [] : ['className' => CronQuestionUpdatesTable::class];
        $this->CronQuestionUpdates = TableRegistry::getTableLocator()->get('CronQuestionUpdates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CronQuestionUpdates);

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
