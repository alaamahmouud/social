<?php

namespace App\Imports;


use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row['id']) {
            $getId = $row['id'];

            $cutId = str_split($getId, '2');

            if ($cutId[1] == 00) {

                $category = Category::firstOrCreate([
                    'name' => $row['arb_activity'],
                    'code' => $getId
                ]);
            }else{
                $parent = Category::where('code',$cutId[0]."00")->first();
                if ($parent)
                {
                    $subCategory = Category::Create([
                        'name' => $row['arb_activity'],
                        'code' => $getId,
                        'parent_id' => $parent->id
                    ]);
                }else{
                    $subCategory = Category::Create([
                        'name' => $row['arb_activity'],
                        'code' => $getId
                    ]);
                }

            }

//          dd($cutId[1],$cutId[0]);
        }
    }
}
