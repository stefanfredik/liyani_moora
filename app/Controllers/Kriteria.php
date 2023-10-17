<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Kriteria extends BaseController {
    use ResponseTrait;

    var $meta = [
        'url' => 'kriteria',
        'title' => 'Kriteria',
        'subtitle' => 'Halaman Kriteria'
    ];


    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->forge = \Config\Database::forge();
    }

    public function index() {
        $data = [
            'meta' => $this->meta,
            'title' => 'Data Kriteria'
        ];

        return view("kriteria/index", $data);
    }

    public function table() {
        $data = [
            'title' => 'Data Kriteria',
            'url'   => $this->meta['url'],
            'dataKriteria' => $this->kriteriaModel->orderBy('keterangan', 'ASC')->findAll(),
        ];

        return view('/kriteria/table', $data);
    }

    public function tambah() {
        $kriteriaCount = $this->kriteriaModel->countAll();
        $kriteriaCount = "C" . $kriteriaCount + 1;

        $data = [
            'title' => 'Tambah Data Kriteria',
            'url'   => $this->meta['url'],
            "kriteriaKeterangan" => $kriteriaCount,
        ];

        return view('/kriteria/tambah', $data);
    }

    public function edit($id) {
        $data = [
            'title' => 'Edit Data Kriteria',
            'kriteria'  => $this->kriteriaModel->find($id),
            'meta'      => $this->meta
        ];

        return view('/kriteria/edit', $data);
    }


    public function store() {
        $kriteriaCount = $this->kriteriaModel->countAll();
        $column = "C" . $kriteriaCount + 1;


        $data = $this->request->getPost();
        $data["keterangan"] = $column;

        $field = [
            $column => [
                'type' => 'INT'
            ]
        ];

        $this->forge->addColumn('peserta', $field);
        $this->kriteriaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $this->kriteriaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function delete($id) {
        $kriteria = $this->kriteriaModel->find($id);

        $this->kriteriaModel->delete($id);



        $this->forge->dropColumn('peserta', $kriteria["keterangan"]);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
