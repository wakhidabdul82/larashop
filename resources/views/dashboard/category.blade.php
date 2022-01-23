@extends('layout.master-backend')

@section('title')
    Category List
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@endpush

@push('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  var actionUrl = '{{url('admin/categories')}}';
  var apiUrl = '{{url('admin/api/categories')}}';

  var colums = [
    {data : 'DT_RowIndex', class : 'text-center', orderable: true},
    {data : 'name',orderable: true},
    {data : 'slug',orderable: true},
    {data : 'description', orderable: true},
    {render: function (index, row, data, meta) {
      return `
      <a href="#" class="btn btn-sm btn-info" onclick="controller.editData(event, ${meta.row})">Edit</a>
      <a href="#" class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">Delete</a>
      `;
    }, orderable:false, class: 'text-center'},
  ];

</script>
<script type="text/javascript">
var controller = new Vue({
    el: '#controller',
    data: {
      datas: [],
      data: {},
      actionUrl,
      apiUrl,
      editStatus: false,
    },
    mounted: function () {
      this.datatable();
    },
    methods: {
        datatable() {
            const _this = this
            _this.table = $('#example').DataTable({
              "scrollX": true,
              "scrollCollapse" : true,
              "paging": false,
              "autoWidth": false,
                ajax: {
                url: _this.apiUrl,
                type: 'GET',
              },
              columns: colums
            }).on('xhr', function () {
              _this.datas = _this.table.ajax.json().data
            });  
        },
        addData() {
            this.data = {};
            this.editStatus=false;
            $('#exampleModal').modal('show');
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.editStatus=true;
            $('#exampleModal').modal('show'); 
        },
        deleteData(event, id) {
            $(event.target).parents('tr').remove();
            if (confirm("are you sure?")) {
              axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                alert('Data has been removed!');
              });
            }
        },
        submitForm(event, id) {
            event.preventDefault()
            const _this = this;
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#exampleModal').modal('hide')
                _this.table.ajax.reload();
          });
        },
    }
});
</script>
@endpush

@section('content')

<div id="controller">
    <div class="row">
        <div class="col-sm-10">
            <div class="card mb-4">
                <header class="card-header">
                    <div class="row gx-3">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary" @click="addData()">Create new</a>
                        </div>
                    </div>
                </header>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- table-responsive //end -->
                </div> <!-- card-body end// -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form class="forms-sample" :action="actionUrl" method="POST" @submit="submitForm($event, data.id)">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="_method" value="PUT" v-if='editStatus'>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" :value="data.name" placeholder="Name">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label class="form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" :value="data.slug" placeholder="Slug">
                </div>
                @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" :value="data.description" placeholder="Description">
                  </div>
                  @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection