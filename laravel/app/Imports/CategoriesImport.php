<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class CategoriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $parentId = null;
        $category = null;
        foreach ($row as $key => $column){
            if ($column){
                $parent = Category::where('name', $column)->first();
                if ($parent){
                    $parentId = $parent->id;
                    continue;
                }else{
                    $category = Category::create([
                        'name' => $column
                    ]);
                    if ($key !== 'Kategori 1')
                        $category->parentId = $parentId;
                    $category->save();
                }
                $parentId = $category->id;
            }
        }
    }
}
