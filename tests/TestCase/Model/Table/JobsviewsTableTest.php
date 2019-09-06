<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsviewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsviewsTable Test Case
 */
class JobsviewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsviewsTable
     */
    public $Jobsviews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Jobsviews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Jobsviews') ? [] : ['className' => JobsviewsTable::class];
        $this->Jobsviews = TableRegistry::get('Jobsviews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jobsviews);

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
