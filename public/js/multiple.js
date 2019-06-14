$(document).ready(function () {
    var counter = 0;

    
    var $options = `<option value="" disabled selected>User</option>`;

    $.ajax({
        url: "http://localhost:8000/all-users",
            beforeSend: function( xhr ) {
            xhr.overrideMimeType( "application/json;" );
            }
        })
        .done(function( data ) {
            
          $.each(data.users, function(i, val) {
              $options += `<option value="${val.id}">${val.name}</option>`;
          })          

          $("#addrow").on("click", function () {
            var $userSelect = `<div class="form-group">
            <select class="form-control select md-form" name="data[${counter}][user]">
                                                                                                     
            `;

            $userSelect += $options + `</select></div>`;  

            var newRow = $("<tr>");
            var cols = "";
    
            cols += `<td>${$userSelect}</td>`;
            cols += `<td><div class="form-group"><input type="text" placeholder="bonus" class="form-control" name="data[${counter}][bonus]"/></div></td>`;            
    
            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });
    
    
    
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });


        });

        

    


});
