<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function connexion()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[120]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "L'adresse e-mail ou le mot de passe ne correspondent pas",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/connexion', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stockage des valeurs de session
                $this->setUserSession($user);

                // Redirection vers le tableau de bord après la connexion
                if($user['role'] == "admin"){

                    return redirect()->to(base_url('admin'));

                }
            }
        }
        return view('auth/connexion');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'pseudo' => $user['pseudo'],
            'phone' => $user['phone'],
            'birthday' => $user['birthday'],
            'taille' => $user['taille'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }
    public function inscription()
    {
        $data = [];
		helper(['form']);
        if ($this->request->getMethod() == 'post') {
            # La validation ici
            $rules = [
                'pseudo' => 'required|min_length[4]|max_length[120]|is_unique[users.pseudo]',
				'email' => 'required|min_length[6]|max_length[120]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[6]|max_length[255]',
				'cpassword' => 'matches[password]',
            ];
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $newData = [
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Inscription réussie');
				return redirect()->to('/connexion');

            }
            
        }
        return view('auth/inscription', $data);
    }

    
    
    
    
    
    
    
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}