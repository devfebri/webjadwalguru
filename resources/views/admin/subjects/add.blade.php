@extends('layouts.master')

@section('title', 'Tambah Mata Pelajaran')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Mata Pelajaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mata Pelajaran</a></li>
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

                        <h4 class="mt-0 header-title">Tambah Mata Pelajaran</h4>

                        <form action="{{ route('admin.subjects.store') }}" method="POST" class='mt-3'>
                            @csrf
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="name"
                                        class='form-control @error('name') is-invalid @enderror'>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Kode Guru</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="guru_id" aria-label="Default select example">
                                        <option value="">== Pilih Salah Satu ==</option>
                                        @foreach ($guru as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kode_guru')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Kelas</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="kelas_id" aria-label="Default select example">
                                        <option value="">== Pilih Salah Satu ==</option>
                                        @foreach ($kelas as $item1)
                                        <option value="{{ $item1>id }}">{{ $item1->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <button type="submit" class='btn btn-primary float-right'>Submit</button>
                        </form>

                    </div>
                </div>

            </div> <!-- end col -->

        </div> <!-- end row -->

    </div> <!-- container-fluid -->
@endsection
