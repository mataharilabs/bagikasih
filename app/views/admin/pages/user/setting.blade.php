@extends('admin.layouts.default')

@section('append-css')
	<!-- DATA TABLES -->
	{{ HTML::style('assets/admin/plugins/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-body">
				@if ($errors->has())
			        <div class="alert alert-danger">
			            @foreach ($errors->all() as $error)
			                {{ $error }}<br>        
			            @endforeach
			        </div>
			    @endif

			    @if(Session::has('gagal'))
		          <div class="alert alert-danger">
		                  {{ Session::get('gagal') }}        
		          </div>
		        @endif
				{{  Form::open(array('route' => 'admin.setting.post', 'method' => 'post')) }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Ubah Password</label>
                      <input type="password" name="password" value="{{ Input::get('password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Verifikasi Password</label>
                      <input type="password" name="verifikasi_password" value="{{ Input::get('verifikasi_password') }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                   
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                </form>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop

@section('append-js')
<!-- DATA TABES SCRIPT -->
{{ HTML::script('assets/admin/plugins/datatables/jquery.dataTables.js'); }}
{{ HTML::script('assets/admin/plugins/datatables/dataTables.bootstrap.js'); }}

<script type="text/javascript">
	// $(function () {
	// 	$('#datatable').dataTable({
	// 		aaSorting: [[ 5, "desc" ]]
	// 	});
	// });
</script>
@stop