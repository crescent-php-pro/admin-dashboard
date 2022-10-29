<div class="col-md-3">
  @if (request()->is('admin/news'))
    <a href="{{('add-news')}}" class="btn btn-warning btn-block mb-3"><i class="far fa-paper-plane"></i> Add News</a>
  @endif
  @if (request()->is('admin/add-news'))
    <a href="{{('news')}}" class="btn btn-info btn-block mb-3"><i class="fas fa-comment-alt"></i> News List</a>
  @endif
  @if (request()->is('*/news-*'))
    <a href="{{('news')}}" class="btn btn-info btn-block mb-3"><i class="fas fa-reply"></i> Back</a>
  @endif
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Labels</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="far fa-circle text-danger"></i>
              All
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="far fa-circle text-warning"></i>
            Important
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="far fa-circle text-warning"></i>
            Hard News
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="far fa-circle text-primary"></i>
            Sports
          </a>
        </li>
      </ul>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
