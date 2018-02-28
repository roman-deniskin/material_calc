<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    public $invalidData; //Сохраняет исключение

    protected $name;
    protected $unit;
    protected $unitPrice;

    public function __invoke($data)
    {
        // TODO: Implement __invoke() method.
    }

    public function Insert($data)
    {
        $this->name = $data->name;
        $this->unit = $data->unit;
        $this->unitPrice = $data->unitPrice;
        try {
            DB::table('materials')->insert(
                ['name' => $this->name, 'unit' => $this->unit, 'unitPrice' => $this->unitPrice]
            );
        } catch(\Exception $e) {
            DB::rollback();
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }
    
}
