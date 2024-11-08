<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArusKasModel;
use App\Models\BayarsModel;
use App\Models\MenuModel;
use App\Models\PersonalData;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel as ModelsUserModel;
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
        $personalModel = new PersonalData();
        $data['menu'] = $this->menu;
        $data['title'] = "Dashboard";
        //kirim view ke admin/index
        $data['countjk'] = $personalModel->countbyJK();
        $data['shirtmales'] = $personalModel->countShirtMales();
        $data['shirtfemales'] = $personalModel->countShirtFemales();

        // dd($data);

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

    public function deletePeserta()
    {
        $usermodel = new UserModel();
        $personalModel = new PersonalData();
        //ambil data id
        $id = $this->request->getVar('id');
        //delete byid
        $deleteuser = $usermodel->delete($id);
        $deletePersonalData = $personalModel->where('user_id', $id)->delete();
        //kembalikan dengan session
        if ($deleteuser && $deletePersonalData) {
            # code...
            session()->setFlashdata('success', 'Data Peserta Berhasil dihapus');
            return redirect()->to('/admin/peserta/');
        } else {
            # code...
            session()->setFlashdata('error', 'Data Peserta Gagal dihapus');
            return redirect()->to('/admin/peserta/');
        }
    }



    public function pesertabyID($id)
    {
        $bayarModel = new BayarsModel();
        $personalModel = new PersonalData();
        $data['menu'] = $this->menu;
        $data['title'] = "Daftar Peserta";
        $data['data_peserta'] = $personalModel->where('user_id', $id)->join('users', 'personal_data.user_id = users.id')->first();
        $data['bayarbyid'] = $bayarModel->where('user_id', $id)->findAll();
        return view('admin/detilpeserta', $data);
    }

    public function validations()
    {
        $bayarModel = new BayarsModel();
        $data['menu'] = $this->menu;
        $data['title'] = "Validasi Pembayaran";
        $data['databayar'] = $bayarModel->select('tb_bayar.id, tb_bayar.user_id, tb_bayar.date, tb_bayar.jmlh_bayar, tb_bayar.bukti_bayar, tb_bayar.status, personal_data.fullname')->join('personal_data', 'personal_data.user_id=tb_bayar.user_id', 'left')->whereIn('status', [1, 2, 3])->findAll();
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
        $aruskasmodel = new ArusKasModel();
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
            $data_arus_kas = [
                'tgl' => $this->request->getPost('tgl_bayar'),
                'uraian' => "Validasi Pembayaran an. " . $this->request->getPost('nama'),
                'debit' => $this->request->getPost('jmlh_bayar'),
            ];
            $aruskasmodel->insert($data_arus_kas);
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
            $data_arus_kas = [
                'tgl' => $this->request->getPost('tgl_bayar'),
                'uraian' => "Cancel Validation an. " . $this->request->getPost('nama'),
                'kredit' => $this->request->getPost('jmlh_bayar'),
            ];
            $aruskasmodel->insert($data_arus_kas);
        }

        if (!$this->validateData($data, $rules)) {
            return redirect()->to('admin/validasi');
        }
        $validData = $this->validator->getValidated();


        $bayarModel->update($id, $validData);
        session()->setFlashdata('success', 'Validasi Pembayaran Berhasil disimpan');
        return redirect()->to('admin/validasi');
    }


    public function tes()
    {
        echo "uji coba";
    }

    public function addDiscount()
    {
        $bayarmodel = new BayarsModel();
        $aruskasmodel = new ArusKasModel();
        $data_bayar =  [
            'user_id' => $this->request->getPost('user_id'),
            'date' => date('Y-m-d'),
            'jmlh_bayar' => $this->request->getPost('jmlh_bayar'),
            'bukti_bayar' => null,
            'log' => time(),
            'status' => 4
        ];

        $data_arus_kas = [
            'tgl'   => date('Y-m-d'),
            'uraian' => 'Diskon Pembayaran an. ' . $this->request->getPost('fullname'),
            'debit' => $this->request->getPost('jmlh_bayar')
        ];

        $bayarmodel->insert($data_bayar);
        $aruskasmodel->insert($data_arus_kas);
        session()->setFlashdata('success', 'Data Discount sudah ditambahkan');
        return redirect()->to('/admin/peserta/' . $data_bayar['user_id']);
    }

    public function deleteDiscount()
    {
        $bayarmodel = new BayarsModel();
        $aruskasmodel = new ArusKasModel();

        $id_bayar = $this->request->getPost('id');
        $data_arus_kas = [
            'tgl'   => date('Y-m-d'),
            'uraian' => 'Hapus Diskon an. ' . $this->request->getPost('fullname'),
            'kredit' => $this->request->getPost('jmlh_bayar')
        ];
        $bayarmodel->when('id', $id_bayar)->delete();
        $aruskasmodel->insert($data_arus_kas);
    }

    public function bendahara()
    {

        $bayarModel = new BayarsModel();
        $aruskasmodel = new ArusKasModel();
        $personalModel = new PersonalData();
        $data['aruskas'] = $aruskasmodel->orderBy('created_at', 'desc')->findAll();
        $data['totaldebit'] = $aruskasmodel->totaldebit();
        $data['totalkredit'] = $aruskasmodel->totalkredit();
        $data['menu'] = $this->menu;
        $data['title'] = "Bendahara";
        return view('admin/bendahara', $data);
    }

    public function addDebit()
    {
        //inisiasi modal arus kas
        $aruskas = new ArusKasModel();
        //tangkap inputan
        $debitwithtitik = $this->request->getPost('debit');
        $debit = preg_replace("/[^0-9]/", "", $debitwithtitik);
        $tanggal = $this->request->getPost('tgl');
        $uraian = $this->request->getPost('uraian');


        $data = [
            'tgl' => $tanggal,
            'uraian' => $uraian,
            'debit' => $debit,
            'kredit' => 0
        ];
        $aruskas->insert($data);

        session()->setFlashdata('success', 'Data Pemasukan berhasil disimpan');
        return redirect()->to('admin/bendahara');
    }


    public function addKredit()
    {
        //inisiasi modal arus kas
        $aruskas = new ArusKasModel();
        //tangkap inputan
        $string = $this->request->getPost('kredit');
        $kredit = preg_replace("/[^0-9]/", "", $string);
        $tanggal = $this->request->getPost('tgl');
        $uraian = $this->request->getPost('uraian');


        $data = [
            'tgl' => $tanggal,
            'uraian' => $uraian,
            'kredit' => 0,
            'kredit' => $kredit
        ];

        $aruskas->insert($data);

        session()->setFlashdata('message', 'Data Pengeluaran berhasil disimpan');
        return redirect()->to('admin/bendahara');
    }
}
