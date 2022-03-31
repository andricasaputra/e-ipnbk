@extends('admin.layouts.app')

@section('title', 'E-IPNBK | History')

@section('header')
  <div class="page-header flex-wrap">
   
      <div class="d-flex">
         <select id="tahun" name="tahun" class="form form-control" style="color: black; font-weight: bold">
           <option value="{{ date('Y') - 2 }}">Tahun {{ date('Y') - 2 }}</option>
          <option value="{{ date('Y') - 1 }}">Tahun {{ date('Y') - 1 }}</option>
          <option value="{{ date('Y') }}" selected>Tahun {{ date('Y') }}</option>
         
        </select>
    </div>
    <div class="d-flex">
      <button type="button" onClick="window.location = '{{ route('survey.index') }}'" class="btn btn-sm ml-3 btn-dark"><i class="fa fa-check-circle" aria-hidden="true"></i> Mulai Survey </button>
    </div>
  </div>
@endsection

@section('link')

<style>
  td {
  white-space: normal !important; 
  word-wrap: break-word;  
}
table {
  table-layout: fixed;
}
</style>
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <p class="card-description"> History survey IPNBK anda
    </p>
    <div class="table-responsive">
      <table class="table text-center" id="survey">
        <thead>
          <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Niai</th>
            <th>Wakktu</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody">
          
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
  const select = document.querySelector('#tahun');
  const table = document.querySelector('#survey');
  const tbody = document.querySelector('#tbody');

  select.addEventListener('change', async () => {
      await fetchData(select.value);
  });

  const fetchData = async(year = null) => {
    const response = await fetch(`{{ route('admin.data.history') }}`, {
        method : 'POST',
        headers : {
          'X-CSRF-TOKEN' : '{{ csrf_token() }}',
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body : JSON.stringify({ year }) 
      });

    datas = await response.json();

     tbody.innerHTML = '';

     if (datas.length == 0) {

      tbody.innerHTML += `<tr>
                <td colspan="6"><br><h5><b>Belum ada data</b></h5></td>
              </tr>`;

     } else {
        datas.map((data, key) => {

        const { id, answer, question, created_at } = data;

         tbody.innerHTML += `<tr>
                <td>${key +  1}</td>
                <td>${question.question}</td>
                <td><b>${answer.answer}</b></td>
                <td><b>${answer.nilai}</b></td>
                <td>${created_at}</td>
                <td><a class="btn btn-warning btn-xs" href="{{ route('admin.edit.history') }}/${id}/${answer.question_id}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
              </tr>`;
       });
     }


     
  }
  fetchData();

</script>




@endsection
