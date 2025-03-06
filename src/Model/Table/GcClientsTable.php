<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class GcClientsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('gc_clients'); // Ensure this matches the database table name
        $this->setPrimaryKey('id'); // Ensure this matches your primary key
    }
}