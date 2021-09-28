@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="w-max">
        <h1 class="text-xl font-bold">Manage User</h1>

        <p>ASdaldasldmadas</p>

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
                  <a href="/dashboard/manage/edit/{{ $row['phone'] }}" class="modal-trigger px-2 py-1 bg-blue-700" data-role="update" data-id="{{ $row['phone'] }}">
                        {{-- <button id="myBtn" type="button" class=" mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                        <button id="myBtn" type="button" class=" mx-auto" data-bs-target="#exampleModal">
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
            <form method="post" class="grid pt-6 w-96 font-black"  id="editForm">
              @method('put')
              @csrf
          
              <input type="hidden" name="id" value="01128589146">
              <label for="phone" class="label text-lg text-gray-700">Nombor Telefon</label>
              <input type="tel" minlength="10" maxlength="11"  id="phone" name="phone" class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('phone') border-red-500 @enderror">
              
              <label for="name" class="label text-lg text-gray-700 mt-4">Nama Penuh</label>
              <input type="text" id="name" name="name"  class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('name') border-red-500 @enderror">
          
              <label for="address" class="label text-lg text-gray-700 mt-4">Alamat</label>
              <input type="text" id="address" name="address"class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">
          
              <label for="vaksin" class="label text-lg text-gray-700 mt-4">Status Vaksinasi</label>
              <input type="text" id="vaksin" name="vaksin"  class="px-2 rounded-md h-12 border-2 border-black border-opacity-50 @error('address') border-red-500 @enderror">
              
              {{-- <label for="vaksin" class="label text-lg text-gray-700 mt-4">Muat Naik Sijil Vaksinasi</label> --}}
              {{-- <input class="mt-2 px-2 rounded-md h-12 border-2 border-black border-opacity-50 py-2 @error('vaksin') border-red-500 @enderror" type="file" name="vaksin"> --}}
              
              {{-- <input type="button" class="btn btn-primary" value="Submit"> --}}
              {{-- <a onclick="document.getElementById('editForm').submit();"> --}}
                  <input type="submit" class="btn btn-secondary bg-green-500 mx-auto w-2/3 h-16 mt-2 rounded-md" value="Update">
              {{-- </a> --}}
          
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Submit">
            {{-- <button type="submit" class="btn btn-primary" id="update" >Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>
    <script>
            $(document).on('click', 'a[data-role=update]', function() {
              //   var currentRow=$(this).closest("tr"); 

              var id = $(this).data('id');
              console.log(id);
              
                var table = $('table tbody');
                table.find('tr').each(function(i) {
                  var $row = $(this);
                  var name = $row.find('td:eq(1)').text();
                  var phone = $row.find('td:eq(2)').text();
                  var address = $row.find('td:eq(3)').text();
                  var stats = $row.find('td:eq(4)').text();

                  if (id == phone) {
                    $('#phone').val(phone);
                    $('#name').val(name);
                    $('#address').val(address);
                    $('#vaksin').val(stats);
                    $('#editForm').action('/dashboard/manage/' + phone + '/edit');
                  }
                });
            });
            
                function updateData() {
        event.preventDefault();
        // const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var $dt = {};

            

            var phone = $('#phone').val();
            var fon = $('#phone').val();
            var name = $('#name').val();
            var address = $('#address').val();
            var vaksin = $('#vaksin').val();
            

        $.ajax({
            url: '/dashboard/manage/' + phone + '/edit',
            type: 'put',
            data: {
              phone: phone,
              name: name,
              address: address,
              vaksin: vaksin,

            },
            success: function() {
                console.log("success");
                console.log();
                // $('#here').html(data);  
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