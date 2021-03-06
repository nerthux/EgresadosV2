<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Form Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $editor
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\QuestionsUser[] $questions_users
 * @property \App\Model\Entity\Career[] $careers
 * @property \App\Model\Entity\Generation[] $generations
 */
class Form extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'editor' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'questions' => true,
        'questions_users' => true,
        'careers' => true,
        'generations' => true
    ];
}
