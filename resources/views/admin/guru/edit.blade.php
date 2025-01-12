
@extends('layouts.master')

@section('title', 'Ubah Guru')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Guru</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Guru</a></li>
                                        <li class="breadcrumb-item">Ubah</li>
                                    </ol>
            
                                  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Ubah Guru</h4>
                                    
                                        <form action="{{ route('admin.guru.update', ['guru' => $guru->id]) }}" method="POST" class='mt-3' enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Nama</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="name" class='form-control' value="{{ $guru->name }}" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Nomor HP</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="nohp" class='form-control ' value="{{ $guru->nohp }}" required>
                                                    @error('nohp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Alamat</label>
                                                <div class="col-md-10">
                                                    <textarea name="alamat" id="" rows="5" class="form-control " required>{{ $guru->alamat }}</textarea>
                                                    @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Jenis Kelamin</label>
                                                <div class="col-md-10">
                                                    <select name="jk" class="form-control" required>
                                                        <option value="">Pilih</option>
                                                        <option @selected($guru->jk=='Laki-Laki') value="Laki-Laki">Laki-Laki</option>
                                                        <option @selected($guru->jk=='Perempuan') value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                @error('jk')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Gambar</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control-file" name='avatar'>
                                                    <img src="{{Storage::url('images/gurus/'.$guru->avatar)}} " alt="" srcset="" style="width: 100px"">
                                                    @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                
                                            </div>
                                            <button type="submit" class='btn btn-primary float-right'>Submit</button>
                                        </form>

        
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                        </div> <!-- end row -->        

                    </div> <!-- container-fluid -->
@endsection
