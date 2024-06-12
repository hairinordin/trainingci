<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplainantDetailModel extends Model
{
    protected $table            = 'complainant_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['complainant_name', 'complainant_email', 'complainant_phone', 'complainant_nationality', 'complainant_status', 'state_id', 'town_id', 'created_at', 'updated_at', 'deleted_at'];

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


    function search($input = false)
    {
        if($input['complainant_name'] ?? ''){
            $this->like('complainant_details.complainant_name', $input['complainant_name']);   
        }

        if($input['complainant_email'] ?? ''){
            $this->like('complainant_details.complainant_email', $input['complainant_email']);   
        }

        if($input['complainant_phone'] ?? ''){
            $this->like('complainant_details.complainant_phone', $input['complainant_phone']);   
        }

        if($input['complainant_status'] ?? ''){
            $this->where('complainant_details.complainant_status', $input['complainant_status']);   
        }

        return $this;

    }
}
