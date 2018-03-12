<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Unit extends Model
{

    protected $name;
    protected $weight;

    public function __invoke($data)
    {
        // TODO: Implement __invoke() method.
    }

    public function Insert($data)
    {
        $this->name = $data->nameUnit;
        $this->weight = $data->weightUnit;
        try {
            DB::table('units')->insert(
                ['name' => $this->name, 'weight' => $this->weight]
            );
        } catch(\Exception $e) {
            DB::rollback();
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }
    
}
