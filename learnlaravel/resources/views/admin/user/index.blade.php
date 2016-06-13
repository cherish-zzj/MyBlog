@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>用户管理<small>» 列表</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="users-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        {{--<th>创造时间</th>--}}
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach ($users as $user)--}}
                        <tr>
{{--                            <td>{{ $user->username }}</td>--}}
{{--                            <td>{{ $user->email }}</td>--}}
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                        {{--@endforeach--}}
                    </tbody>
                </table>



            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#users-table").DataTable({
                order: [[0, "desc"]]
            });
        });
    </script>
@stop