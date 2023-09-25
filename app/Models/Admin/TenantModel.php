<?php

namespace App\Models\Admin;

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
    protected $allowedFields    = ['tenant_idx', 'tenant_name', 'email', 'passwd', 'phone', 'city_idx', 'province_idx', 'facebook', 'instagram', 'linkedin', 'twitter', 'youtube', 'tiktok', 'tokopedia', 'lazada', 'shopee', 'blibli', 'status', 'created_at', 'updated_at', 'deleted_at'];

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

    // Datatable Purpose
    public $db;
    public $builder;
 
    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }
    
    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->builder = $this->db->table($table);
        //jika ingin join formatnya adalah sebagai berikut :
        $this->builder->select('tenant.tenant_idx, tenant.tenant_name, tenant.email, tenant.phone, city.city_name, city.province, tenant.facebook, tenant.instagram, tenant.linkedin, tenant.twitter, tenant.youtube, tenant.tiktok, tenant.tokopedia, tenant.lazada, tenant.shopee, tenant.blibli, tenant.status, tenant.created_at');
        $this->builder->join('city', 'tenant.city_idx = city.city_idx', 'left');
        //end Join
        $i = 0;
    
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {
    
                if ($i === 0) {
                    $this->builder->groupStart();
                    $this->builder->like($item, $_POST['search']['value']);
                } else {
                    $this->builder->orLike($item, $_POST['search']['value']);
                }
    
                if (count($column_search) - 1 == $i)
                    $this->builder->groupEnd();
            }
            $i++;
        }
    
        if (isset($_POST['order'])) {
            $this->builder->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->builder->orderBy(key($order), $order[key($order)]);
        }
    
    }
    
    public function get_datatables($table, $column_order, $column_search, $order, $where = '', $orWhere = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $this->builder->limit($_POST['length'], $_POST['start']);
    
        if ($where) {
            $this->builder->where($where);
        }

        if ($where && $orWhere) {
            $this->builder->orWhere($orWhere);
        }
        
        $query = $this->builder->get();
        return $query->getResult();
    }
    
    public function count_filtered($table, $column_order, $column_search, $order, $where = '', $orWhere = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        
        if ($where) {
            $this->builder->where($where);
        }

        if ($where && $orWhere) {
            $this->builder->orWhere($orWhere);
        }

        $this->builder->get();
        return $this->builder->countAll();
    }
    
    public function count_all($table, $where = '', $orWhere = '')
    {
        if ($where) {
            $this->builder->where($where);
        }

        if ($where && $orWhere) {
            $this->builder->orWhere($orWhere);
        }

        $this->builder->from($table);
    
        return $this->builder->countAll();
    }
}
