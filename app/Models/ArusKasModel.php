<?php

namespace App\Models;

use CodeIgniter\Model;

class ArusKasModel extends Model
{
    protected $table            = 'tb_arus_kas';
    protected $primaryKey       = 'id_kas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl', 'uraian', 'debit', 'kredit'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function totaldebit()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_arus_kas');
        return $builder->selectSum('debit')->get()->getResultArray();
    }
    public function totalkredit()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_arus_kas');
        return $builder->selectSum('kredit')->get()->getResultArray();
    }
}
