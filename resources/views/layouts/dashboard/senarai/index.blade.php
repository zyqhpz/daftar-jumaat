@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="w-max">
        <h1 class="text-xl font-bold">Kemaskini Senarai</h1>

        <p>ASdaldasldmadas</p>

        <div class="border-1 rounded-sm p-1">
          <table class="table-fixed border-1 rounded-xl" id="example">
            <thead class="p-1">
              <tr class="rounded-t-xl">
                <th class="w-1/12 ...">No.</th>
                <th class="w-4/12 ...">Tarikh ID</th>
                <th class="w-2/12 ...">Tarikh</th>
                {{-- <th class="w-3/12 ...">Alamat</th>
                <th class="w-2/12 ...">Status Vaksinasi</th>
                <th class="w-1/12 ..."></th> --}}
              </tr>
            </thead>
            <tbody class="p-1">
              @foreach ($senarai as $row)
              {{-- @php  
                  if ($row->status_pendaftaran == 2) {
                    $stats_reg = 'Berjaya';
                  } else {
                    $stats_reg = 'Tidak Berjaya';
                  }
              @endphp --}}
              <tr>
                <td>{{ $row['id'] }}</td>
                {{-- <td data-id="">{{ $row['phone_id'] }}</td> --}}
                <td data-id="">{{ $row['tarikh_id'] }}</td>
                <td>{{ $row['tarikh'] }}</td>
                {{-- <td>{{ $stats_reg }}</td> --}}
                <td class=" inline-flex gap-2">
                <a onclick="editData('{{ $row['id'] }}')" class="modal-trigger px-2 py-1 bg-blue-700" data-role="update" data-id="{{ $row['id'] }}">
                  <button id="myBtn" type="button" class=" mx-auto" data-bs-target="#exampleModal">
                      <i class="fas fa-edit text-white"></i>
                  </button>
                </a>
                <a class="modal-trigger px-2 py-1 bg-red-500" href="{{ route('manage.delete', $row['id']) }}" onclick="return confirm('Anda pasti untuk padam data ini?')">
                  <button type="button" class="delete-btn">
                    <i class="fas fa-trash text-white"></i>
                  </button>
                </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <script>
      function editData(phone) {
        console.log(phone);
        event.preventDefault();
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/dashboard/senarai/edit/' + id,
            method: 'get',
            success: function(data) {
                $('#here').html(data);  
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
      }
    </script>
@endsection

@section('styling')
thead {
  {{-- border-radius: 10px 10px 0 0; --}}
}
th {
    background-color: #009879;
    color: #fff;
    padding: 10px;
    {{-- border-radius: 10px 10px 0 0; --}}
}
td {
    padding: 10px;

}
tr:nth-child(even) {
    background-color: #f3f3f3;
}
tr:nth-child(odd) {
    background-color: #c7c7c7;
}
@endsection