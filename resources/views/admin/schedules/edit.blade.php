@extends('layouts.master')

@section('title', 'Tambah Jadwal Pelajaran')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Jadwal Pelajaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Jadwal Pelajaran</a></li>
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

                        <h4 class="mt-0 header-title">Edit Jadwal Pelajaran</h4>

                        <form action="{{ route('admin.schedules.update',$schedule->id) }}" method="POST" class='mt-3'>
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Mata Pelajaran</label>
                                <div class="col-md-10">
                                    <select name="subject" id="subjects"
                                        class="form-control @error('subject') is-invalid @enderror">
                                        <option value="">Pilih mata pelajaran..</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $subject->id == $schedule->subject_id ? 'selected' : '' }}>
                                                {{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Guru</label>
                                <div class="col-md-10">
                                    <select name="guru_id" id="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                                        <option value="">Pilih Guru..</option>
                                        @foreach($gurus as $guru)
                                        <option value="{{ $guru->id }}" {{ $guru->id == $schedule->guru_id ? 'selected' : '' }}> {{ $guru->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('guru_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Kelas</label>
                                <div class="col-md-10">
                                    <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                        <option value="">Pilih Kelas..</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" {{ $kelas->id == $schedule->kelas_id ? 'selected' : '' }}>{{ $kelas->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Hari</label>
                                <div class="col-md-10">
                                    <select name="day" id="subjects"
                                        class="form-control @error('day') is-invalid @enderror">
                                        <option value="">Pilih hari..</option>
                                        @foreach ($days as $day)
                                            <option value="{{ $day->id }}"
                                                {{ $day->id == $schedule->day_id ? 'selected' : '' }}>{{ $day->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('day')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Waktu Mulai</label>
                                <div class="col-md-10">
                                    <input type="time" name="start_time"
                                        class='form-control  @error('start_time') is-invalid @enderror'
                                        value="{{ $schedule->start_time }}">
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class='col-md-2 col-form-label'>Waktu Selesai</label>
                                <div class="col-md-10">
                                    <input type="time" name="end_time"
                                        class='form-control  @error('end_time') is-invalid @enderror'
                                        value="{{ $schedule->end_time }}">
                                    @error('end_time')
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
