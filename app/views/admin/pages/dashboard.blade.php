@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">

    	<!-- Related Payments -->
		@include('admin.pages.payment.related-list', array('new'=> true))
		
		<!-- Related Social Targets -->
		@include('admin.pages.social-target.related-list', array('new'=> true))

		<!-- Related Social Actions -->
		@include('admin.pages.social-action.related-list', array('new'=> true))

		<!-- Related Events -->
		@include('admin.pages.event.related-list', array('new'=> true))

		<!-- Related Reports -->
		@include('admin.pages.report.related-list', array('new'=> true))

	</div>
</div>
@stop