<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\WithHeadings; // Add this
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection, WithHeadings
{
    protected $leadIds;

    public function __construct($leadIds)
    {
        $this->leadIds = json_decode($leadIds, true);
    }

    public function collection()
    {
        return Lead::whereIn('id', $this->leadIds)
            ->select([
                'company', 'city', 'corporate_phone', 'employees', 'industry',
                'website', 'company_linkedin_url', 'vv_straat', 'street', 's15_data_source',
                'snippet_3', 'first_name', 'last_name', 'title', 'email', 'person_linkedin_url'
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'Company', 'City', 'Corporate Phone', '#Employees', 'Industry',
            'Website', 'Company LinkedIn URL', 'VV Straat', 'Street', 'S15 Data Source',
            'Snippet 3', 'First Name', 'Last Name', 'Title', 'Email', 'Person LinkedIn URL'
        ];
    }
}
