<?php

namespace App\Imports;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents; // Add this
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeImport; // Add this
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyImport implements ToModel, WithHeadingRow, SkipsEmptyRows, ShouldQueue, WithChunkReading, WithEvents
{
    protected $existingMernis;

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function(BeforeImport $event) {
                $this->existingMernis = Company::query()->pluck('mernis')->toArray();
            },
        ];
    }

    public function model(array $row): ?Model
    {
        if (in_array($row["mernis_adres_kodu"], $this->existingMernis)) {
            return null;
        }

        return new Company([
            'city'         => $row["il_adi"],
            'district'     => $row["ilce_adi"],
            'name'         => $row["kurum_adi"],
            'address'      => $row["adres"] ?? 'Bilinmiyor',
            'phone'        => $row["tel"],
            'fax'          => $row["fax"],
            'mernis'       => $row["mernis_adres_kodu"],
            'website'      => $row["web_adres"],
            'company_type' => $row["kurum_tur_kodu"],
            'status'       => true,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
