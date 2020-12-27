$.fn.extend({
    treed: function (o) {
      
      var closedClass  = 'glyphicon glyphicon-chevron-right';
      var openedClass  = 'glyphicon glyphicon-chevron-down';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize tree
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //dynamically added icon event
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#tree1').treed();

$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

//add category event 
$('.addcategory').on("click",function(){
   var id = $(this).data('id'); 
   $('#parentId').val(id);
});

//edit category event 
$('.editcategory').on("click",function(){
    var id = $(this).data('id'); 
    var name = $(this).data('name');
    $('#id').val(id);
    $('#editCatagoryName').val(name);
 });

 //delete category event 
 $('.deletecategory').on("click",function(){
    var id = $(this).data('id'); 
    $('#deleteId').val(id);
 });

 //add category 
$('#addCategoryBtn').on("click",function(){
  var subCatagoryName = $('#subCatagoryName').val();
  if(subCatagoryName.trim() != ''){
    var parentId = $('#parentId').val();
    $.ajax({
      method: "POST",
      url: "add-category",
      data: {
          "parent_id": parentId,
          "title": subCatagoryName,
          "_token": $('#token').val(),
      },
      success: (data) => {
          console.log("Add success");
          $("#subCatagoryModal").modal('hide');
          $("#alert_message").addClass('alert alert-success');
          $("#alert_message").attr('hidden', false);
          window.location.reload();
      },
      error: () => {
          console.log("Delete error");
      },
    });
    }else{
        $("#subCatagoryModal").modal('hide');
        $("#error_message").addClass('alert alert-danger');
        $("#error_message").attr('hidden', false);
    }
  
});

//edit category
$('#editCategoryBtn').on("click",function(){
    var editCatagoryName = $('#editCatagoryName').val();
    if(editCatagoryName.trim() != ''){
        var id = $('#id').val();
        $.ajax({
        method: "POST",
        url: "edit-category",
        data: {
            "id": id,
            "title": editCatagoryName,
            "_token": $('#token').val(),
        },
        success: (data) => {
            console.log("Add success");
            $("#subCatagoryeEditModal").modal('hide');
            $("#alert_message").addClass('alert alert-success');
            $("#alert_message").attr('hidden', false);
            // $("body").empty();
            // $("body").html(data.html);
            window.location.reload();
        },
        error: () => {
            console.log("Delete error");
        },
        });
    }else{
        $("#subCatagoryeEditModal").modal('hide');
        $("#error_message").addClass('alert alert-danger');
        $("#error_message").attr('hidden', false);
    }
  });

  //delete category
  $('#deleteCategoryBtn').on("click",function(){
    var id = $('#deleteId').val();
    $.ajax({
      method: "POST",
      url: "delete-category",
      data: {
          "id": id,
          "_token": $('#token').val(),
      },
      success: (data) => {
          console.log("Add success");
          $("#subCatagoryeDeleteModal").modal('hide');
          $("#alert_message").addClass('alert alert-success');
          $("#alert_message").attr('hidden', false);
          window.location.reload();
      },
      error: () => {
          console.log("Delete error");
      },
    });
  });

  //add parent category
  $('#parentCategoryBtn').on("click",function(){
    var parentCatagoryName = $("#parantCatagoryName").val(); 
    $.ajax({
      method: "POST",
      url: "add-parent-category",
      data: {
           "title": parentCatagoryName,
          "_token": $('#token').val(),
      },
      success: (data) => {
          console.log("Add success");
          $("#parantCatagoryModal").modal('hide');
          $("#alert_message").addClass('alert alert-success');
          $("#alert_message").attr('hidden', false);
          window.location.reload();
      },
      error: () => {
          console.log("Delete error");
      },
    });
  });
  