@extends('layouts.master')
@section('title')
    edit product
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">add products</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($product,['method'=>'PATCH', 'action' => ['productController@update','id'=>$product->p_id], 'files'=>'true ']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="InputProductName">Product name</label>
                            {!! Form::text('p_name' , null, ['class' => 'form-control filters', 'id' => 'InputProductName']); !!}
                        </div>
                        <?php $i = 1; ?>
                    @foreach($filtervalues as $key => $value)
                            <div class="form-group" id='id_div{{$i}}'>
                            <label for="InputProductFilter">filter</label>
                            {!! Form::select('filter[]',$filters , $key, ['class' => 'form-control filters', 'id' => '',"onchange"=>"changeFilter(this)"]); !!}
                            {!! Form::select('filterVal[]',$value[1], $value[0], ['class' => 'form-control filterValues', 'id' => 'InputProductName']); !!}
                                <a  href='javascript:del_tab({{$i}})' class='btn btn-danger' style='margin-top: 13px;'>
                                    Delete <i class='fa fa-plus'></i>
                                    </a>
                            </div>
                        <?php $i++;?>
                        @endforeach
                        <div  class="filters-parent" id="ll">
                            <a href="#" class="add-filter btn btn-info">add filter</a>
                        </div>
                        <div class="form-group">
                            <label for="InputProductCategory">category</label>
                            {!! Form::select('p_categoryid', $categories, null, ['class' => 'form-control', 'id' => 'InputProductCategory']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputProductPrice">Price</label>
                            {!! Form::text('p_price', null, ['class' => 'form-control', 'id' => 'InputProductPrice']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputProductDescription">description</label>
                            {!! Form::textarea('p_description', null, ['class' => 'form-control', 'id' => 'InputProductDescription']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputProductCode">Code</label>
                            {!! Form::text('p_code', null, ['class' => 'form-control', 'id' => 'InputProductCode']); !!}
                        </div>
                        <div class="form-group">
                            <label for="InputProductDiscount">discount</label>
                            {!! Form::text('p_discount', null, ['class' => 'form-control', 'id' => 'InputProductDiscount']); !!}
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection('content')
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.add-filter').click(function () {

                var item = Math.floor((Math.random() * 100) + 1);
                $("#ll").prepend("<div class='form-group' id='id_div" + item +"'>" +
                    "<label for='InputProductFilter'>filter</label>" +
                    '<?php echo Form::select('filter[]', $filters, null, ['class' => 'form-control filters',"onchange"=>"changeFilter(this)"]); ?>' +
                    '<?php echo Form::select('filterVal[]', [], null, ['class' => 'form-control filterValues', 'id' => 'InputProductName']); ?>' +
                    "<a  href='javascript:del_tab(\"" + item + "\")' class='btn btn-danger' style='margin-top: 13px;'>" +
                    "Delete <i class='fa fa-plus'></i>" +
                    "</a>"+
                    "</div>"
                );
            });
        });

        function changeFilter(value)
        {
            var thisFilter = $(value);
            var id = thisFilter.val();
            console.log(id);
            var options = '';
            $.ajax({
                type: 'get',
                url: '../../filters/' + id,
                success: function (result) {
                    for (i in result) {
                        options += '<option value="' + i + '">' + result[i] + '</option>';
                    }
                    thisFilter.siblings('.filterValues').html(options);
                }});
        }
        function del_tab(del_id)
        {

            $("#id_div" + del_id).remove();
        }
    </script>

@endsection('script')