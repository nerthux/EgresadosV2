<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SkillsUsers Controller
 *
 * @property \App\Model\Table\SkillsUsersTable $SkillsUsers
 *
 * @method \App\Model\Entity\SkillsUser[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    public function generate()
    {

    }
    public function test()
    {
        $query = $this->Questions_Users->find();
    }
}
