@extends("layouts.master")
@section('title') BikeShop | ประเภทสินค้า @stop
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
        <h1>รายการสินค้า </h1>
        <div class="panel panel-default">
        <div class="panel-heading">
        <div class="panel-title"><strong>รายการ</strong></div>
            </div>
        <div class="panel-body">
        <!-- search form -->
        <form action="{{URL::to('product/search') }}" method ="post" class="form-inline">
        {{ csrf_field() }}
        <input type="text" name="q" class="form-control" placeholder="...">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
        <a href="{{ URL::to('product/edit') }}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
        </form> 
            </div>
        <table class="table table-bordered bs-table">
</table>
        <div class="panel-footer">
            </div>  
</div>
        <table class="table table-bordered">
    <thead>
    <tr>
    <th>รูปสินค้า</th>
    <th>รหัส</th>
    <th>ชื่อสินค้า </th>
    <th>ประเภท</th>
    <th>คงเหลือ</th>
    <th>ราคาต่อหน่วย</th>
    <th>การทํางาน</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
        <td><img src="{{URL::to($p->image_url) }}" width="50px"></td>
        <td>{{ $p->code }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->category->name }}</td>
        <td>{{ $p->stock_qty }}</td>
        <td>{{ $p->price }}</td>
        <td>
        <a href="{{ URL::to('product/edit/'.$p->id) }}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
        <a href="#" class="btn btn-danger btn-delete" id-delete = "{{ $p->id }}"><i class="fa fa-trash"></i> ลบ</a>
        </td>
        
        </tr> @endforeach
        </tbody>
        </table>
            </div>
        </div>
    {{ $products->links() }}
    </div>
    <script>
        $('.btn-delete').on('click', function() {if(confirm('คุณต้องการลบข้อมูลสินค้าหรือไม่?')){
            var url ="{{ URL::to('product/remove') }}"
            + '/' + $(this).attr('id-delete'); window.location.href = url;
        }
    });
    </script>
@endsection