@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
    {{ __('main_trans.grades_list') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">
                    {{ __('main_trans.grades_list') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item">
                        <a href="#" class="default-color">
                            {{ __('main_trans.grades') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active"> {{ __('main_trans.grades_list') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="d-flex align-items-center gap-2 p-3">
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#addGrade">
                        {{ trans('grades.add_grade') }}
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('grades.grade_name') }}</th>
                                    <th>{{ __('grades.grade_notes') }}</th>
                                    <th>{{ __('grades.grade_proccesses') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ $grade->notes }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success">
                                                {{ __('main_trans.edit') }}
                                            </a>
                                            <a href="#" class="btn btn-danger">
                                                {{ __('main_trans.delete') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    {{-- Add Grade Modal --}}

    <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="addGradeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="addGradeLabel">
                        {{ trans('grades.add_grade') }}
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label for="name_en" class="mr-sm-2">{{ __('grades.grade_name_en') }}:</label>
                                <input type="text" name="name_en" class="form-control" id="name_en"
                                    value="{{ old('name_en') }}">
                            </div>

                            <div class="col">
                                <label for="name_ar" class="mr-sm-2">{{ __('grades.grade_name_ar') }}:</label>
                                <input type="text" name="name_ar" class="form-control" id="name_ar"
                                    value="{{ old('name_ar') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notes">{{ __('grades.grade_notes') }}:</label>
                            <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes') }}</textarea>
                        </div>

                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('main_trans.submit') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
