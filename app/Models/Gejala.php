<?php

namespace App\Models;

use CodeIgniter\Model;

class Gejala extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gejala';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kodegejala',
        'jenistanaman',
        'gejala',
        'daerah',
        'updated_at'
    ];

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

    function findAllAssociated() 
    {
        return $this->db->table('gejala')
            ->select('
                gejala.*,
                jenistanaman.jenistanaman as nama_tanaman
            ')
            ->join('jenistanaman', 'gejala.jenistanaman = jenistanaman.id')
            ->get()
            ->getResultArray();
    }
}
