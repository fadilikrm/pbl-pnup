<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriFotoModel extends Model
{
    protected $table = 'galeri_foto';
    protected $primaryKey = 'id_foto';
    protected $allowedFields = ['nama_foto', 'deskripsi_foto', 'foto'];
}