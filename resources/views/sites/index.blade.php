@extends('layouts.main')

@section('title','Доступы')



@section('content')
<div class="row">
    @if (session('message'))
      <div class="alert alert-success col-12">
          {{ session('message') }}
      </div>
  @endif
  <div class="col-6">
    <a href="{{ route('sites.create') }}" class="btn btn-success">Добавить запись</a>
  </div>
  <div class="col-6">
    <a style="color: white;font-size:14px;text-decoration:underline"  href="https://t.me/NetLightDataBot">Работа с данными также для удобства может происходит через телеграм бота -  NetLight Data</a>
  </div>
  <div class="col-12 mt-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Таблица с доступами</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" id="sitesSearch" class="form-control float-right" placeholder="Поиск..">
              
          </div>
        </div>
      </div>
    
      <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed ">
          <thead>
            <tr>
              <th>Название</th>
              <th>Админка</th>
              <th>FTP</th>
              <th>Хостинг</th>
              <th>Изменить/Удалить</th>
            </tr>
          </thead>
          <tbody class="sites-table">
            @foreach ($sites as $access)
              <tr>
                <td>{{ $access->site_name }}</td>
                <td>{{ $access->site_admin }}</td>
                <td>{{ $access->site_ftp }}</td>
                <td>{{ $access->site_host }}</td>
                <td>
                  <a class="btn btn-success" href="{{ route('sites.edit',$access->site_id) }}"><i class="fas fa-pen"></i></a>
                  <form style="display: inline" action="{{ route('sites.destroy', $access->site_id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    
    </div>
    
    </div>
</div>
<!-- /.row -->
@endsection


@section('js')

<script>
  $('#sitesSearch').on('keyup', function(){
      $value = $(this).val();
      
      $.ajax({
        type:'get',
        url:"{{ route('sites.search') }}",
        data:{'search':$value},
        success:function(data){
          
          $('.sites-table').html(data)
        },
      })
  });

  
  </script>

@endsection