@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="w-max">
        <h1 class="text-xl font-bold">Manage User</h1>

        <p>ASdaldasldmadas</p>

        <div class="border-2 rounded-sm p-1">
          <table class="table-fixed border-1 rounded-xl">
            <thead class="p-1">
              <tr class="rounded-t-xl">
                <th class="w-1/12 ...">No.</th>
                <th class="w-4/12 ...">Nama</th>
                <th class="w-2/12 ...">No. Telefon</th>
                <th class="w-3/12 ...">Alamat</th>
                <th class="w-1/12 ...">Status Vaksinasi</th>
                <th class="w-1/12 ...">Sunting</th>
              </tr>
            </thead>
            <tbody class="p-1">
              <tr>
                <td>1</td>
                <td>Haziq Hapiz</td>
                <td>01128589146</td>
                <td>No. 5, Lorong Setia 2i, Taman Setia</td>
                <td>Lengkap</td>
                <td>
                  <i class="fas fa-edit"></i>
                  <i class="fas fa-trash"></i>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Harish Hapiz</td>
                <td>0111232421</td>
                <td>No. 5, Lorong Setia 2i, Taman Setia</td>
                <td>Separa Lengkap</td>
                <td>112</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
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