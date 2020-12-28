<html>
<head>
    <title>Laravel Category Treeview Example - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/treeview.css') }}">
    <style>
        .main-box{
            box-shadow: -2px 2px 44px -9px rgba(0,0,0,0.66);
        -webkit-box-shadow: -2px 2px 44px -9px rgba(0,0,0,0.66);
        -moz-box-shadow: -2px 2px 44px -9px rgba(0,0,0,0.66);
        }
    </style>
    <script>
       $('#tree1').treed();
    </script>
</head>
<body>
<div id="myTree" class="container main-box" style="margin-top:30px;width:50%;margin-left:25%; border: 2px solid black; padding: 10px">
    <button class="btn btn-success" id="parentCategory" data-toggle="modal" data-target="#parantCatagoryModal">Add New Category</button><br><hr>
    <div id="alert_message_add" hidden>Your Data Successfully Added</div>
    <div id="alert_message_edit" hidden>Your Data Successfully Edited</div>
    <div id="alert_message_delete" hidden>Your Data Successfully Deleted</div>
    <div id="error_message" hidden>Please Fillup Name Fields</div>
    <div class="row">
        <div class="col-md-12">
            <ul id="tree1">
                @foreach($categories as $categorie)
                    <li><a href="#">{{$categorie->title}}</a>
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o addcategory" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryModal" data-id="{{$categorie->id}}"></i>
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil-square-o editcategory" aria-hidden="true" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryeEditModal" data-id="{{$categorie->id}}" data-name="{{$categorie->title}}"></i>
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o deletecategory" aria-hidden="true" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryeDeleteModal" data-id="{{$categorie->id}}"></i>
                        <ul>
                            @if(count($categorie->childs))
                                @include('subCategory',['childs' => $categorie->childs])
                            @endif    
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> 
    <div class="modal fade" id="parantCatagoryModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="subCatagoryForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Category Name</h4>
                    </div>
                    <div class="modal-body">
                        <lable>Enter Name</lable>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input class="form-control" id="parantCatagoryName" type="text" name="parantCatagoryName">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="parentCategoryBtn" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="subCatagoryModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="subCatagoryForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add SubCategory Name</h4>
                    </div>
                    <div class="modal-body">
                        <lable>Enter Name</lable>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input class="form-control" id="subCatagoryName" type="text" name="subCatagoryName">
                        <input class="form-control" id="parentId" type="hidden" name="parentId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="addCategoryBtn" class="btn btn-success">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="subCatagoryeEditModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="subCatagoryEditForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Category Name</h4>
                    </div>
                    <div class="modal-body">
                        <lable>Enter Name</lable>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input class="form-control" id="editCatagoryName" type="text" name="editCatagoryName">
                        <input class="form-control" id="id" type="hidden" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="editCategoryBtn" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="subCatagoryeDeleteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form id="subCatagoryDeleteForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete Category</h4>
                    </div>
                    <div class="modal-body">
                        <lable>Are you sure you want t delete it</lable>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input class="form-control" id="deleteId" type="hidden" name="deleteId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="deleteCategoryBtn" class="btn btn-success">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>        
</div>
   <script type="text/javascript" src="{{URL::to('public/js/treeview.js')}}"></script>

</body>
</html>