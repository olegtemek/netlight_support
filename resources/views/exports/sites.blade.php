<table class="table table-head-fixed ">
  <thead>
    <tr>
      <th>Название</th>
      <th>Админка</th>
      <th>FTP</th>
      <th>Хостинг</th>
    </tr>
  </thead>
  <tbody class="sites-table">
    @foreach ($sites as $access)
      <tr>
        <td>{{ $access->site_name }}</td>
        <td>{{ $access->site_admin }}</td>
        <td>{{ $access->site_ftp }}</td>
        <td>{{ $access->site_host }}</td>
      </tr>
    @endforeach
  </tbody>
</table>