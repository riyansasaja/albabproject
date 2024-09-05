<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalData extends Model
{
    protected $table            = 'personal_data';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'email', 'fullname', 'jenis_kelamin', 'asal_sekolah', 'cita_cita', 'motivasi', 'ukuran_baju', 'nomor_telpon', 'nomor_telpon_ortu', 'pengalaman', 'aktivitas', 'opbdh', 'nm', 'bi', 'smpad', 'stmdka', 'apypbdha', 'kytt', 'amtad'];

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

    public function countbyJK()
    {
        $db      = \Config\Database::connect();
        $query =    "SELECT COUNT(*) AS total,
                        SUM(jenis_kelamin = 'Laki-laki') AS males,
                        SUM(jenis_kelamin = 'Perempuan') AS females
                    FROM personal_data";

        return $db->query($query)->getResultArray();

        $builder = $db->table('personal_data');
    }


    public function countShirtMales()
    {
        $db      = \Config\Database::connect();
        $query =    "SELECT
                        SUM(ukuran_baju = 'S') AS S,
                        SUM(ukuran_baju = 'M') AS M,
                        SUM(ukuran_baju = 'L') AS L,
                        SUM(ukuran_baju = 'XL') AS XL,
                        SUM(ukuran_baju = 'XXL') AS XXL,
                        SUM(ukuran_baju = 'XXXL') AS XXXL,
                        COUNT(*) AS total
                    FROM personal_data WHERE personal_data.jenis_kelamin = 'Laki-laki'";

        return $db->query($query)->getResultArray();

        $builder = $db->table('personal_data');
    }

    public function countShirtFemales()
    {
        $db      = \Config\Database::connect();
        $query =    "SELECT
                        SUM(ukuran_baju = 'S') AS S,
                        SUM(ukuran_baju = 'M') AS M,
                        SUM(ukuran_baju = 'L') AS L,
                        SUM(ukuran_baju = 'XL') AS XL,
                        SUM(ukuran_baju = 'XXL') AS XXL,
                        SUM(ukuran_baju = 'XXXL') AS XXXL,
                        COUNT(*) AS total
                    FROM personal_data WHERE personal_data.jenis_kelamin = 'Perempuan'";

        return $db->query($query)->getResultArray();

        $builder = $db->table('personal_data');
    }
}
