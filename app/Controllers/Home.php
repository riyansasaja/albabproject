<?php

namespace App\Controllers;

use App\Models\BayarsModel;
use App\Models\PersonalData;
use Myth\Auth\Models\UserModel;

class Home extends BaseController
{
    protected $helpers = ['form', 'number'];


    public function index()
    {

        //mengecek kalau yang masuk adalah admin
        if (!in_groups('user')) {
            # lempar ke admin
            return redirect()->to('admin');
        }


        //inisiasi model Personal data
        $personalModel = new PersonalData();
        $bayarModel = new BayarsModel();
        $data_done = $personalModel->where('user_id', user()->id)->first();

        if ($data_done) {
            # code...
            $data['bayars'] = $bayarModel->where('user_id', user()->id)->findAll();
            $data['totalbayar'] = $bayarModel->total_bayar(user()->id);

            return view('user/lengkap', $data);
        } else {
            # code...
            return view('user/belumLengkap');
        }
    }

    public function formData()
    {
        $personalModel = new PersonalData();

        if (!$this->request->is('post')) {
            return view('user/formdata');
        }

        $rules = [
            // @TODO
            'user_id' => 'required',
            'email' => 'required',
            'fullname' => 'required',
            'jenis_kelamin' => 'required|in_list[Laki-laki, Perempuan]',
            'asal_sekolah' => 'required',
            'cita_cita' => 'required',
            'motivasi' => 'required',
            'ukuran_baju' => 'required',
            'nomor_telpon' => 'required',
            'nomor_telpon_ortu' => 'required',
            'pengalaman' => 'required',
            'aktivitas' => 'required|not_in_list[Pilih]',
            'opbdh' => 'required',
            'nm' => 'required',
            'bi' => 'required',
            'smpad' => 'required',
            'stmdka' => 'required',
            'apypbdha' => 'required',
            'kytt' => 'required',
            'amtad' => 'required',
        ];

        $data = $this->request->getPost([
            'user_id',
            'email',
            'fullname',
            'jenis_kelamin',
            'asal_sekolah',
            'cita_cita',
            'motivasi',
            'ukuran_baju',
            'nomor_telpon',
            'nomor_telpon_ortu',
            'pengalaman',
            'aktivitas',
            'opbdh',
            'nm',
            'bi',
            'smpad',
            'stmdka',
            'apypbdha',
            'kytt',
            'amtad'
        ]);

        if (!$this->validateData($data, $rules)) {
            return view('user/formdata');
        }

        $validData = $this->validator->getValidated();
        $personalModel->insert($validData);
        session()->setFlashdata('message', 'Data Berhasil Direkam, Terimakasih !');
        return redirect()->to('/');

        // var_dump($validData);
        // die;
        // return view('user/formdata');
        // echo "ini form data";
    }

    public function uploadCicil()
    {
        $bayarmodel = new BayarsModel();




        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[userfile,100]',
                    // 'max_dims[userfile,1024,768]',
                ],
            ],
        ];


        if (!$this->validateData([], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            session()->setFlashdata('error', $data);
            return redirect()->to('/');
        }

        $img = $this->request->getFile('userfile');

        $newName = 'bukti_' . time() . '.' . $img->getClientExtension();
        $img->move('uploads/', $newName);

        // var_dump($newName);
        // die;

        if ($img->hasMoved()) {
            //tulis di database
            $datadb = [
                'user_id' => user()->id,
                'date' => date('Y-m-d'),
                'jmlh_bayar' => $this->request->getVar('jmlh_bayar'),
                'bukti_bayar' => $newName,
                'log' => time(),
                'status' => 1
            ];
            $insertdb = $bayarmodel->insert($datadb, false);


            if (!$insertdb) {
                # jika gagal insert ke db
                $data = ['uploaded_fileinfo' => 'Gagal Input di Database'];
                session()->setFlashdata('error', $data);
                return redirect()->to('/');
            } else {
                $bayarmodel = new BayarsModel();
                #data success kirim
                $data = ['uploaded_fileinfo' => 'Lampiran Berhasil di Upload'];
                session()->setFlashdata('success', $data);
                return redirect()->to('/');
            }
        }
    }

    public function cicilId()
    {
        $id = $this->request->getVar('id');
        $bayarmodel = new BayarsModel();
        $databyid = $bayarmodel->where('id', $id)->first();
        return json_encode($databyid);
    }


    //view Profile
    public function viewProfile()
    {
        $personalModel = new PersonalData();
        $data['data_peserta'] = $personalModel->where('user_id', user()->id)->first();
        return view('user/profile', $data);
    }

    public function editProfil()
    {
        // $usermodel = new UserModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('users');

        $id = $this->request->getVar('id');
        $img = $this->request->getFile('picture');

        if ($img->getName() == null) {
            # data tanpa foto
            $data = [
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'fullname' => $this->request->getVar('fullname'),
            ];
        } else {
            #data dengan foto;
            $newName = 'profile_' . time() . '.' . $img->getClientExtension();
            $img->move('profile_pictures/', $newName);
            if ($img->hasMoved()) {
                # setelah gambar dipindahkan ke profile
                $data = [
                    'email' => $this->request->getVar('email'),
                    'username' => $this->request->getVar('username'),
                    'fullname' => $this->request->getVar('fullname'),
                    'pict' => $newName,
                ];
            } else {
                # gambar tidak berhasil dipindahkan
                session()->setFlashdata('error', 'Gambar Tidak Berhasil diupload!');
                return redirect()->to('/profile');
            }
        }

        $builder->where('id', $id);
        $hasil = $builder->update($data);

        //cek $hasil true or not
        if ($hasil) {
            # database terupdate
            session()->setFlashdata('success', 'Data Berhasil diupdate!');
            return redirect()->to('/profile');
        } else {
            # database gagal terupdate
            session()->setFlashdata('error', 'Data Tidak Berhasil di Update!');
            return redirect()->to('/profile');
        }

        return json_encode($hasil);
    }
}
