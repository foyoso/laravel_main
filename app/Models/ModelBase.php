<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBase extends Model
{
    public function findById($id) {
        return self::where('deleted_at', null)
                ->where('id', $id)
                ->first();
    }

    public function updateFieldDelete($id, $user_id) {
        $data = $this -> findById($id);
        if ($data == false) {
            return false;
        }
        $data -> setParamsForDelete($user_id);
        return $data -> save();
    }

    public function deleteById($id) {
        $data = $this -> findById($id);
        if ($data == false) {
            return false;
        }
        $data -> deleted = 1;
        return $data -> save();
    }

    public function setParamsForNew($user_id) {
        $this -> deleted = 0;
        $this -> created_at = date("Y-m-d H:i:s");
        $this -> created_by = $user_id;
        $this -> updated_at = date("Y-m-d H:i:s");
        $this -> updated_by = $user_id;
    }

    public function setParamsForUpdate($user_id) {
        $this -> updated_at = date("Y-m-d H:i:s");
        $this -> updated_by = $user_id;
    }

    public function setParamsForDelete($user_id) {
        $this -> deleted = 1;
        $this -> setParamsForUpdate($user_id);
    }

    public function findAll() {
        return self::where('deleted_at', null)
                ->orderBy('updated_at', 'DESC')
                ->get();
    }

    public function findAllForAdminPaging($pagination) {
        return self::where('deleted_at', null)
                ->orderBy('updated_at', 'DESC')
                ->paginate($pagination);
    }

    public function findAllByOrderForAdminPaging($pagination) {
        return self::where('deleted_at', null)
                ->orderBy('orderby', 'ASC')
                ->paginate($pagination);
    }

    public function findAllOrderByField($field, $sort='DESC') {
        return self::where('deleted_at', null)
                ->orderBy($field, $sort)
                ->get();
    }

    public function findByLimit($limit, $offset = 0){
        return self::where('deleted_at', null)
        		->where('status', 1)
                ->offset($offset)
                ->limit($limit)
                ->orderBy('updated_at', 'DESC')
                ->get();
    }

    public function findBySlug($slug) {
        return self::where('deleted_at', null)
                ->where('slug', $slug)
                ->first();
    }
}