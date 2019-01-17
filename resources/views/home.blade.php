@extends('layouts.main')
@section('content')
<!-- <div id="page-head">
    111111111111
</div> -->

                <div id="page-content">
                    
                    
                    <!--Activated Users Chart-->
                    <!--===================================================-->
                    <div class="panel">
                    
                        <!--Chart information-->
                        <div class="panel-body">
                            <div class="row mar-top">
                                <div class="col-md-5">
                                    <h3 class="text-main text-normal text-2x mar-no">Activated Users</h3>
                                    <h5 class="text-uppercase text-muted text-normal">Report for last 7-days ago</h5>
                                    <hr class="new-section-xs">
                                    <div class="row mar-top">
                                        <div class="col-sm-5">
                                            <div class="text-lg"><p class="text-5x text-thin text-main mar-no">520</p></div>
                                            <p class="text-sm">Since 2016 190 peoples already registered</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="list-group bg-trans mar-no">
                                                <a class="list-group-item" href="#"><i class="demo-pli-information icon-lg icon-fw"></i> User Details</a>
                                                <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                                                <a class="list-group-item" href="#"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-pink mar-ver">View Details</button>
                                    <p class="text-xs">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                </div>
                                <div class="col-md-7">
                                    <div id="demo-bar-chart" style="height:250px"></div>
                                    <hr class="new-section-xs bord-no">
                                    <ul class="list-inline text-center">
                                        <li><span class="label label-info">354</span> Students</li>
                                        <li><span class="label label-warning">74</span> Parents</li>
                                        <li><span class="label label-default">25</span> Teachers</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End Activated Users chart-->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-sm-3 col-lg-6">
                    
                                    <!--Tile-->
                                    <!--===================================================-->
                                    <div class="panel panel-primary panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">53</span>
                                            <p>Sales</p>
                                            <i class="demo-pli-shopping-bag icon-lg"></i>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                    
                    
                                    <!--Tile-->
                                    <!--===================================================-->
                                    <div class="panel panel-warning panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">68</span>
                                            <p>Messages</p>
                                            <i class="demo-psi-mail icon-lg"></i>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                    
                                </div>
                                <div class="col-sm-3 col-lg-6">
                    
                                    <!--Tile-->
                                    <!--===================================================-->
                                    <div class="panel panel-purple panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">32</span>
                                            <p>Projects</p>
                                            <i class="demo-pli-coding"></i>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                    
                    
                                    <!--Tile-->
                                    <!--===================================================-->
                                    <div class="panel panel-dark panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">12</span>
                                            <p>Reports</p>
                                            <i class="demo-psi-receipt-4 icon-lg"></i>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                    
                                </div>
                                <div class="col-sm-6 col-lg-12">
                    
                    
                                    <!--Profile Widget-->
                                    <!--===================================================-->
                                    <div class="panel">
                                        <div class="panel-body text-center">
                                            <img alt="Profile Picture" class="img-lg img-circle mar-btm" src="nifty/img/profile-photos/5.png">
                                            <p class="text-lg text-semibold mar-no text-main">Donald Brown</p>
                                            <p class="text-muted">Web and Graphic designer</p>
                                            <div class="mar-top">
                                                <button class="btn btn-mint">Follow</button>
                                                <button class="btn btn-mint">Message</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                    
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter mar-top">
                                            <thead>
                                                <tr>
                                                    <th class="min-w-td">#</th>
                                                    <th class="min-w-td">User</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Subscription</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="min-w-td">1</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/1.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">John Doe</a></td>
                                                    <td>john.doe@example.com</td>
                                                    <td><span class="label label-table label-info">Trial</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-td">2</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/2.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">Charles S Boyle</a></td>
                                                    <td>char_boy90@example.com</td>
                                                    <td><span class="label label-table label-success">Free</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-td">3</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/3.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">Scott S. Calabrese</a></td>
                                                    <td>scot.em23@example.com</td>
                                                    <td><span class="label label-table label-purple">Bussiness</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-td">4</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/4.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">Lucy Moon</a></td>
                                                    <td>just_lucy.doe@example.com</td>
                                                    <td><span class="label label-table label-mint">Personal</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-td">5</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/5.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">Teresa L. Doe</a></td>
                                                    <td>ter.l.doe@example.com</td>
                                                    <td><span class="label label-table label-success">Free</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-td">6</td>
                                                    <td><img src={{ asset("nifty/img/profile-photos/6.png") }} alt="Profile Picture" class="img-circle img-sm"></td>
                                                    <td><a class="btn-link" href="#">Maria Marz</a></td>
                                                    <td>maria_545@example.com</td>
                                                    <td><span class="label label-table label-info">Trial</span></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                    
                                        <!--Pagination-->
                                        <div class="text-right">
                                            <ul class="pagination mar-no">
                                                <li class="disabled"><a class="demo-pli-arrow-left-2" href="#"></a></li>
                                                <li class="active"><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><span>...</span></li>
                                                <li><a href="#">20</a></li>
                                                <li><a class="demo-pli-arrow-right-2" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




@endsection