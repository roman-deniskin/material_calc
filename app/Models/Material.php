<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    public $invalidData; //Сохраняет исключение

    protected $name;
    protected $unit;
    protected $unitAlias;
    protected $unitWeight;
    protected $unitPrice;

    public function __invoke($data)
    {
        // TODO: Implement __invoke() method.
    }

    public function Insert($data)
    {
        $this->name = ucfirst($data->name);
        $this->unit = ucfirst($data->unit);
        $this->unitAlias = ucfirst($data->unitAlias);
        $this->unitWeight = preg_replace("[,/*]", '.', $data->unitWeight);
        $this->unitPrice = preg_replace("[,/*]", '.', $data->unitPrice);
        try {
            DB::table('materials')->insert(
                ['name' => $this->name, 'unit' => $this->unit, 'unitAlias' => $this->unitAlias, 'unitWeight' => $this->unitWeight, 'unitPrice' => $this->unitPrice]
            );
        } catch(\Exception $e) {
            dd($e);
            DB::rollback();
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }

    public static function GetMaterialList() {
        $materials = DB::table('materials')->get(['unitWeight', 'id', 'name', 'unitPrice', 'unit']);
        return $materials;
    }

    public static function GetMaterialFullList() {
        $materials = DB::table('materials')->get();
        return $materials;
    }
}
