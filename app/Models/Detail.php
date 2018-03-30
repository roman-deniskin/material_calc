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
        $this->weight = $data->weight;
        $this->extraCharge = $data->priceCostDetail;
        $this->price = $data->priceDetail;
        $i = 0;
        $this->materials = [];
        foreach ($data->materialDetailId as $key => $detailId) {
            $this->materials[$i]['materialId'] = array_merge($this->materials[$i]['materialId'], $detailId);


            
            $i++;
        }
        $this->materials = array_fill_keys('materialAmount', $data->materialDetailAmount);
        var_dump($data->materialDetailId);
        exit;
        //$this->materials['materialId'] = array_map(, $materialDetailId)
        foreach ($data->materialDetailId as $key => $materialDetailId) {
            @$this->materials[$key]['materialId'] = $materialDetailId;
        }
        foreach ($data->materialDetailAmount as $key => $materialDetailAmount) {
            @$this->materials[$key]['materialAmount'] = $materialDetailId;
        }
        //$this->materials = ['materialId' => $data->materialDetailId, 'materialAmount' => $data->materialDetailAmount];
        try {
            DB::transaction(function ($data) {
                $this->detailId = DB::table('details')->insertGetId(
                    ['name' => $this->detailName, 'weight' => $this->weight, 'extraCharge' => $this->extraCharge, 'price' => $this->price]
                );
                foreach ($this->materials as $key => $material) {
                    var_dump($material->materialDetailId);
                    exit;
                    DB::table('materials_stock')->insert(
                        ['material_id' => $material->materialId, 'detail_id' => $this->detailId, 'amount' => $material->materialAmount]
                    );
                    echo $material;
                    exit;
                }
            }, 5);
        } catch(\Exception $e) {
            echo "exception" . $e;
            DB::rollback(); 
            exit;
            $this->invalidData = true;
            //throw new Exception('Данные были переданы в неправильном формате и не сохранятся в базу данных.'); // throw the original exception
        }
    }
    
    public static function GetMaterialsInDetails($offset = 0, $columnsAmount = 100) {
        //SELECT `materials_stock`.`material_id`, `materials_stock`.`detail_id`, `materials_stock`.`amount`, `details`.`name` AS `detailName`, `details`.`extraCharge`, `details`.`price`, `materials`.`name` AS `materialName`, `materials`.`unit`, `materials`.`unitAlias`, `materials`.`unitWeight`, `materials`.`unitPrice` FROM `materials_stock` LEFT JOIN `details` ON `materials_stock`.detail_id = `details`.`id` LEFT JOIN `materials` ON `materials_stock`.`material_id` = `materials`.`id` LIMIT 0, 100;
        $detailsList = DB::table('materials_stock')
            ->select('materials_stock.material_id', 'materials_stock.detail_id', 'materials_stock.amount', 'details.name AS detailName', 'details.extraCharge', 'details.price', 'materials.name AS materialName', 'materials.unit', 'materials.unitAlias', 'materials.unitWeight', 'materials.unitPrice')
            ->leftJoin('details', 'materials_stock.detail_id', '=', 'details.id' )
            ->leftJoin('materials', 'materials_stock.material_id', '=', 'materials.id' )
            ->skip($offset)
            ->take($columnsAmount)
            ->get();
        return $detailsList;
    }
    
}
