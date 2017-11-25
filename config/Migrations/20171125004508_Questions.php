<?php
use Migrations\AbstractMigration;

class Questions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('questions');
        $table->addColumn('colums', 'text')
              ->addColum('rows','text')
	      ->update();    
    }
}
