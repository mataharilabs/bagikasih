@extends('styleguide.styleguide')
@section('header') @include('styleguide.header') @stop
@section('navbar') @include('styleguide.navbar') @stop
@section('sidebar')

<div class="container" style="margin-top: 120px; width: 960px;">
<!-- <div class="panel panel-default">
  <div class="panel-body">
    <div class="row errors">
      <div class="col-xs-12 col-sm-6">
        <span class="errors-code">500</span>
      </div>
      <div class="col-xs-12 col-sm-6 errors-body">
        <strong>Internal Server Error,</strong>
        <p>Sorry, something went wrong.</p>
        <div class="input-group" style="margin: 0 24px 12px 0;">
          <input type="text" placeholder="user search method instead? here it is..." class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-primary">Go!</button>
          </span>
        </div>
        <button type="button" class="btn btn-default btn-md">Return to home</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-default btn-md">Go to previous page</button>
      </div>
    </div>
  </div>
</div> -->

  <div class="row">
    <div class="col-xs-12 col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
      <div class="errors text-center">
        <span>oops, error</span>
        <p class="errors-code">500</p>
        <hr>
        <p class="errors-body">ddd
          <strong>Internal Server Error,</strong><br>
          Sorry, Something went wrong.
        </p>
        <div class="input-group" style="margin: 12px 12px 26px;">
          <input type="text" placeholder="user search method instead? here it is..." class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-primary">Go!</button>
          </span>
        </div>
        <button type="button" class="btn btn-default btn-md">Return to home</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-default btn-md">Go to previous page</button>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3"></div>
  </div>

</div>

@stop