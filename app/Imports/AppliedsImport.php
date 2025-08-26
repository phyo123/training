<?php

namespace App\Imports;

use App\Models\Applied;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class AppliedsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
            // Convert each row (a Laravel Collection) to an array
    $arrayRows = $rows->map(fn($row) => $row->toArray())->toArray();

    // Manually transpose the 2D array
    $columns = [];
    foreach ($arrayRows as $row) {
        foreach ($row as $key => $value) {
            $columns[$key][] = $value;
        }
    }

    // Example: print each column
    // foreach ($columns as $index => $column) {
    //     echo "Column {$index}: " . implode(', ', $column) . PHP_EOL;
    // }
    //exit;
    // Example: insert into DB using column data
    $count = count($columns[0] ?? []);
    for ($i = 0; $i < $count; $i++) {
        $Batch = $columns[0][$i] ?? null;
        $name = $columns[1][$i] ?? null;

        // Skip row if name is missing
        if (empty($name) || empty($Batch)) {
            continue;
        }

        //echo $columns[0][$i];exit;
        Applied::create([
            'Batch'      => $Batch,
            'name'       => $name,
            'position'   => $columns[2][$i] ?? null,
            'department' => $columns[3][$i] ?? null,
            'Mark'       => $columns[4][$i] ?? null,
            'Level'      => $columns[5][$i] ?? null,
        ]);
    }
    }
}
