<?php

namespace App\Models;

use App\Models\ModelBase;

class VnCommune extends ModelBase
{
  protected $table = 'vn_communes';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name' ,
    'idCommune',
    'idDistrict'
  ];
}