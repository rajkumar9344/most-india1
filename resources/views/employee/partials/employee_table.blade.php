{{-- resources/views/employees/partials/employee_table.blade.php --}}
@foreach ($employees as $employee)
<tr>
    <td data-column="0">{{ $employee->id }}</td>
<td data-column="1">{{ $employee->first_name }}</td>
<td data-column="2">{{ $employee->last_name }}</td>
<td data-column="3">{{ $employee->gender }}</td>
<td data-column="4">{{ $employee->date_of_birth }}</td>
<td data-column="5">{{ $employee->address_residential }}</td>
<td data-column="6">{{ $employee->pin_code }}</td>
<td data-column="7">{{ $employee->city }}</td>
<td data-column="8">{{ $employee->country }}</td>
<td data-column="9">{{ $employee->state }}</td>
<td data-column="10">{{ $employee->address_permanent }}</td>
{{-- <td data-column="11">
    @if($employee->photo)
        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" width="50" height="50">
    @else
        No Photo
    @endif
</td> --}}
<td data-column="12">{{ $employee->emergency_contact_address }}</td>
<td data-column="13">{{ $employee->emergency_contact_name }}</td>
<td data-column="14">{{ $employee->emergency_contact_number }}</td>
<td data-column="15">{{ $employee->blood_group }}</td>
<td data-column="16">{{ $employee->mobile_1 }}</td>
<td data-column="17">{{ $employee->mobile_2 }}</td>
<td data-column="18">{{ $employee->email_personal }}</td>
<td data-column="19">{{ $employee->employee_id }}</td>
<td data-column="20">{{ $employee->department }}</td>
<td data-column="21">{{ $employee->designation }}</td>
<td data-column="22">{{ $employee->date_of_joining }}</td>
<td data-column="23">{{ $employee->date_of_exit }}</td>

<td data-column="25">{{ $employee->email_official }}</td>
<td data-column="26">{{ $employee->account_holder_name }}</td>
<td data-column="27">{{ $employee->account_number }}</td>
<td data-column="28">{{ $employee->bank_name }}</td>
<td data-column="29">{{ $employee->branch }}</td>
<td data-column="30">{{ $employee->ifsc_code }}</td>
<td data-column="31">{{ $employee->insurance_no }}</td>
<td data-column="32">{{ $employee->insurance_from_date }}</td>
<td data-column="33">{{ $employee->insurance_to_date }}</td>
<td data-column="34">{{ $employee->insurance_company_name }}</td>
<td data-column="35">{{ $employee->insurance_coverage }}</td>


    <td data-column="50">
        @if ($employee->status == 'Active')
        <button class="btn btn-m btn-success">
            {{ $employee->status }}
        </button>
        @else
        <button class="btn btn-sm btn-danger">
            {{ $employee->status }}
        </button>
        @endif
    </td>
    <td data-column="51">
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-info">Update</a>
    </td>
</tr>

@endforeach