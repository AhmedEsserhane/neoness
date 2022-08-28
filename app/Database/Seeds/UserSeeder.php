<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
	public function run()
	{
		$user_object = new UserModel();

		$user_object->insertBatch([
			[
				"nom" => "ESSERHANE",
				"prenom" => "Farid",
				"pseudo" => "didouche",
				"taille" => "172",
				"email" => "esserhane@mail.com",
				"phone" => "0750052821",
				"role" => "admin",
				"password" => password_hash("azerty", PASSWORD_DEFAULT)
			]
		]);
	}
}