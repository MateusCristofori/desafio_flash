<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Deliveryman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "auto_increment" => true,
                'unsigned' => true,
            ],
            "firstName" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "lastName" => [
                "type" => "VARCHAR",
                "constraint" => 100,
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => 150,
            ],
            "cpf" => [
                "type" => "VARCHAR",
                "constraint" => 11,
            ],
            "cep" => [
                "type" => "VARCHAR",
                "constraint" => 8,
            ],
            "city" => [
                "type" => "VARCHAR",
                "constraint" => 50
            ],
            "created_at" => [
                "type"    => "TIMESTAMP",
                "default" => new RawSql("CURRENT_TIMESTAMP"),
            ],
            "updated_at" => [
                "type"    => "TIMESTAMP",
                "default" => new RawSql("CURRENT_TIMESTAMP"),
            ],
            "status" => [
                "type" => "ENUM",
                "constraint" => ["Entregue", "A caminho", "A confirmar"],
                "default" => "A confirmar",
            ],
        ]);
        $this->forge->addKey("id", true);
        $this->forge->createTable("deliveryman");
    }

    public function down()
    {
        $this->forge->dropTable("deliveryman");
    }
}
