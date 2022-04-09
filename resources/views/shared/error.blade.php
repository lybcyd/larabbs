@if (count($errors) > 0)
<div class="alert alert-danger">
  <div><b>有错误发生：</b></div>
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
