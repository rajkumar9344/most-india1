@foreach ($onsites as $onsite)
<tr>
    <td data-column="0">{{ $onsite->employee_id }}</td>
    <td data-column="1">{{ $onsite->employee_name }}</td>
    <td data-column="2">{{ $onsite->onsite_date }}</td>
    <td data-column="3">{{ $onsite->work_order_number }}</td>
    <td data-column="4">{{ $onsite->customer_name }}</td>
    <td data-column="5">{{ $onsite->contact_person_name }}</td>
    <td data-column="6">{{ $onsite->contact_number }}</td>
    <td data-column="7">{{ $onsite->from_time }}</td>
    <td data-column="8">{{ $onsite->to_time }}</td>
    <td data-column="9">{{ $onsite->comments }}</td>
    {{-- <td>{{ $holiday->holiday_date }}</td> --}}
    <td data-column="10">
        <!-- View Button -->
        <a href="#" class="btn btn-info btn-sm"
            style="margin-right: 5px; padding: 8px 12px;">View</a>

        <!-- Edit Button -->
        <a href="{{ route('onsite.create', ['id' => $onsite->id]) }}"
            class="btn btn-warning btn-sm"
            style="margin-right: 5px; padding: 8px 12px;">Edit</a>


    </td>

</tr>
@endforeach
