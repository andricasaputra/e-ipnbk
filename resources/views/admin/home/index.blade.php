@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Home')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Rekapitulasi IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Rekapitulasi IPNBK.</span>
    </h3>
    <div class="d-flex">
      @can('admin')
      <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
        <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
      <button type="button" onClick="window.location = '{{ route('admin.question.index') }}'" class="btn btn-sm ml-3 btn-success"> Tambah Survey </button>
    </div>
    @endcan
  </div>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Tahun 2022</h4>
    <p class="card-description"> Add class <code>.table</code>
    </p>
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>IPNBK</th>
            <th>Total Responden</th>
            <th>Nilai Kualitas Budaya Kerja</th>
            <th>Klasifikasi Kualitas Budaya Kerja</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @foreach($ipnbk as $res)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $res->keterangan }}</td>
              <td>{{ $totalResponden }}</td>
              <td>{{ $nilaiRata }}</td>
              <td>{{ $nilaiKonversi }}</td>
              <td>
                @if($res->is_open == 1)
                <label class="badge badge-success">Aktif</label>
                @else
                  <label class="badge badge-danger">Expired</label>
                @endif
              </td>
            </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  const pegawai = async () => {

     try{

        const response = await fetch(`{{ route('pegawai') }}`);

        if(response.ok){
          const data = await response.json();

          const { nama, nip, image } = data[0];

          const container_nama = document.querySelector('#container_nama');
          const foto = document.querySelector('#container_foto');
          const container_nip = document.querySelector('#container_nip');
          const profil_name = document.querySelector('#profile-name');
          const profil_pict = document.querySelector('#profile-pict');

          container_nama.innerHTML = `<span>${nama}</span>`;
          profil_name.innerHTML = `<span>${nama}</span>`;
          container_nip.innerHTML = `<span>${nip}</span>`;
          foto.src =  `https://simasn.pertanian.go.id/simasn/fotoprofil/${image}`;
          profil_pict.src =  `https://simasn.pertanian.go.id/simasn/fotoprofil/${image}`;

      }else if(response.status == 401) {
           throw new Error('Username anda tidak ditemukan, silahkan hubungi admin'); 
        }else {
           throw new Error(response.statusText); 
        }

    }catch(err){
        throw new Error(err); 
    }
  }

  pegawai();
</script>
@endsection
