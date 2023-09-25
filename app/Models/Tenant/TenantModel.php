<?php

namespace App\Models\Tenant;

use CodeIgniter\Model;

class TenantModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tenant';
    protected $primaryKey       = 'tenant_idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['tenant_idx', 'tenant_name', 'email', 'passwd', 'phone', 'city_name', 'province_name', 'facebook', 'instagram', 'linkedin', 'twitter', 'youtube', 'tiktok', 'tokopedia', 'lazada', 'shopee', 'blibli', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
}
