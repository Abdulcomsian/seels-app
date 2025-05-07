<?php

namespace App\Imports;

use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class LeadsImport implements ToModel, WithHeadingRow
{
    use Importable;

    protected $user_id;
    protected $compaign_id;

    public function __construct($user_id,$compaign_id)
    {
        $this->user_id = $user_id;
        $this->compaign_id = $compaign_id;
    }

    public function model(array $row)
    {
        Log::info('Processing Row: ', $row);
        return new Lead([
            'user_id' => $this->user_id,
            'compaign_id' => $this->compaign_id,
            'company' => $row['company'] ?? null,
            'city' => $row['city'] ?? null,
            'corporate_phone' => $row['corporate_phone'] ?? null,
            'employees' => $row['employees'] ?? null,
            'industry' => $row['industry'] ?? null,
            'website' => $row['website'] ?? null,
            'company_linkedin_url' => $row['company_linkedin_url'] ?? null,
            'vv_straat' => $row['vv_straat_s_2'] ?? null,
            'street' => $row['street'] ?? null,
            's15_data_source' => $row['s15_data_source'] ?? null,
            'snippet_3' => $row['snippet_3'] ?? null,
            'first_name' => trim($row['first_name'] ?? ''),
            'last_name' => trim($row['last_name'] ?? ''),
            'title' => $row['title'] ?? null,
            'email' => $row['email'] ?? null,
            'person_linkedin_url' => $row['person_linkedin_url'] ?? null,
        ]);
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
