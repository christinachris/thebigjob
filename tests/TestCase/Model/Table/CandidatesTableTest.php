<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidatesTable Test Case
 */
class CandidatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidatesTable
     */
    public $Candidates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Candidates',
        'app.Applications',
        'app.Jobs',
        'app.JobHistories',
        'app.Orders',
        'app.Posts',
        'app.Qualifications',
        'app.Skills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Candidates') ? [] : ['className' => CandidatesTable::class];
        $this->Candidates = TableRegistry::get('Candidates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Candidates);

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
