@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Studies
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create studies</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Done!</h4>
                                {{ session('message') }}
                            </div>
                        @endif


                        {{--<div class="alert alert-danger alert-dismissible">--}}
                            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                            {{--<h4><i class="icon fa fa-ban"></i> Oops!</h4>--}}
                            {{--Something is wrong!--}}
                        {{--</div>--}}

                        <form role="form" action="/studies" method="post" id="createStudy">
                            {!! csrf_field() !!}

                            {{--<input type="hidden" name="law_id" value="1">--}}

                            <?php
                                $warning = "";
                                if ($errors->has('name')) {
                                    $warning = "has-warning";
                                }
                            ?>

                            <div class="form-group {{ $warning }}">
                                <label class="control-label" for="inputWarning">
                                    @if ($errors->has('name'))
                                        <i class="fa fa-bell-o"></i> Name</label>
                                    @endif

                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">

                                @foreach ($errors->get('name') as $message)
                                    <span class="help-block">{{ $message }}</span>
                                @endforeach
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('createStudy').submit();">Create</button>
                    </div>
                </div>

                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Studies</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($studies as $study)
                                <tr>
                                    <td>{{ $study->id  }}</td>
                                    <td>{{ $study->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
