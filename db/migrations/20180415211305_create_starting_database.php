<?php


use Phinx\Migration\AbstractMigration;

class CreateStartingDatabase extends AbstractMigration {
	/**
	 * Change Method.
	 *
	 * Write your reversible migrations using this method.
	 *
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 *
	 * The following commands can be used in this method and Phinx will
	 * automatically reverse them when rolling back:
	 *
	 *    createTable
	 *    renameTable
	 *    addColumn
	 *    renameColumn
	 *    addIndex
	 *    addForeignKey
	 *
	 * Remember to call "create()" or "update()" and NOT "save()" when working
	 * with the Table class.
	 */
	public function change() {

	    $table = $this->table('leads_table');

	    $table->addColumn('name', 'string')
            ->addColumn('surname', 'string')
            ->addColumn('email', 'string')
            ->addColumn('phone', 'string')
            ->addColumn('zip', 'string')
            ->addColumn('privacy', 'string')
            ->addColumn('carId', 'integer')
            ->create();

	}
}
