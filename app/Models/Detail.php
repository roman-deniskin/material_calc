<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
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
        $this->name = $data->detailName;
        $this->materialId = $data->materialDetailId;
        $this->materialAmount = $data->materialDetailAmount;
        $this->extraCharge = $data->extraCharge;
        $this->priceCost = $data->priceCostDetail;
        $this->price = $data->price;
        $materialAmount = [
            ''
        ];
        try {
            DB::table('details')->insert(
                ['name' => $this->name, 'materialId' => $this->materialId, 'materialAmount' => $this->materialAmount, 'extraCharge' => $this->extraCharge, 'priceCost' => $this->priceCost, 'price' => $this->price]
            );
        } catch(\Exception $e) {
            DB::rollback();
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }
    
}
