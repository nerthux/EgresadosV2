<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CareersFormsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CareersFormsController Test Case
 */
class CareersFormsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.careers_forms',
        'app.careers',
        'app.users',
        'app.generations',
        'app.forms',
        'app.questions',
        'app.options',
        'app.questions_users',
        'app.forms_generations',
        'app.companies',
        'app.sectors',
        'app.companies_users',
        'app.languages',
        'app.languages_users',
        'app.skills',
        'app.skills_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
