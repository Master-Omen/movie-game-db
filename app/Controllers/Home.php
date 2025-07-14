<?php

namespace App\Controllers;

use App\Models\UserModel;
use Exception;

class Home extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {

        if (get_cookie('remember_token')) {
            $remember_user = get_cookie('remember_user');
            $remember_token = get_cookie('remember_token');

            // session
            session()->set([
                'user' => $remember_user,
                'token_user' => $remember_token,
                'status_login' => true
            ]);

            return redirect()->to('/home');
        }

        // check status login
        if (session()->get('status_login')) {
            return redirect()->to('/home');
        }

        // check id or pass
        if ($this->request->getPost()) {

            $id = $this->request->getPost('username');
            $pass = $this->request->getPost('password');

            try {
                $find = $this->user->where([
                    'username' => $id,
                    'password' => $pass
                ])->first();

                if ($find == null) {
                    return redirect()->back()->withInput()->with('error', 'wrong password or username');
                }
            } catch (Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }

            // update token
            try {
                $bin2hex = bin2hex(random_bytes(32));
                $update_token = $bin2hex;

                $this->user->where('token_user', $find['token_user'])->set(['token_user' => $update_token])->update();
            } catch (Exception $e) {
                dd($e->getMessage());
            }

            // session
            session()->set([
                'user' => $find['username'],
                'token_user' => $update_token,
                'status_login' => true
            ]);


            $response = service('response');

            $check = $this->request->getPost('remember');

            // cookies
            if ($check == 'on') {
                $response->setCookie('remember_token', $update_token, time() + (60 * 60 * 24 * 365 * 10));
                $response->setCookie('remember_user', $find['username']);
            }

            return $response->redirect('/home');
        }


        return view('login');
    }

    public function register()
    {
        if (session()->get('status_login')) {
            return redirect()->to('/home');
        }

        if ($this->request->getPost()) {

            $rules = [
                'username' => [
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'is_unique' => 'username is registered.'
                    ]
                ],
                'password' => 'required|min_length[3]',
                'email' => [
                    'rules' => 'required|is_unique[users.email]',
                    'errors' => [
                        'is_unique' => 'Email is registered, try other email.'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata(['errors' => $this->validator->getErrors()]);

                return redirect()->back()->withInput();
            } else {

                try {
                    $rand_user = bin2hex(random_bytes(16));
                    $user_id = 'u' . $rand_user . 'id';

                    $bin2hex = bin2hex(random_bytes(32));
                    $token_user = $bin2hex;

                    $this->user->save([
                        'user_id' => $user_id,
                        'username' => $this->request->getPost('username'),
                        'password' => $this->request->getPost('password'),
                        'email' => $this->request->getPost('email'),
                        'token_user' => $token_user
                    ]);

                    session()->set([
                        'user' => $this->request->getPost('username'),
                        'token_user' => $token_user,
                        'status_login' => true
                    ]);

                    return redirect()->to('/home');
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            }
        }


        return view('register');
    }

    public function logout()
    {
        session()->set([
            'user' => '',
            'token_user' => '',
            'status_login' => false
        ]);

        $response = service('response');
        $response->deleteCookie('remember_token');
        $response->deleteCookie('remember_user');
        return $response->redirect('/');
    }

    public function home(): string
    {
        if (!session()->get('status_login')) {
            return $this->index();
        }

        $data = [
            'title' => 'Homepage',
            'user' => session()->get('user')
        ];

        return view('home', $data);
    }

    public function about()
    {
        if (!session()->get('status_login')) {
            return $this->index();
        }

        $data = [
            'title' => 'About'
        ];

        return view('about', $data);
    }

    public function profile(): string
    {
        if (!session()->get('status_login')) {
            return $this->index();
        }

        $token = session()->get('token_user');

        $row = $this->user->where('token_user', $token)->first();

        $data = [
            'title' => 'Homepage',
            'user' => session()->get('user'),

            'username' => $row['username'],
            'email' => $row['email'],
            'created' => $row['created_at'],
            'updated' => $row['updated_at']
        ];

        return view('profile', $data);
    }

    public function updateprofile()
    {
        if (!session()->get('status_login')) {
            return $this->index();
        } else if ($this->request->getPost()) {

            $rules = [
                'password' => 'required|min_length[3]'
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata(['errors' => $this->validator->getErrors()]);

                return redirect()->back()->withInput();
            } else {

                try {
                    $this->user->where('token_user', session()->get('token_user'))->set([
                        'password' => $this->request->getPost('password'),
                        'email' => $this->request->getPost('email')
                    ])->update();

                    return redirect()->to('/profile');
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
            }
        }

        $token = session()->get('token_user');

        $row = $this->user->where('token_user', $token)->first();

        $data = [
            'title' => 'Homepage',
            'user' => session()->get('user'),

            'username' => $row['username'],
            'password' => $row['password'],
            'email' => $row['email'],
            'created' => $row['created_at'],
            'updated' => $row['updated_at']
        ];

        return view('profile_update', $data);
    }
}
