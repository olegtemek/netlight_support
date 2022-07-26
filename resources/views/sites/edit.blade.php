@extends('layouts.main')

@section('title','Доступ - изменить')

@section('content')
<div class="row">
  <div class="card card-warning col-sm-12">
    <div class="card-header">
      <h3 class="card-title">Изменить запись</h3>
    </div>

    <div class="card-body col-sm">
      <form method="POST" action="{{ route('sites.update', $site->site_id) }}">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
             
              <label>Название сайта</label>
              @error('site_name')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_name" class="form-control">{{ $site->site_name }}</textarea>
            </div>
          </div>
         
          <div class="col-sm-6">
            <div class="form-group">
              <label>Админка</label>
              @error('site_admin')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_admin" class="form-control">{{ $site->site_admin }}</textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Ftp</label>
              @error('site_ftp')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_ftp" class="form-control">{{ $site->site_ftp }}</textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Хостинг</label>
              @error('site_host')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
              <textarea name="site_host" class="form-control">{{ $site->site_host }}</textarea>
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