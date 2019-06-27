function createFirm(){
    document.location.href = "../view/create.php";
}

function searchFirm(){
    document.location.href = "../view/searchFirm.php";
}

function createContract(){
    document.location.href = "../view/createContract.php";
}

function searchContract(){
    document.location.href = "../view/searchContact.php";
}

function back(){
    document.location.href="../view/main.php";
}

function createF(){
        var form = document.getElementById("form-firm");

        var name = form.elements[0].value;
        var shef = form.elements[1].value;
        var address = form.elements[2].value;
        var type = 1;

        alert(name + shef + address + type);

        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({name:name, shef:shef, address:address, type:type}),
            success: function(result){
                if(result == "success"){
                    alert("Firm create");
                    window.location = "../view/createFirm.php";
                }
            }
        });
}

function deleteFirm(){
    var isAdmin = confirm("Are you sure, what want delete this firm?");

    var form = document.forms.form;
    var type = 3;
    var id = form.elements.id.value;

    if(isAdmin){
        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({type:type, id:id}),
            success: function(result){
                if(result == "success"){
                    alert("Firm delete");
                    window.location = "../view/createContract.php";
                }
            }
        });
    }
}

function editFirm(){
    var isAdmin = confirm("Are you sure, what want edit this firm?");
        var form = document.forms.form;

        var name = form.elements[0].value;
        var shef = form.elements[1].value;
        var address = form.elements[2].value;
        var id = form.elements.id.value;
        var type = 2;

    if(isAdmin){
        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({name:name, shef:shef, address:address, type:type, id:id}),
            success: function(result){
                if(result == "success"){
                    alert("Firm edit");
                    window.location = "../view/createFirm.php";
                }
            }
        });
    }
}

function createC(){
    var form = document.getElementById("form-contact");

    var id_firm = form.id_firm.value;
    var number = form.field_number.value;
    var name = form.field_name.value;
    var sum = form.field_sum.value;
    var start = form.field_tart.value;
    var finish = form.field_finish.value;
    var avans = form.field_prepayment.value;
    var type = 4;

    var isAdmin = confirm("Are you sure, what want create this contact?\nId-firm = " + id_firm + "\nnumber = " + number + "\nname = " + name + "\nsum = " + sum + "\ndata Start = " + start + "\ndata Finish = " + finish + "\navans = " + avans);
    if((start > finish) || (sum < avans) || (sum < 0) || (avans < 0)){    
        alert("You entered incorrect data");
    }else{
        if(true){
            $.ajax({
                url: "../model/query.php",
                type: "POST",
                data: ({id_firm:id_firm, name:name, number:number, start:start, finish:finish, sum:sum, avans:avans, type:type}),
                success: function(result){
                    alert(result);
                    if(result == "success"){
                        alert("Contact create");
                        window.location = "../view/createContract.php";
                    }
                }
            });
        } 
    }
}

function editContact(){
    var form = document.getElementById("form");

    var id = form.id.value;
    var id_firm = form.id_firm.value;
    var number = form.number.value;
    var name = form.fname.value;
    var sum = form.sum.value;
    var start = form.start.value;
    var finish = form.finish.value;
    var type = 5;

    var isAdmin = confirm("Are you sure, what want edit this contack?");

    if(isAdmin){
        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({id_firm:id_firm, name:name, number:number, start:start, finish:finish, sum:sum, type:type, id:id}),
            success: function(result){
                if(result == "success"){
                    alert("Contact edit");
                    window.location = "../view/createContract.php";
                }
            }
        });
    }

}

function deleteContact(){
    var isAdmin = confirm("Are you sure, what want delete this contack?");

    var form = document.getElementById("form");

    var type = 6;
    var id = form.elements.id.value;

    if(isAdmin){
        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({type:type, id:id}),
            success: function(result){
                        alert("OK!!!");
                        window.location = "../view/createContract.php";
                    
            }
        });
    }
}

function addStage(){
    var form = document.getElementById("form_createSt");

    var type = 7;
    var number = form.elements.number.value;
    var sum = form.elements.sum.value;
    var data = form.elements.data.value;
    var id_d = form.elements.id_d.value;
    var finish = form.elements.finish.value;

    var isAdmin = confirm("Are you sure, what want add stages?");

    if(isAdmin){
        $.ajax({
            url: "../model/query.php",
            type: "POST",
            data: ({type:type, number:number, sum:sum, data:data, id:id_d, finish}),
            before: function(query){
                alert(query);
            },
            success: function(result){
                    if(result == "success"){
                        alert("Success");
                        window.location = "../view/createContract.php";
                    }
            }
        });
    }
}

function refill(){
    var form = document.getElementById("form-refill");

    var type = 8;
    var name = form.elements.name.value;
    var avans = form.elements.avans.value;
    var sum = form.elements.sum.value;
    var val = form.elements.val.value;
    var id = form.elements.id.value;

    var check = confirm("Are you sure?");

    if(val >= 0){
        if(check){
            $.ajax({
                url: "../model/query.php",
                type: "POST",
                data: ({type, id, val}),
                success: function(result){
                    if(result == "success"){
                        alert("Success");
                        window.location = "../view/createContract.php";
                    }
                }
            });
        }
    }else{
        alert("You entered incorrect data");
    }
    window.location = "../view/createContract.php";
}