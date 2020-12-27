@foreach($childs as $child)
	<li>
	    {{ $child->title }}&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o addcategory" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryModal"  data-id="{{$child->id}}"></i>
        &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil-square-o editcategory" aria-hidden="true" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryeEditModal" data-id="{{$child->id}}" data-name="{{$child->title}}"></i>
        &nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o deletecategory" aria-hidden="true" style="font-size:15px;" aria-hidden="true" data-toggle="modal" data-target="#subCatagoryeDeleteModal" data-id="{{$child->id}}"></i>
        <ul>
            @if(count($child->childs))
                @include('subCategory',['childs' => $child->childs])
            @endif
        </ul>
	</li>
@endforeach
