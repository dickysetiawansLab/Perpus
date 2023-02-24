@extends('_template')

@section('title', 'Data Anggota - D Perpus')

@section('konten')

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>
                    <p class="mb-4">Daftar Anggota yang telah terdaftar</p>
                    <a href="/data/anggota/tambah" class="btn btn-dark btn-sm mb-2" style="text-decoration: none; margin-top: 5px;">+ Tambah Data</a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Daftar Anggota D-PERPUS</h6>

                         </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-dark">
                                        <tr>
											<th scope="col">No</th>
										   	<th scope="col">Kode Anggota</th>
										    <th scope="col">NIS</th>
										   	<th scope="col">Nama Lengkap</th>
										   	<th scope="col">Kelas</th>
										   	<th scope="col">Alamat</th>
										   	<th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($users as $user => $u)

								    		<tr>
									    		@if($u->role == 'anggota')	
										    		<th scope="row">1</th>
												    <td>{{ $u->kode_user }}</td>
												    <td>{{ $u->nis }}</td>
												    <td>{{ $u->fullname }}</td>
												    <td>{{ $u->kelas }}</td>
												    <td>{{ $u->alamat }}</td>
													<td>
								                        	<a href="/data/anggota/delete?id={{ $u->id }}" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteModal">
	                                           						<i class="fas fa-trash"></i>
															</a>
												    </td>
												@endif
											</tr>
								    	@endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>


@endsection
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" untuk menghapus data tersebut.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a href="/data/anggota/delete?id={{ $u->id }}" class="btn btn-primary"> Hapus </a>
                        <!-- <a class="" href="/logout">Logout</a> -->
                    </div>
                </div>
            </div>
        </div>