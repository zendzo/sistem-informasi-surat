@extends('layouts.master')

@section('content')
   <div class="box box-primary">
    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="ion ion-clipboard"></i>

    <h3 class="box-title">{{ $page_title }}</h3>

        <div class="box-tools pull-right">
        <ul class="pagination pagination-sm inline">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list ui-sortable">
            @foreach ($menuCategories as $category)
            <li>
                <!-- todo text -->
                <span class="text">{{ $category->name }}</span>
                <!-- Emphasis label -->
                <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                <!-- General tools such as edit or delete-->
                <div class="tools">
                <i class="fa fa-edit"></i>
                <i class="fa fa-trash-o"></i>
                </div>
            </li>
                @foreach ($category->menuItems as $menuItem)
                 <li>
                        <!-- drag handle -->
                        <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                        </span>
                    <!-- todo text -->
                    <span class="text">{{ $menuItem->name }}</span>
                    <!-- Emphasis label -->
                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                @endforeach
                    @foreach ($menuItem->subMenuItems as $subMenuItem)
                    <li>
                            <!-- drag handle -->
                            <span class="handle ui-sortable-handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <!-- drag handle -->
                            <span class="handle ui-sortable-handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                            </span>
                        <!-- todo text -->
                        <span class="text">{{ $subMenuItem->name }}</span>
                        <!-- Emphasis label -->
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                        </div>
                    </li>
                    @endforeach
            @endforeach
        </ul>
    </div>
<!-- /.box-body -->
<div class="box-footer clearfix no-border">
    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
</div>
</div> 
@endsection
