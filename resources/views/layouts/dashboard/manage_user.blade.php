@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="w-max">
        <h1 class="text-xl font-bold">Manage User</h1>

        <p>ASdaldasldmadas</p>

      @php
          
      @endphp

        <div class="border-1 rounded-sm p-1">
          <table class="table-fixed border-1 rounded-xl" id="example">
            <thead class="p-1">
              <tr class="rounded-t-xl">
                <th class="w-1/12 ...">No.</th>
                <th class="w-4/12 ...">Nama</th>
                <th class="w-2/12 ...">No. Telefon</th>
                <th class="w-3/12 ...">Alamat</th>
                <th class="w-2/12 ...">Status Vaksinasi</th>
                <th class="w-1/12 ..."></th>
              </tr>
            </thead>
            <tbody class="p-1">
              {{-- <tr>
                <td>1</td>
                <td>Haziq Hapiz</td>
                <td>01128589146</td>
                <td>No. 5, Lorong Setia 2i, Taman Setia</td>
                <td>Lengkap</td>
                <td>
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash"></i>
                </td>
              </tr> --}}
              @foreach ($ahli as $row)
              @php  
                  if ($row->status_vaksin == 2) {
                    $stats_vax = 'Lengkap';
                  } else {
                    $stats_vax= 'Separa Lengkap';
                  }
              @endphp
              <tr>
                <td>{{ $row['id'] }}</td>
                <td data-id="">{{ $row['name'] }}</td>
                <td data-id="">{{ $row['phone'] }}</td>
                <td>{{ $row['address'] }}</td>
                <td>{{ $stats_vax }}</td>
                <td class=" inline-flex gap-2">
                  {{-- <a href="#" class="modal-trigger px-2 py-1 bg-green-500" data-role="update" data-id="{{ $row['phone'] }}">
                        <button id="myBtn" type="button" class="edit-btn mx-auto"  >
                            <i class="fas fa-edit text-white"></i>
                        </button>
                  </a> --}}
                  <a href="#" class="modal-trigger px-2 py-1 bg-blue-700" data-role="update" data-id="{{ $row['phone'] }}">
                        <button id="myBtn" type="button" class=" mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-edit text-white"></i>
                        </button>
                  </a>
                  <a class="modal-trigger px-2 py-1 bg-red-500" href="{{ route('manage.delete', $row['phone']) }}" onclick="return confirm('Anda pasti untuk padam data ini?')">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kemaskini Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('register') }}" class="grid pt-6">
              @csrf
  
              <label for="phone" class="label text-lg text-gray-700">Nombor Telefon</label>
              <input type="tel" minlength="10" maxlength="11" value="{{ $row['phone'] }}" id="phone" name="phone" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">
              
              <label for="name" class="label text-lg text-gray-700 mt-4">Nama Penuh</label>
              <input type="text" id="name" name="name" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('name') border-red-500 @enderror">
  
              <label for="address" class="label text-lg text-gray-700 mt-4">Alamat</label>
              <input type="text" id="address" name="address" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">

              <label for="vaksin" class="label text-lg text-gray-700 mt-4">Muat Naik Sijil Vaksinasi</label>
              <input class="mt-2 px-2 rounded-md h-12 border-2 border-black border-opacity-50 py-2 @error('vaksin') border-red-500 @enderror" type="file" name="vaksin">
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <script>
            $(document).on('click', 'a[data-role=update]', function() {
              //   var currentRow=$(this).closest("tr"); 

              var id = $(this).data('id');
              console.log(id);
              console.log($(this).data('name'));

              //  // var n = $('#' + id).children(td[data-target]);
              //   var no = currentRow.find("td:eq(0)").text(); // get current row 1st TD value 
              //   var name = currentRow.find("td:eq(1)").text();
              //   var phone = currentRow.find("td:eq(2)").text();
              //   var address = currentRow.find("td:eq(3)").text();
              //   // var stats = @php echo $row['status_vaksin']; @endphp;
              //   var desc = currentRow.find("td:eq(4)").text();

              
                var table = $('#example').DataTable();
                var data = table.row($(this).parents('tr')).data();
                // var id = data[0];
                var name = data[1];
                var phone = data[2];
                var address = data[3];
                var stats = data[4];

                console.log(name);
                console.log(phone);
                console.log(address);
                console.log(stats);
 
                $('#matID').val(id);
                $('#name').val(name);
                $('#address').val(address);
                $('#phone').val(phone);
                $('#file').val(file);
                $('#category').val(cat);
            });    </script>
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