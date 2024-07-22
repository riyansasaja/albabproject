<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BayarsModel;
use App\Models\MenuModel;
use App\Models\PersonalData;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Stmt\Echo_;

class HomeAdmin extends BaseController
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
        $data['menu'] = $this->menu;
        $data['title'] = "Dashboard";
        //kirim view ke admin/index
        return view('admin/index', $data);
    }

    public function daftarPeserta()
    {
        $personalModel = new PersonalData();
        //ambil menu
        $data['menu'] = $this->menu;
        //ambil peserta
        $data['data_peserta'] = $personalModel->findAll();
        $data['title'] = "Daftar Peserta";
        return view('admin/peserta', $data);
    }

    public function pesertabyID($id)
    {
        $bayarModel = new BayarsModel();
        $personalModel = new PersonalData();
        $data['menu'] = $this->menu;
        $data['title'] = "Daftar Peserta";
        $data['data_peserta'] = $personalModel->where('user_id', $id)->first();
        $data['bayarbyid'] = $bayarModel->where('user_id', $id)->findAll();
        return view('admin/detilpeserta', $data);
    }

    public function validations()
    {
        $bayarModel = new BayarsModel();
        $data['menu'] = $this->menu;
        $data['title'] = "Validasi Pembayaran";
        $data['databayar'] = $bayarModel->select('tb_bayar.id, tb_bayar.user_id, tb_bayar.date, tb_bayar.jmlh_bayar, tb_bayar.bukti_bayar, tb_bayar.status, personal_data.fullname')->join('personal_data', 'personal_data.user_id=tb_bayar.user_id', 'left')->findAll();
        return view('admin/validasi_bayar', $data);
    }

    public function validationbyId($id)
    {
        $bayarModel = new BayarsModel();
        $personalModel = new PersonalData();
        $data['menu'] = $this->menu;
        $data['title'] = "Validasi Pembayaran";
        $data['bayarbyid'] = $bayarModel->select('tb_bayar.id, tb_bayar.user_id, tb_bayar.date, tb_bayar.jmlh_bayar, tb_bayar.bukti_bayar, tb_bayar.status, personal_data.fullname')->join('personal_data', 'personal_data.user_id=tb_bayar.user_id', 'left')->where('tb_bayar.id', $id)->first();
        return view('admin/detil_validasi', $data);
    }

    public function validated()
    {
        $bayarModel = new BayarsModel();
        if (!$this->request->is('post')) {
            return redirect()->to('admin/validasi');
        }

        $rules = [
            'jmlh_bayar' => 'required',
            'status' => 'required'
        ];
        $id = $this->request->getPost('id');
        $submitform = $this->request->getPost('submitform');

        if ($submitform == 'terima') {
            # code...
            $data = [
                'jmlh_bayar' => $this->request->getPost('jmlh_bayar'),
                'status' => 2
            ];
        }
        if ($submitform == 'tolak') {
            # code...
            $data = [
                'jmlh_bayar' => $this->request->getPost('jmlh_bayar'),
                'status' => 3
            ];
        }

        if ($submitform == 'cancel') {
            # code...
            $data = [
                'jmlh_bayar' => $this->request->getPost('jmlh_bayar'),
                'status' => 1
            ];
        }

        if (!$this->validateData($data, $rules)) {
            return redirect()->to('admin/validasi');
        }
        $validData = $this->validator->getValidated();


        $bayarModel->update($id, $validData);
        session()->setFlashdata('success', 'Validasi Pembayaran Berhasil disimpan');
        return redirect()->to('admin/validasi');
    }
}
