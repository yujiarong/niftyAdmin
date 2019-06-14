@extends('layouts.main')
@section('content')
<!--DataTables [ OPTIONAL ]-->
<link href={{ asset('nifty/plugins/datatables/media/css/dataTables.bootstrap.css') }}  rel="stylesheet">
<link href={{ asset('nifty/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }} rel="stylesheet">
<link href={{ asset("nifty/plugins/animate-css/animate.min.css") }}  rel="stylesheet">
              {{--   <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Static Tables</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Static Tables</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div> --}}
                <div id="page-content">
                    <!-- Basic Data Tables -->
                    <!--===================================================-->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">User Manager</h3>
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button id="demo-btn-addrow" class="btn btn-primary"><i class="demo-pli-add"></i> Add</button>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="min-tablet">Email</th>
                                        <th class="min-tablet">Roles</th>
                                        <th class="min-tablet">Creat Time</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Striped Table -->
                </div>
@endsection

@section('scripts')
<!--DataTables [ OPTIONAL ]-->
<script src={{ asset("nifty/plugins/datatables/media/js/jquery.dataTables.js") }} ></script>
<script src={{ asset("nifty/plugins/datatables/media/js/dataTables.bootstrap.js") }} ></script>
<script src={{ asset("nifty/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js") }} ></script>
<script type="text/javascript">

$(document).on('nifty.ready', function() {


    // DATA TABLES
    // =================================================================
    // Require Data Tables
    // -----------------------------------------------------------------
    // http://www.datatables.net/
    // =================================================================

    $.fn.DataTable.ext.pager.numbers_length = 5;


    // Basic Data Tables with responsive plugin
    // -----------------------------------------------------------------
    
    var rowSelection = $('#demo-dt-basic').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
              "previous": '<i class="demo-psi-arrow-left"></i>',
              "next": '<i class="demo-psi-arrow-right"></i>'
            }
        },
        "dom": '<"newtoolbar">frtip',
        processing: true,
        serverSide: true,
        ajax: {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ route("access.user.tableGet") }}',
            type: 'post'
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles',searchable: false,sortable: false},
            {data: 'created_at', name: 'created_at'},
            {
                name: 'actions',
                data: null,
                sortable: false,
                searchable: false,
                    render: function (data) {
                        var actions = '<div class="btn-group">';
                        actions += '<a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="/access/user/edit/'+data.id+'"  data-original-title="Edit" data-container="body"></a>'
                        actions += '<a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" onclick="deleteUser('+data.id+')" data-container="body"></a>';
                        actions += '</div>';
                        return actions;
                    }
                }
        ],    
        searchDelay: 500,
    });
    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

    $('#demo-btn-addrow').on('click', function(){
        bootbox.dialog({
            title: "新增用户",
            message:'<div class="row"> ' + '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' + 
                    '<div class="form-group"> ' +
                            '<label class="col-md-4 control-label" for="name">Name</label> ' +
                            '<div class="col-md-4"> ' +
                            '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                            '</div>'+ 
                    '</div>'+
                    '<div class="form-group"> ' +
                            '<label class="col-md-4 control-label" for="email">Email</label> ' +
                            '<div class="col-md-4"> ' +
                            '<input id="email" name="email" type="text" placeholder="Your Email" class="form-control input-md"> ' +
                            '</div>'+ 
                    '</div>'+
                    '<div class="form-group"> ' +
                            '<label class="col-md-4 control-label" for="email">Password</label> ' +
                            '<div class="col-md-4"> ' +
                            '<input id="password" name="password" type="text" placeholder="Your Password" class="form-control input-md"> ' +
                            '</div>'+ 
                    '</div>'+
                    '</form> </div> </div>',
            buttons: {
                close:{
                    label: "Close",
                    className: "btn-default",                    
                },                
                success: {
                    label: "Save",
                    className: "btn-primary",
                    callback: function() {
                        var name        = $('#name').val();
                        var email       = $('#email').val();
                        var password    = $('#password').val();
                        var is_close    = false;
                        $.ajax({
                            type        : 'post',
                            url         : '{{ route("access.user.store") }}',
                            headers     : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data        : {'name':name,'email':email,'password':password},
                            async       : false, 
                            success     : function(e){
                                if(e.code  == 200){
                                    $('#demo-dt-basic').dataTable().fnDraw(false);
                                    notify('success','success','添加成功');
                                    is_close = true;
                                }else{
                                    notify('warning',e.msg);
                                }
                            },
                            error    : function(e) {
                                notify('danger','出错了！请联系管理人员');
                            }
                        });
                        if(!is_close){
                            return false;
                        }
                    }
                }
            },
            animateIn: 'zoomInDown',
            animateOut : 'zoomOutUp'
        });
    });

});
function deleteUser(id){
    niftydelete(id,'{{ route("access.user.delete") }}');

}
</script>

@endsection