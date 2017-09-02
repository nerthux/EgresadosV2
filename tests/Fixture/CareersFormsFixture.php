<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CareersFormsFixture
 *
 */
class CareersFormsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'career_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'form_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_careers_has_forms_forms1_idx' => ['type' => 'index', 'columns' => ['form_id'], 'length' => []],
            'fk_careers_has_forms_careers1_idx' => ['type' => 'index', 'columns' => ['career_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_careers_has_forms_careers1' => ['type' => 'foreign', 'columns' => ['career_id'], 'references' => ['careers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_careers_has_forms_forms1' => ['type' => 'foreign', 'columns' => ['form_id'], 'references' => ['forms', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'career_id' => 1,
            'form_id' => 1,
            'created' => '2017-09-02 23:18:38',
            'modified' => '2017-09-02 23:18:38'
        ],
    ];
}
