<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Content;
use App\Models\Free_api;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Search extends BaseController
{

    protected $api;
    protected $db;
    protected $users;

    public function __construct()
    {
        $this->api = new Free_api();
        $this->db = new Content();
        $this->users = new UserModel();
    }

    public function index()
    {

        if (!session()->get('status_login')) {
            return redirect()->to('/home');
        }

        if ($this->request->getGet('query')) {
            $query = $this->request->getGet('query');
            $get = $this->api->get_api($query);
        } else {
            $get = $this->api->get_api();
        }

        $data = [
            'title' => 'Search',
            'data' => $get
        ];

        return view('search', $data);
    }

    public function more($id)
    {
        $token = session()->get('token_user');

        $user = $this->users->where('token_user', $token)->first();
        $check = $this->db->where(['imdbId' => $id, 'user_id' => $user['user_id']])->first();

        if ($check) {

            // if rating masih 0
            if ($check['ratingsSummary'] == 0) {
                $auto_update = $this->api->more($check['imdbId']);

                $data = [
                    'title' => 'Update Detail',
                    'row' => $auto_update,
                    'favorite' => $check['favorite'],
                    'watchlist' => $check['watchlist']
                ];

                $auto_update['genres'] = json_encode($auto_update['genres']);
                $auto_update['images'] = json_encode($auto_update['images']);

                $this->db->where(['imdbId' => $id, 'user_id' => $user['user_id']])->set($auto_update)->update();

                return view('detail', $data);
            }

            $check['genres'] = json_decode($check['genres'], true);
            $check['images'] = json_decode($check['images'], true);

            $data = [
                'title' => 'Detail from db',
                'row' => $check,
                'favorite' => $check['favorite'],
                'watchlist' => $check['watchlist']
            ];

            return view('detail', $data);
        }

        $get = $this->api->more($id);

        $data = [
            'title' => 'Detail',
            'row' => $get,
            'favorite' => false,
            'watchlist' => false
        ];

        session()->setFlashdata('button', 'add');
        session()->set('row', $get);

        return view('detail', $data);
    }

    public function save()
    {

        $token = session()->get('token_user');

        try {

            $check = $this->users->where('token_user', $token)->first();

            if ($check) {

                $row = session()->get('row');

                // add user id
                $row['user_id'] = $check['user_id'];

                $order = $this->request->getPost('order');

                $row['genres'] = json_encode($row['genres']);
                $row['images'] = json_encode($row['images']);

                // check apakah content, user_id sudah ada di db atau tidak
                $check_content = $this->db->where(['imdbId' => $this->request->getPost('id'), 'user_id' => $row['user_id']])->first();

                if ($order == 'favorite') {
                    $row['favorite'] = true;

                    if ($check_content) {
                        $this->db->where(['imdbId' => $check_content['imdbId'], 'user_id' => $check['user_id']])->set(['favorite' => $row['favorite']])->update();
                        return redirect()->back();
                    }
                } else if ($order == 'watchlist') {
                    $row['watchlist'] = true;

                    if ($check_content) {
                        $this->db->where(['imdbId' => $check_content['imdbId'], 'user_id' => $check['user_id']])->set(['watchlist' => $row['watchlist']])->update();
                        return redirect()->back();
                    }
                }

                $this->db->save($row);
            }

            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete()
    {

        $token = session()->get('token_user');

        try {

            $check = $this->users->where('token_user', $token)->first();

            if ($check) {
                $user_id = $check['user_id'];
                $id = $this->request->getPost('id');
                $order = $this->request->getPost('order');

                if ($order == 'favorite') {
                    $this->db->where(['user_id' => $user_id, 'imdbId' => $id])->set(['favorite' => false])->update();
                } else if ($order == 'watchlist') {
                    $this->db->where(['user_id' => $user_id, 'imdbId' => $id])->set(['watchlist' => false])->update();
                }

                $check_db = $this->db->where(['imdbId' =>  $id, 'user_id' => $user_id])->first();

                if ($check_db['favorite'] == false && $check_db['watchlist'] == false) {
                    $this->db->where(['imdbId' =>  $id, 'user_id' => $user_id])->delete();
                }
            }

            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
