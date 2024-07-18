<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    protected $table = 'todo';
    protected $fillable = ['task', 'is_done'];

    public function search($search = null)
    {
        $query = $this->newQuery();

        if ($search) {
            foreach ($search as $field => $value) {
                $query->where($search);
            }
        }

        $query->orderBy('id', 'ASC');

        return $query->get();
    }
}
