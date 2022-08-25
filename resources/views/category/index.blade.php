@extends("layouts.master")
@section('title') BikeShop | รายการประเภทสินค้า @stop
@section('content')
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-0.5">
                <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">BikeShop</a>
            </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    <li><a href="#">หน้าแรก</a></li>
                    <li><a href="#">ข้อมูลสินค้า</a></li>
                    <li><a href="#">รายงาน</a></li>
                    <li><a href="#">ประเภทสินค้า</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <h3>6306021630056 วุฒินันท์ ถนอมทรัพย์</h3>
        <h1>ประเภทสินค้า </h1>
        <div class="panel panel-default">
        <div class="panel-heading">
        <div class="panel-title"><strong>รายการประเภทสินค้า</strong></div>
            </div>
        <div class="panel-body">
        <!-- search form -->
        <form action="{{URL::to('category/search') }}" method ="post" class="form-inline">
        {{ csrf_field() }}
        <input type="text" name="q" class="form-control" placeholder="...">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
        <a href="{{ URL::to('category/edit') }}" class="btn btn-success pull-right">เพิ่มประเภทสินค้าสินค้า</a>
        </form> 
        </div>
        <table class="table table-bordered">
    <thead>
    <tr>
    <td>ลำดับ</td>
    <th>ประเภท</th>
    <th>การทํางาน</th>
    </tr>
    </thead>
    <tbody>
        @foreach($categorys as $c) 
        <tr>
        <td>{{$c->id}}</td>
        <td>{{ $c->name }}</td>
        <td>
        <a href="{{ URL::to('category/edit/' . $c->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
        <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $c->id }}"><i class="fa fa-trash"></i> ลบ</a>
        </td>
        
        </tr> @endforeach
        </tbody>
        </table>
            </div>
        {{ $categorys->links() }}
        </div>
        <script>
            $('.btn-delete').on('click', function() {if(confirm('คุณต้องการลบประเภทสินค้าหรือไม่?')){
                var url ="{{ URL::to('category/remove') }}"
                + '/' + $(this).attr('id-delete'); window.location.href = url;
            }
        });
        </script>
    </div>
@endsection