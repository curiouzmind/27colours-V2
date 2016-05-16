@extends('admin.admin_master')
    @section('title')
        <title>Admin Dashboard | 27Colours</title>
    @stop
    @section('main-content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-music fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$songs->count()}}</div>
                                <div>Tracks!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/song">
                        <div class="panel-footer">
                            <span class="pull-left">View All</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-video-camera fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$videos->count()}}</div>
                                <div>Videos!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/video">
                        <div class="panel-footer">
                            <span class="pull-left">View All Videos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$galleries->count()}}</div>
                                <div>Pictures!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View All Pitures</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$talents->count()}}</div>
                                <div>Registered Users!</div>
                            </div>
                        </div>
                    </div>
                    <a href="/talents">
                        <div class="panel-footer">
                            <span class="pull-left">View All Users</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">Recently Added Users</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover dataTables-example" data-page-length='5'>
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Talent</th>
                                    <th>Email</th>
                                    <th>Date Registered</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($talents as $talent)
                                <tr class="odd gradeX">
                                    <td>{{$talent->username}}</td>
                                    <td>{{$talent->first_name}}</td>
                                    <td>{{$talent->last_name}}</td>
                                    <td>{{$talent->talents}}</td>
                                    <td>{{$talent->email}}</td>
                                    <td>{{$talent->created_at}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">Recently Added Tracks</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover dataTables-example"  data-page-length='5'>
                                <thead>
                                <tr>
                                    <th>Track Name</th>
                                    <th>Uploader</th>
                                    <th>Genre</th>
                                    <th>Date Uploaded</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($songs as $song)
                                    <tr class="odd gradeX">
                                        <td>{{$song->title}}</td>
                                        <td>{{$song->user->username}}</td>
                                        <td>{{$song->genre}}</td>
                                        <td>{{$song->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">Recently Added Videos</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover dataTables-example"  data-page-length='5'>
                                <thead>
                                <tr>
                                    <th>Video Name</th>
                                    <th>Uploader</th>
                                    <th>Type</th>
                                    <th>Date Uploaded</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr class="odd gradeX">
                                        <td>{{$video->title}}</td>
                                        <td>{{$video->user->username}}</td>
                                        <td>{{$video->video_type}}</td>
                                        <td>{{$video->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">Recently Added Pictures</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover dataTables-example"  data-page-length='5'>
                                <thead>
                                <tr>
                                    <th>Picture Caption</th>
                                    <th>Uploader</th>
                                    <th>Category</th>
                                    <th>Date Uploaded</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($galleries as $gallery)
                                    <tr class="odd gradeX">
                                        <td>{{$gallery->caption}}</td>
                                        <td>{{$gallery->user->username}}</td>
                                        <td>{{$gallery->cat}}</td>
                                        <td>{{$gallery->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    @stop