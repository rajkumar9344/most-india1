<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class EmployeeExport implements FromCollection, WithHeadings ,WithStyles, ShouldAutoSize
{
    /**
     * Return a collection of employee data to export.
     */
    public function collection()
    {
        return Employee::all([
            'employee_id',
            'first_name',
            'last_name', 
            'gender',
            'date_of_birth',
            'address_residential',
            'pin_code',
            'city',
            'country',
            'state',
            'address_permanent',
            'emergency_contact_address',
            'emergency_contact_name',
            'emergency_contact_number',
            'blood_group',
            'mobile_1',
            'mobile_2',
            'email_personal',
            'department', 
            'designation', 
            'date_of_joining',
             'date_of_exit',
            'status',
            'email_official',
            'account_holder_name',
            'account_number',
            'bank_name',
            'branch',
            'ifsc_code',
            'insurance_no',
            'insurance_to_date',
            'insurance_from_date',
            'insurance_company_name',
            'insurance_coverage',  
        ]);
    }

    /**
     * Return the headings (table headers) for the Excel export.
     */
    public function headings(): array
    {
        return [
            'Employee ID',
            'First Name',
            'Last Name',
            'Gender',
            'Date of Birth',
            'Residential Address',
            'Pin Code',
            'City',
            'Country',
            'State',
            'Permanent Address',
            'Emergency Contact Address',
            'Emergency Contact Name',
            'Emergency Contact Number',
            'Blood Group',
            'Mobile 1',
            'Mobile 2',
            'Email (Personal)',
            'Department',
            'Designation',
            'Date of Joining',
            'Date of Exit',
            'Status',
            'Email (Official)',
            'Account Holder Name',
            'Account Number',
            'Bank Name',
            'Branch',
            'IFSC Code',
            'Insurance Number',
            'Insurance To Date',
            'Insurance From Date',
            'Insurance Company Name',
            'Insurance Coverage',
        ];
    }
    public function styles($sheet)
    {
        // Set text wrap for all columns A to AI (1st row to 1000th row)
        $sheet->getStyle('A1:AH1000')->getAlignment()->setWrapText(true);

        // Center-align the data for all columns from A to AI
        $sheet->getStyle('A1:AH1000')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Optionally, you can adjust other styles like bold for headings
        $sheet->getStyle('A1:AH1')->getFont()->setBold(true); // Set headings as bold
        $sheet->getStyle('A1:AH1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Center align headings

        return $sheet;
    }

    /**
     * Automatically resize columns based on content.
     */
    public function columnFormats(): array
    {
        // Auto-resize column widths for all columns (A to Z)
        return [
            'A' => 'auto',  // First Name
            'B' => 'auto',  // Last Name
            'C' => 'auto',  // Department
            'D' => 'auto',  // Email
            'E' => 'auto',  // Date of Joining
            'F' => 'auto',  // Date of Exit
            'G' => 'auto',  // Status
            'H' => 'auto',  // Employee ID
            'I' => 'auto',  // First Name
            'J' => 'auto',  // Last Name
            'K' => 'auto',  // Department
            'L' => 'auto',  // Email
            'M' => 'auto',  // Date of Joining
            'N' => 'auto',  // Date of Exit
            'O' => 'auto',  // Status
            'P' => 'auto',  // Employee ID
            'Q' => 'auto',  // First Name
            'R' => 'auto',  // Last Name
            'S' => 'auto',  // Department
            'T' => 'auto',  // Email
            'U' => 'auto',  // Date of Joining
            'V' => 'auto',  // Date of Exit
            'W' => 'auto',  // Status
            'X' => 'auto',  // Employee ID
            'Y' => 'auto',  // First Name
            'Z' => 'auto',  // Last Name
            'AA' => 'auto',  // Department
            'AB' => 'auto',  // Email
            'AC' => 'auto',  // Date of Joining
            'AD' => 'auto',  // Date of Exit
            'AE' => 'auto',  // Status
            'AF' => 'auto',  // Employee ID
            'AG' => 'auto',  // First Name
            'AH' => 'auto',  // Last Name


        ];
    }
    
}
