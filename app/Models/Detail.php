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
        $this->detailName = $data->detailName;
        $this->materialId = $data->materialDetailId;
        $this->materialAmount = $data->materialDetailAmount;
        $this->extraCharge = $data->extraCharge;
        $this->priceCost = $data->priceCostDetail;
        $this->price = $data->priceDetail;
        dd($data);
        try {
            DB::transaction(function () {
                DB::table('details')->insert(
                    ['name' => $this->detailName, 'extraCharge' => $this->extraCharge, 'priceCost' => $this->priceCost, 'price' => $this->price]
                );
                DB::table('materials_stock')->insert(
                    ['material_id' => $this->materialId, 'detail_id' => $this->materialId, 'amount' => $this->materialAmount]
                );
            }, 5);
        } catch(\Exception $e) {
            DB::rollback();
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }
    
    public static function GetMaterialsInDetails($offset = 0, $columnsAmount = 100) {
        //SELECT `materials_stock`.`material_id`, `materials_stock`.`detail_id`, `materials_stock`.`amount`, `details`.`name` AS `detailName`, `details`.`extraCharge`, `details`.`price`, `materials`.`name` AS `materialName`, `materials`.`unit`, `materials`.`unitAlias`, `materials`.`unitWeight`, `materials`.`unitPrice` FROM `materials_stock` LEFT JOIN `details` ON `materials_stock`.detail_id = `details`.`id` LEFT JOIN `materials` ON `materials_stock`.`material_id` = `materials`.`id` WHERE `detail_id` = 2 LIMIT 0, 100;
        $detailsList = DB::table('materials_stock')
            ->select('materials_stock.material_id', 'materials_stock.detail_id', 'materials_stock.amount', 'details.name AS detailName', 'details.extraCharge', 'details.price', 'materials.name AS materialName', 'materials.unit', 'materials.unitAlias', 'materials.unitWeight', 'materials.unitPrice')
            ->leftJoin('details', 'materials_stock.detail_id', '=', 'details.id' )
            ->leftJoin('materials', 'materials_stock.material_id', '=', 'materials.id' )
            ->where('detail_id', '=', 2 )
            ->skip($offset)
            ->take($columnsAmount)
            ->get();
        return $detailsList;
    }
    
}
