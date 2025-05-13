<?php

namespace App\Imports;

use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class LeadsImport implements OnEachRow, WithHeadingRow
{
    use Importable;

    protected $user_id;
    protected $compaign_id;

    public function __construct($user_id,$compaign_id)
    {
        $this->user_id = $user_id;
        $this->compaign_id = $compaign_id;
    }

    public function onRow(Row $row)
    {
        $data = $row->toArray();
        Log::info('Processing Row:', $data);

        Lead::updateOrCreate(
            [
                'compaign_id' => $this->compaign_id,
                'email' => $data['email'] ?? null,
            ],
            [
                'user_id' => $this->user_id,
                'company' => $data['company'] ?? null,
                'city' => $data['city'] ?? null,
                'corporate_phone' => $data['corporate_phone'] ?? null,
                'employees' => $data['employees'] ?? null,
                'industry' => $data['industry'] ?? null,
                'website' => $data['website'] ?? null,
                'company_linkedin_url' => $data['company_linkedin_url'] ?? null,
                'vv_straat' => $data['vv_straat_s_2'] ?? null,
                'street' => $data['street'] ?? null,
                's15_data_source' => $data['s15_data_source'] ?? null,
                'snippet_3' => $data['snippet_3'] ?? null,
                'first_name' => trim($data['first_name'] ?? ''),
                'last_name' => trim($data['last_name'] ?? ''),
                'title' => $data['title'] ?? null,
                'person_linkedin_url' => $data['person_linkedin_url'] ?? null,
            ]
        );
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
