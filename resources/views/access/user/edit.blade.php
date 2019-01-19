@extends('layouts.main')
@section('content')


<div id="page-content">

    <!-- Basic Data Tables -->
    <!--===================================================-->
    <div  class="row">
        <div class="panel">
             
            <form class="form-horizontal" method="POST" action={{route('access.user.update')}}>
                <div class="panel-heading text-left">
                    <h3 class="panel-title">User Edit</h3>
                </div>
                {{ csrf_field() }}
                <div class="panel-body">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="demo-hor-inputemail">User Name</label>
                        <div class="col-sm-3">
                            <input type="text" name="name" placeholder="Role Name"  value="{{ $user->name }}"  id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="demo-hor-inputemail">Roles</label>
                        <div class="col-md-6 col-sm-6">
                            <p>
                                <a href="javascript:checkAll();" class="btn btn-sm btn-primary "><i class="ion-gear-b"></i> 全选</a>
                                <a href="javascript:checkReverse();" class="btn btn-sm btn-primary "><i class="ion-gear-b"></i> 反选</a>
                            </p>
                            @foreach($all_roles as $v)
                                <div class="col-md-4 col-sm-4">
                                    <div class="checkbox">
                                            <input id="checkbox_{{$v['id']}}"  @if(in_array($v['id'],$roles ?? [] ) )checked="true" @endif class="magic-checkbox" name="roles[]" value="{{ $v['id'] }}"  type="checkbox">
                                            <label for="checkbox_{{$v['id']}}">{{ $v['name']  }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Striped Table -->
</div>

@endsection

@section('scripts')
<script type="text/javascript">

$(document).on('nifty.ready', function() {

});

function checkAll(){
    $("input[type=checkbox]").each(function() {
        if(!this.checked) this.click();
    });
}

//反选
function checkReverse() {
    $("input[type=checkbox]").each(function() {
        this.click();
    });
}
</script>

@endsection