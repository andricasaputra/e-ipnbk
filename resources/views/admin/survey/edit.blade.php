@extends('admin.layouts.app')

@section('title', 'Edit Data Jawaban IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Edit Jawaban IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Edit Jawaban IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.data.history') }}" type="button" class="btn btn-sm ml-3 btn-success"><i class="fa fa-arrow-left"></i> Kembali </a>
    </div>
  </div>
@endsection

@section('content')

<div class="row">

  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pertanyaan IPNBK</h4>
        <p class="card-description">Pertanyaan</p>
       <form action="{{ route('admin.update.history') }}" method="post" class="form-sample">

	  		@csrf

	  		<div class="form-group">
	  			<label for="pertanyaan"><b>Pertanyaan</b></label>
	  			<input type="text" name="pertanyaan" class="form-control" value="{{ $survey->question->question }}" readonly>
	  			<input type="hidden" name="id" class="form-control" value="{{ $survey->id }}">
	  		</div>

	  		<div class="form-group">
	  			<label for="answer_id"><b>Jawaban Anda</b></label>

	  			<select name="answer_id" id="" class="form-control">
	  				<option value="{{ $survey->answer->id }}"><b>{{ $survey->answer->answer }}</b></option>
	  				@foreach($survey->question->answer as $answer)

	  					<option value="{{ $answer->id }}"><b>{{ $answer->answer }}</b></option>

	  				@endforeach
	  			</select>

	  		</div>

	  		<input type="submit" name="submit" value="Edit" class="btn btn-warning pull-right">
	  	</form>
      </div>
    </div>
  </div>
</div>

<!-- main-panel ends -->

@endsection