<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function connexion()
    {
		
        $data = [];
        helper(['form']);

		if ($this->request->getMethod() == 'post') {
			
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'L\'e-mail ou le mot de passe ne correspondent pas'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UsersModel();
				$user = $model->where('email', $this->request->getVar('email'))
											->first();
											
				$this->setUserSession($user);
				return redirect()->to('dashboard');

			}
		}

        echo view('templates/header', $data);
        echo view('users/connexion');
        echo view('templates/footer');

    }
    private function setUserSession($user)
	{
		 
		$data = [
			'id' => $user['id'],
			'pseudo' => $user['pseudo'],
			'nom' => $user['nom'],
			'prenom' => $user['prenom'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function inscription()
	{
		 
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'pseudo' => 'required|min_length[3]|max_length[20]|is_unique[users.pseudo]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[6]|max_length[255]',
				'cpassword' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UsersModel();

				$newData = [
					'nom' => $this->request->getVar('nom'),
					'prenom' => $this->request->getVar('prenom'),
					'pseudo' => $this->request->getVar('pseudo'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Inscription réussie');
				return redirect()->to('/connexion');

			}
		}
        echo view('templates/header', $data);
        echo view('users/inscription');
        echo view('templates/footer');
	}

	public function profile()
	{
		 
		$data = [];
		helper(['form']);
		$model = new UsersModel();

		if ($this->request->getMethod() == 'post') 
		{
			//let's do the validation here
			$rules = [

				'nom' => 'required|min_length[3]|max_length[20]',
				'prenom' => 'required|min_length[3]|max_length[20]',
				'pseudo' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != '')
			{
				$rules['password'] = 'required|min_length[6]|max_length[255]';
				//$rules['cpassword'] = 'matches[password]';
			}


			if (! $this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			}
			else
			{

				$newData = [
					'id' => session()->get('id'),
					'nom' => $this->request->getPost('nom'),
					'prenom' => $this->request->getPost('prenom'),
					'pseudo' => $this->request->getPost('pseudo'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
					//var_dump($newData);
					//exit;

				$model->save($newData);

				session()->setFlashdata('success', 'Mis à jour avec succès');
				return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('users/profile');
        echo view('templates/footer');
	}

	public function password()
	{
		 
		$data = [];
		helper(['form']);
		$model = new UsersModel();

		if ($this->request->getMethod() == 'post') 
		{
			//let's do the validation here
			$rules = [

				'nom' => 'required|min_length[3]|max_length[20]',
				'prenom' => 'required|min_length[3]|max_length[20]',
				'pseudo' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != '')
			{
				$rules['apassword'] = 'required|min_length[6]|max_length[255]';
				$rules['password'] = 'required|min_length[6]|max_length[255]';
				$rules['apassword'] = 'matches[password]';
				$rules['cpassword'] = 'matches[password]';
			}


			if (! $this->validate($rules)) 
			{
				$data['validation'] = $this->validator;
			}
			else
			{

				$newData = [
					'id' => session()->get('id'),
					'nom' => $this->request->getPost('nom'),
					'prenom' => $this->request->getPost('prenom'),
					'pseudo' => $this->request->getPost('pseudo'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
					//var_dump($newData);
					//exit;

				$model->save($newData);

				session()->setFlashdata('success', 'Mis à jour avec succès');
				return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('users/profile');
        echo view('templates/footer');
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	public function dashboard(){
		$data = [];
        helper(['form']);
		$model = new UsersModel();
		
		
		
		
		
		
		$data['user'] = $model->where('id', session()->get('id'))->first();

		echo view('templates/header', $data);
        echo view('users/dashboard');
        echo view('templates/footer');
	}

}
