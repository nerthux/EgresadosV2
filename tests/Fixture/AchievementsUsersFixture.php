<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AchievementsUsersFixture
 *
 */
class AchievementsUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'achievement_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'users_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'level' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_achivements_has_users_users1_idx' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'fk_achievements_has_users_languages1_idx' => ['type' => 'index', 'columns' => ['achievement_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_achievements_has_users_languages1' => ['type' => 'foreign', 'columns' => ['achievement_id'], 'references' => ['achievements', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_achievements_has_users_users1' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
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
            'achievement_id' => 1,
            'users_id' => 1,
            'level' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-09-06 00:39:16',
            'modified' => '2017-09-06 00:39:16'
        ],
    ];
}
