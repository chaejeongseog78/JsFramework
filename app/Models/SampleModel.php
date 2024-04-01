<?php

namespace App\Models;

use CodeIgniter\Model;

class SampleModel extends Model
{
	protected $table            = 'sample';
	protected $primaryKey       = 'sample_id';
	protected $allowedFields    = ['name', 'age'];
}
