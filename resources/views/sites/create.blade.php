@extends('layouts.main')

@section('title','Доступ - добавить')

@section('content')
<div class="row">
  <div class="card card-warning col-sm-12">
    <div class="card-header">
      <h3 class="card-title">Добавить запись</h3>
    </div>

    <div class="card-body col-sm">
      <form method="POST" action="{{ route('sites.store') }}">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
             
              <label>Название сайта</label>
              @error('site_name')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_name" class="form-control"></textarea>
            </div>
          </div>
         
          <div class="col-sm-6">
            <div class="form-group">
              <label>Админка</label>
              @error('site_admin')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_admin" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Ftp</label>
              @error('site_ftp')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_ftp" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Хостинг</label>
              @error('site_host')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_host" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <button class="btn btn-success" type="submit">Добавить запись</button>
      </form>
    </div>
    
    </div>
</div>
<!-- /.row -->
@endsection