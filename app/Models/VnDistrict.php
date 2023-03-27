<?php

namespace App\Models;

use App\Models\ModelBase;

class VnDistrict extends ModelBase
{
  protected $table = 'vn_districts';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name' ,
    'idDistrict',
    'idProvince'
  ];
}