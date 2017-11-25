<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $type
 * @property int $form_id
 * @property string $choices
 * @property bool $required
 * @property string $conditional
 * @property string $columns
 * @property string $rows
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Form $form
 * @property \App\Model\Entity\User[] $users
 */
class Question extends Entity
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
        'label' => true,
        'type' => true,
        'form_id' => true,
        'choices' => true,
        'required' => true,
        'conditional' => true,
        'columns' => true,
        'rows' => true,
        'created' => true,
        'modified' => true,
        'form' => true,
        'users' => true
    ];
}
