@extends('admin.master.master')

@section('title')
Face Pack Info List | {{ $ins_name }}
@endsection


@section('body')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Face Pack Info List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Face Pack Info List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Update Face Pack Info </h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="{{ route('facePackInfoList.update',$facialPackLists->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" value="{{ $facialPackLists->pack_name }}" name ="name" class="form-control" id="" placeholder="Name" required>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Amount</label>
                                    <input type="text" value="{{ $facialPackLists->amount }}" name ="amount" class="form-control" id="" placeholder="Amount" required>
                                </div>




<?php
$faceIngredientList = DB::table('face_pack_details')
->where('main_pack_id',$facialPackLists->id )->get();


?>

                                <div class="col-12">
                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th>Pack Detail</th>

                                            <th>Action</th>
                                        </tr>
                                        @foreach($faceIngredientList as $key=>$allTherapyIngredient)
                                        @if($key+1 == 1)
                                        <tr>
                                            <td>
                                                <select class="form-select mb-3" name="therapy_ingredient_id[]" aria-label="Default select example">
                                                    @foreach($therapyIngredients as $allTherapyIngredients)
                                                    <option value="{{ $allTherapyIngredients->id }}"  {{ $allTherapyIngredient->pack_detail_id ==  $allTherapyIngredients->id ? 'selected':'' }}>{{ $allTherapyIngredients->pack_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td>
                                                <button type="button" name="add" id="dynamic-ar"
                                                        class="btn btn-outline-primary">Add New
                                                </button>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>
                                                <select class="form-select mb-3" name="therapy_ingredient_id[]" aria-label="Default select example">
                                                    @foreach($therapyIngredients as $allTherapyIngredients)
                                                    <option value="{{ $allTherapyIngredients->id }}"  {{ $allTherapyIngredient->pack_detail_id ==  $allTherapyIngredients->id ? 'selected':'' }}>{{ $allTherapyIngredients->pack_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td>
                                                <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </table>
                                </div>



                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->








    </div>

    <!-- End Page-content -->

</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin

    });
});
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            ' <select class="form-select mb-3" name="therapy_ingredient_id[]" aria-label="Default select example">' +
            '@foreach($therapyIngredients as $allTherapyIngredients)<option value="{{ $allTherapyIngredients->id }}">{{ $allTherapyIngredients->pack_name }}</option>@endforeach</select>' +
            '</td>' +


            '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
