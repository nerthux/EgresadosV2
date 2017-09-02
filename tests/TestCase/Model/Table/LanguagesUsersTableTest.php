<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LanguagesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LanguagesUsersTable Test Case
 */
class LanguagesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LanguagesUsersTable
     */
    public $LanguagesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.languages_users',
        'app.languages',
        'app.users',
        'app.generations',
        'app.forms',
        'app.questions',
        'app.options',
        'app.questions_users',
        'app.careers',
        'app.careers_forms',
        'app.forms_generations',
        'app.companies',
        'app.sectors',
        'app.companies_users',
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
        $config = TableRegistry::exists('LanguagesUsers') ? [] : ['className' => LanguagesUsersTable::class];
        $this->LanguagesUsers = TableRegistry::get('LanguagesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LanguagesUsers);

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
