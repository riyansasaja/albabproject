<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UsersManagement extends BaseController
{
    private $menu;
    protected $helpers = ['form', 'number'];
    public function __construct()
    {
        $menuModel = new MenuModel();

        // mengecek data masuk dimana
        if (in_groups('administrator')) {
            # code...
            $this->menu = $menuModel->where('auth_group_id', 1)->findAll();
        }
        if (in_groups('operator')) {
            # code...
            $this->menu = $menuModel->where('auth_group_id', 2)->findAll();
        }
        if (in_groups('bendahara')) {
            # code...
            $this->menu = $menuModel->where('auth_group_id', 4)->findAll();
        }
    }

    public function index()
    {
        //inisasi user model
        $userModel = new UserModel();
        //ambil data dari user model
        $data['users'] = $userModel->select('email, fullname, active,')->findAll();
        $data['menu'] = $this->menu;
        $data['title'] = "Dashboard";
        //tampilkan data di view admin
        return view('admin/usersmanagement', $data);
    }
}
