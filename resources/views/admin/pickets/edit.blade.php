
@extends('layouts.master')

@section('title', 'Tambah Jadwal Piket')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Jadwal Piket</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Jadwal Piket</a></li>
                                        <li class="breadcrumb-item">Tambah</li>
                                    </ol>
            
                                  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Tambah Jadwal Piket</h4>
                               
                                        <form action="{{ route('admin.pickets.update', ['picket' => $picket->id]) }}" method="POST" class='mt-3' >
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Pilih guru</label>
                                                <div class="col-md-10">
                                                    <select name="guru" id="subjects" class="form-control @error('subject') is-invalid @enderror">
                                                        <option value="">Pilih guru..</option>
                                                        @foreach($gurus as $guru)
                                                        <option value="{{ $guru->id }}" {{$guru->id == $picket->guru_id ? 'selected' : ''}}>{{ $guru->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('guru')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Hari</label>
                                                <div class="col-md-10">
                                                    <select name="day" id="subjects" class="form-control @error('day') is-invalid @enderror">
                                                        <option value="">Pilih hari..</option>
                                                        @foreach($days as $day)
                                                        <option value="{{ $day->id }}" {{$day->id == $picket->day_id ? 'selected' : ''}}>{{ $day->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('day')
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
