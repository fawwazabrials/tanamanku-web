<?php

namespace App\Controllers;

use App\Models\EditModel;
use App\Models\PlantsModel;
use CodeIgniter\I18n\Time;

class Plants extends BaseController
{
  protected $plantsModel;
  protected $editModel;

  public function __construct()
  {
    $this->plantsModel = new PlantsModel();
    $this->editModel = new EditModel();
  }

  public function index()
  {
    if (!session()->get('num_user')) {
      return redirect()->to('/login');
    }

    $plants = $this->plantsModel->getPlants();
    $data = [
      'title' => 'Tanamanku | Plants',
      'plants' => $plants
    ];
    return view('/plants/index', $data);
  }

  public function detail($id)
  {
    if (!session()->get('num_user')) {
      return redirect()->to('/login');
    }

    $plant = $this->plantsModel->getPlants($id);
    $plantWithEditAndAdmin = $this->plantsModel->getPlantsWithEditAndAdmin($id);
    $data = [
      'title' => 'Tanamanku | Detail Plants',
      'plant' => $plant,
      'plantWithEditAndAdmin' => $plantWithEditAndAdmin,
    ];
    return view('/plants/detail', $data);
  }

  public function create()
  {
    if (!session()->get('num_user')) {
      return redirect()->to('/login');
    }

    $data = [
      'title' => 'Tanamanku | Create Plants',
      'validation_errors' => session()->getFlashdata('validation_errors') ?? '' // untuk menerima pesan error
    ];
    return view('/plants/create', $data);
  }

  public function save()
  {
    // validasi input
    if (!$this->validate([
      'namaTanaman' => [
        'rules' => 'required|is_unique[tanaman.namaTanaman]',
        'errors' => [
          'required' => 'Nama tanaman harus diisi.',
          'is_unique' => 'Nama tanaman sudah terdaftar.'
        ]
      ],
      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi harus diisi.'
        ]
      ],
      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar.',
          'is_image' => 'File yang anda pilih bukan gambar.',
          'mime_in' => 'File yang anda pilih bukan gambar.'
        ]
      ]
    ])) {
      session()->setFlashdata('validation_errors', $this->validator->getErrors());
      return redirect()->to('/plant/create')->withInput();
    }

    // ambil gambar
    $fileGambar = $this->request->getFile('gambar');

    // apakah tidak ada gambar yang diupload
    if ($fileGambar->getError() == 4) {
      $namaGambar = 'default.jpg';
    } else {
      // generate nama gambar random
      $namaGambar = $fileGambar->getRandomName();

      // pindahkan gambar ke folder img/plants
      $fileGambar->move('img/plants', $namaGambar);
    }

    $this->plantsModel->save([
      'namaTanaman' => $this->request->getVar('namaTanaman'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'image' => $namaGambar
    ]);

    session()->setFlashdata('message', 'Tanaman ' . $this->request->getVar('namaTanaman') . ' berhasil ditambahkan.');

    return redirect()->to('/plants');
  }

  public function delete($id)
  {
    // hapus gambar
    $plant = $this->plantsModel->find($id);
    if ($plant['image'] != 'default.jpg') {
      unlink('img/plants/' . $plant['image']);
    }

    $this->plantsModel->delete($id);
    session()->setFlashdata('message', 'Tanaman ' . $plant['namaTanaman'] . ' berhasil dihapus.');
    return redirect()->to('/plants');
  }

  public function edit($id)
  {
    if (!session()->get('num_user')) {
      return redirect()->to('/login');
    }

    $plant = $this->plantsModel->getPlants($id);
    $data = [
      'title' => 'Tanamanku | Edit Plants',
      'plant' => $plant,
      'validation_errors' => session()->getFlashdata('validation_errors') ?? '' // untuk menerima pesan error
    ];
    return view('/plants/edit', $data);
  }

  public function update($id) 
  {
    // cek nama tanaman
    $oldPlant = $this->plantsModel->getPlants($id);
    if ($oldPlant['namaTanaman'] == $this->request->getVar('namaTanaman')) {
      $rule_namaTanaman = 'required';
    } else {
      $rule_namaTanaman = 'required|is_unique[tanaman.namaTanaman]';
    }

    // validasi input
    if (!$this->validate([
      'namaTanaman' => [
        'rules' => $rule_namaTanaman,
        'errors' => [
          'required' => 'Nama Tanaman harus diisi.',
          'is_unique' => 'Nama Tanaman sudah terdaftar.'
        ]
      ],
      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi harus diisi.'
        ]
      ],
      'gambar' => [
        'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar.',
          'is_image' => 'File yang anda pilih bukan gambar.',
          'mime_in' => 'File yang anda pilih bukan gambar.'
        ]
      ]
    ])) {
      session()->setFlashdata('validation_errors', $this->validator->getErrors());
      return redirect()->to('/plant/edit/' . $id)->withInput();
    }

    // ambil gambar
    $fileGambar = $this->request->getFile('gambar');

    // cek gambar, apakah tetap gambar lama
    if ($fileGambar->getError() == 4) {
      $namaGambar = $this->request->getVar('gambarLama');
    } else {
      // generate nama gambar random
      $namaGambar = $fileGambar->getRandomName();

      // pindahkan gambar ke folder img/plants
      $fileGambar->move('img/plants', $namaGambar);

      // hapus gambar lama
      if ($this->request->getVar('gambarLama') != 'default.jpg') {
        unlink('img/plants/' . $this->request->getVar('gambarLama'));
      }
    } 

    $this->plantsModel->save([
      'id' => $id,
      'namaTanaman' => $this->request->getVar('namaTanaman'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'image' => $namaGambar
    ]);

    $this->editModel->save([
      'adminId' => session()->get('adminId'),
      'tanamanId' => $id,
      'createdAt' => Time::now('Asia/Jakarta', 'en_US'),
    ]);

    session()->setFlashdata('message', 'Tanaman ' . $this->request->getVar('namaTanaman') . ' berhasil diubah.');

    return redirect()->to('/plants');
  }

  public function generateSensorData($id)
  {
    $plant = $this->plantsModel->getPlants($id);

    // generate random data as float values
    $soil_moisture = mt_rand(0, 1000) / 10.0; // generates float between 0 and 100
    $temperature = mt_rand(50, 400) / 10.0; // generates float between 5 and 40
    $humidity = mt_rand(0, 1000) / 10.0; // generates float between 0 and 100
    $ph_level = mt_rand(0, 140) / 10.0; // generates float between 0 and 14
    $quality = ($soil_moisture < 30 || $temperature < 20 || $temperature > 30 || $humidity < 40 || $humidity > 60 || $ph_level < 5.5 || $ph_level > 6.5) ? 'bad' : 'good';

    // update data
    $this->plantsModel->save([
      'id' => $id,
      'soil_moisture' => $soil_moisture,
      'temperature' => $temperature,
      'humidity' => $humidity,
      'ph_level' => $ph_level,
      'last_reading' => Time::now('Asia/Jakarta', 'en_US'),
      'quality' => $quality,
    ]);

    session()->setFlashdata('message', 'Data sensor tanaman ' . $plant['namaTanaman'] . ' berhasil diupdate.');

    return redirect()->to('/plants');
  }
}
