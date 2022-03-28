@extends('admin.layout.master', [
	'breadcrumb' => [
		'Admin' => backpack_url('dashboard')
	]
])


@section('page-title', 'ITEL Daily Sales')


@section('content')
@parent
    <form action="{{ route('admin.itel.saved-daily-clossing') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="card-header">
                        <i class="la la-chevron-right"></i>  Today is :
                            <label for ="month"> {{ now()->format('D - F -  Y') }}</label>
                    </div>
                    
                <div class="card-body">
                    <div class="form-row">
                        
                          <div class="col-md-8">
                            
                            @foreach ($datas as $data )
                             
                            <div class="form-row">
                                 
                              <div class="form-group col-md">
                                <label for={{ $data["name"]}} <i class="las la-phone"></i><strong>{{ $data["name"]}}</strong></label>
                                <input id="{{ $data["id"]}}" class="prc form-control full-width " value="0" type="number" name="{{ $data["id"]}}"  >
                              </div>

                            </div>
                            @endforeach
                          </div>
                      </div>
                <div>
                </div>
                <div class="card-footer text-right py-3 ">
                    <input type="submit" class="btn btn-info btn-sm text-right py-3" >
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
