<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesUsersTable Test Case
 */
class CompaniesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesUsersTable
     */
    public $CompaniesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_users',
        'app.companies',
        'app.sectors',
        'app.users',
        'app.generations',
        'app.forms',
        'app.questions',
        'app.options',
        'app.questions_users',
        'app.careers',
        'app.careers_forms',
        'app.forms_generations',
        'app.languages',
        'app.languages_users',
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
        $config = TableRegistry::exists('CompaniesUsers') ? [] : ['className' => CompaniesUsersTable::class];
        $this->CompaniesUsers = TableRegistry::get('CompaniesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesUsers);

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
