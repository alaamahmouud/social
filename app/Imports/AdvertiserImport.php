<?php

namespace App\Imports;

use   App\Models\Advertiser ;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Governorate;
use App\MyHelper\Helper;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdvertiserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($row['arb_name'])
        {
            $advertiser = Advertiser::firstOrCreate(['name' => $row['arb_name']]);
            if ($advertiser)
            {
                if (isset($row['field72']))
                {
                    $branch = Branch::firstOrCreate
                    (
                        ['name' => $row['field72'],
                            'advertiser_id' => $advertiser->id
                        ]);
                    if ($branch)
                    {
                        if (isset($row['arb_depart']))
                        {
                            $dept = Department::firstOrCreate([
                                'name'=>$row['arb_depart'],
                                'branch_id' => $branch->id

                            ]);
                            if ($dept)
                            {
                                if (isset($row['combo74']))
                                {
                                    $gov = Governorate::firstOrCreate(['name'=>$row['combo74']]);

                                }
                                $dept->governorate_id = $gov->id ?? 0;
                                $dept->address = $row['arb_address'] ?? "";
                                $dept->phone = $row['phone'] ?? "";
                                $dept->fax = $row['fax'] ?? "";
                                $dept->save();
                            }
                        }
                    }
                }
            }
        }
    }
}
