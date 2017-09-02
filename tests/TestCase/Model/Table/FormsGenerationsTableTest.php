<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormsGenerationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormsGenerationsTable Test Case
 */
class FormsGenerationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormsGenerationsTable
     */
    public $FormsGenerations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.forms_generations',
        'app.forms',
        'app.questions',
        'app.options',
        'app.users',
        'app.generations',
        'app.careers',
        'app.careers_forms',
        'app.companies',
        'app.sectors',
        'app.companies_users',
        'app.languages',
        'app.languages_users',
        'app.questions_users',
        'app.skills',
        'app.skills_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormsGenerations') ? [] : ['className' => FormsGenerationsTable::class];
        $this->FormsGenerations = TableRegistry::get('FormsGenerations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormsGenerations);

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
