<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class JsonUnique implements Rule
{

    protected $table;

    protected $column;

    protected $message;

    protected $except;

    public function __construct($table, $column, $except = null)
    {
        
        $this->table = $table;

        $this->column = $column;

        $this->except = $except;

        $this->message = '';

    }

    public function passes($attribute, $value)
    {

        if($this->exists($value)) {

            $this->message = 'El ' . $attribute . ' ya ha sido tomado.';

            return false;

        } 

        return true;

    }

    public function message()
    {

        return $this->message;

    }

    protected function exists($value)
    {

        $query = DB::table($this->table)->where($this->column, $value);

        if($this->except ==  null) {

            return $query->exists();

        } else {

            return $query->whereNot('id', $this->except)->exists();

        }

    }

}
