<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Content;
use App\Models\UserModel;
use Exception;

class ListController extends BaseController
{
    protected $user;
    protected $db;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->db = new Content();
    }

    public function favorite($type = null)
    {
        if (!session()->get('status_login')) {
            return redirect()->to('/');
        }

        try {
            $token = session()->get('token_user');
            $check_User = $this->user->where('token_user', $token)->first();

            if ($check_User) {
                if ($type == "tvSeries") {

                    $data = $this->db->where('favorite', true)->where('user_id', $check_User['user_id'])->whereIn('type', [$type, 'tvMiniSeries'])->paginate(12);
                } else if ($type != null) {
                    $data = $this->db->where(['favorite' => true, 'user_id' => $check_User['user_id'], 'type' => $type])->paginate(12);
                } else {
                    $data = $this->db->where(['favorite' => true, 'user_id' => $check_User['user_id']])->paginate(12);
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        $data = [
            'title' => 'Favorite',
            'data' => $data,
            'pager' => $this->db->pager
        ];

        return view('favorite', $data);
    }

    public function watchlist($type = null)
    {
        if (!session()->get('status_login')) {
            return redirect()->to('/');
        }

        try {
            $token = session()->get('token_user');
            $check_User = $this->user->where('token_user', $token)->first();
            if ($check_User) {

                if ($type != null) {
                    $data = $this->db->where(['watchlist' => true, 'user_id' => $check_User['user_id'], 'type' => $type])->paginate(12);
                } else {
                    $data = $this->db->where(['watchlist' => true, 'user_id' => $check_User['user_id']])->paginate(12);
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        $data = [
            'title' => 'Watchlist',
            'data' => $data,
            'pager' => $this->db->pager
        ];

        return view('watchlist', $data);
    }
}
