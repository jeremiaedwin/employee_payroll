@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Position</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="card">
          <div class="card-header p-3">
            <button class="btn btn-primary rounded mr-2" data-toggle="modal" data-target="#exampleModal">Add <i class="fa fa-plus"></i></button>
            <button class="btn btn-warning rounded mr-2" id="btn-edit" data-toggle="modal" data-target="#editModal">Edit <i class="fa fa-pen"></i></button>
            <button class="btn btn-danger rounded" id="btn-delete">Delete <i class="fa fa-trash"></i></button>
          </div>
          <div class="card-body">
            <table id="data-table" class="bg-white display">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                  </tr>
              </thead>
            </table>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Insert data Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Positon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="/position">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleFormControlInput1">Position Name</label>
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleFormControlInput1">Department</label>
              <select class="select2-ajax form-control " style="width: 100%;" name="department_id" id="department_id"></select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit data Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="/position/update">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleFormControlInput1">Position Name</label>
              <input type="hidden" class="form-control" name="id" id="editId">
              <input type="text" class="form-control" name="name" id="editName">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection
@push('custom-scripts')
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    
    let selectedRowId = null;

    if(selectedRowId == null) {
        $('#btn-edit').attr("disabled", true);
        $('#btn-delete').attr("disabled", true);
    }

    $(document).ready(function() {
      $('#department_id').select2({
        placeholder: "Select a department",
        ajax: {
            url: '{{ route("department.search") }}', // Replace with your route
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // Search query
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(department => ({
                        id: department.id,
                        text: department.name
                    }))
                };
            },
            cache: true
          }
      });
    });

    

    const table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('position.data') }}',
      columns: [
          { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // Row number
          { data: 'position_name', name: 'position_name' },
          { data: 'department_name', name: 'department_name' },
          { data: 'created_at', name: 'created_at' },
          { data: 'updated_at', name: 'updated_at' },
      ],
      rowCallback: function (row, data) {
          // Add a click event to each row
          $(row).on('click', function () {
              // Deselect any previously selected row
              $('#data-table tbody tr').removeClass('selected-row bg-success');

              // Select the current row
              $(this).addClass('selected-row bg-success');
              $('#btn-edit').attr("disabled", false);
              $('#btn-delete').attr("disabled", false);


              // Store the ID of the selected row
              selectedRowId = data.id;
          });
      }
    });

    function fetchDataById(dataId) {
        // Make an AJAX call to the Laravel route
        $.ajax({
            url: `/position/${dataId}`, // Replace with the correct URL
            method: 'GET', // HTTP method
            success: function (response) {
                // Handle success response
                $("#editId").val(response.data.id)
                $("#editName").val(response.data.name)
            },
            error: function (xhr, status, error) {
                // Handle error response
                if (xhr.status === 404) {
                    alert('data not found.');
                } else {
                    alert('An error occurred: ' + error);
                }
                console.error('Error:', xhr.responseText);
            }
        });
    }

    $(document).on('click', '#btn-edit', function () {
        const dataId = selectedRowId;
        if (dataId) {
          fetchDataById(dataId);
        } else {
          alert('Please enter a data ID.');
        }
    });

    $(document).on('click', '#btn-delete', function () {
        const dataId = selectedRowId; // Ambil ID baris yang dipilih

        if (!dataId) {
            alert('No Row Selected.');
            return;
        }

        Swal.fire({
            title: 'Are You Sure?',
            text: 'The data you delete will not be recover anymore!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan penghapusan melalui AJAX
                $.ajax({
                    url: `/position/${dataId}`, // Ganti dengan URL endpoint Laravel Anda
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token
                    },
                    success: function (response) {
                        // Tampilkan notifikasi sukses
                        Swal.fire(
                            'Deleted!',
                            'Sucessfuly Delete the Data.',
                            'success'
                        );

                        // Refresh tabel DataTable
                        table.ajax.reload(null, false); // Reload tabel tanpa reset paging
                    },
                    error: function (xhr, status, error) {
                        // Tampilkan notifikasi error
                        Swal.fire(
                            'Error!',
                            'There are error while deleting the data.',
                            'error'
                        );
                    }
                });
            }
        });

        
    });

    
  </script>
@endpush