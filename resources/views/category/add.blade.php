@extends("layouts.master")
@section('title') BikeShop | เพิ่มประเภทสินค้า @stop
@section('content')
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-0.5">
                <h1>เพิ่มสินค้า</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ URL::to('category') }}">หน้าแรก</a></li>
                    <li class="active">เพิ่มประเภทสินค้า</li>
                 </ul>
                 @if($errors->any())
                     <div class="alert alert-danger">
                         @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                        @endforeach
                    </div>
                 @endif
{!! Form::open(array('action' => 'App\Http\Controllers\CategoryController@insert',
'method'=>'post', 'enctype' => 'multipart/form-data')) !!}
<table>
<tr>
<td>{{ Form::label('name', 'ชื่อประเภทสินค้า ') }}</td>
<td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
</tr>

</table>
    <div class="panel-footer">
    <button type="reset" class="btn btn-danger">ยกเลิก</button>
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection