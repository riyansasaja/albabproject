<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\GroupModel as ModelsGroupModel;

class UsersManagement extends BaseController
{
    private $menu;
    private $userModel;
    protected $helpers = ['form', 'number'];
    public function __construct()
    {
        $menuModel = new MenuModel();
        $this->userModel = new UserModel();

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
        $userModel = $this->userModel;
        //ambil data dari user model
        $data['users'] = $userModel->select('email, username, fullname, active,')->findAll();
        $data['usersactive'] = $userModel->where('active', 1)->countAllResults();
        $data['menu'] = $this->menu;
        $data['title'] = "User Management";
        //tampilkan data di view admin
        return view('admin/usersmanagement', $data);
    }

    public function userDetil($username)
    {
        $authorize = $auth = service('authorization');
        $modelGroup = new ModelsGroupModel();

        //ambil data by username
        $data['user'] = $this->userModel->where('username', $username)->first();
        //ambil id
        $idUser = $data['user']->toArray()['id'];
        //cek role getGroupsForUser($userid)
        $data['getRoles'] = $modelGroup->getGroupsForUser($idUser);
        //Kirim data detil User dan Group


        $data['menu'] = $this->menu;
        $data['title'] = "User Management";
        return view('admin/userdetil', $data);
    }

    public function edituser()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);

        if (isset($_POST['update'])) {
            #update user
            $userdata = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
            ];

            $rules  = [
                'email'    => 'required|valid_email',
                'username' => 'required|min_length[3]|max_length[30]',
                'fullname'     => 'required'
            ];

            if (! $this->validateData($userdata, $rules)) {
                session()->setFlashdata('error', $this->validator->getErrors());
                return redirect()->back()->withInput();
                die;
            }
            //update user data
            $user->email = $userdata['email'];
            $user->username = $userdata['username'];
            $user->fullname = $userdata['fullname'];
            if ($this->userModel->save($user)) {
                session()->setFlashdata('success', 'Data Berhasil di Update');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Data gagal di Update');
                return redirect()->back();
            }

            die;
        }
    }

    public function updatePP()
    {
        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);
        //ambil gambar
        $img = $this->request->getFile('picture');
        //ganti nama
        $newName = 'profile_' . time() . '.' . $img->getClientExtension();
        //pindahkan gambar dengan nama baru
        $img->move('profile_pictures/', $newName);
        if (!$img->hasMoved()) {
            # Jika Gambar tidak berhasil dipindahkan
            session()->setFlashdata('error', 'Gambar Tidak Berhasil diupload!');
            return redirect()->to('/profile');
        }
        $user->pict = $newName;
        if ($this->userModel->save($user)) {
            session()->setFlashdata('success', 'Data Berhasil di Update');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Data gagal di Update');
            return redirect()->back();
        }
    }
}
