@extends('layout.master')
@section('content')
<!-- partial -->

<div class="content-wrapper bg-white">
          <div class="row">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Management Table</h4>
                  <div class="table-responsive">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><table class="table table-striped">
                        <div class="col-md-4">
                          <form action="{{ url()->current() }}" autocomplete="off" method="get">
                              <div class="input-group ">
                                  <input type="text" class="form-control" placeholder="Search" name="search">
                                  <button class=" btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                              </div>
                          </form>
                         </div>
                        <thead>
                          <tr>
                            <th>
                              Nama
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                              No Telp
                          </th>
                          <th>
                            Level
                        </th>
                            <th>
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($usermanagements as $usermanagement)
                          <tr>
                            <td>
                              {{ $usermanagement->nama_petugas}}
                            </td>
                            <td>
                                {{ $usermanagement->username}}
                              </td>
                              <td>
                                {{ $usermanagement->telp}}
                              </td>
                              <td>
                                {{ $usermanagement->level}}
                              </td>
                            <td>
                            <form action="{{ route('usermanagement.destroy', $usermanagement->id_petugas) }}" method="POST">
  
                            <a class="btn rounded-pill btn-warning" href="{{ route('usermanagement.edit', $usermanagement->id_petugas)}}">Edit</a>
                            @csrf
                            @method('DELETE')
  
                            <button type="submit" class="btn rounded-pill btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                          </form>
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      <br>
                      {!! $usermanagements->links() !!}

                    </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{ route('usermanagement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Form User management</h4>
                                  <p class="card-description">
                                    Isi Form User management
                                  </p>
                                  <form class="forms-sample">
                                        <div class="form-group">
                                      <label for="exampleInputName1">Nama Petugas</label>
                                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Petugas" name="nama_petugas" value="{{ old('nama_petugas') }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1">Username</label>
                                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Username" name="username" value="{{ old('username') }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1">No Telp</label>
                                      <input type="text" class="form-control" id="exampleInputName1" placeholder="No Telp" name="telp" value="{{ old('telp') }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1">Password</label>
                                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Password" name="password" value="{{ old('password') }}">
                                    </div>
                                    <div class="form-group">
                                      <label for="level">Level</label>
                                      <select name="level" id="level" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                      </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                </form>
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                
                  
           
            

          
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Halaman ini bersifat rahasia dan hanya boleh diakses oleh pihak yang berwajib</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. Laporan Pengaduan Masyarakat</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


@endsection