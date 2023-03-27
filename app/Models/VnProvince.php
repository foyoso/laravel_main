<?php

namespace App\Models;

use App\Models\ModelBase;

class VnProvince extends ModelBase
{
  protected $table = 'vn_provinces';

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name' ,
    'idProvince'
  ];
}