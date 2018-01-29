
var numOfClicks = 0; //load from db
var numOfClickesResetted = 0;
var maxId = 0;
var cellsOrder = "";
$(document).ready(function () {

    jQuery.ajax({
        url: 'buildTable.php',
        success: function (data) {
            $.each(JSON.parse(data), function () {
                cellsOrder = this.cells_order;
                console.log(cellsOrder);
                width = this.width;
                height = this.height;
            });
            cellsOrderArray = cellsOrder.split(' ');
            cellNum = 0;
            for (var row = 0; row < height; row++) {
                $('table').append('<tr></tr>');
                for (var col = 0; col < width; col++) {
                    $('table tr:last').append("<td onclick='changeState(this);' id=" +"cell" +
                        cellsOrderArray[cellNum] + " class='not-shaded' ></td>");
                    cellNum++;
                }
            }
            addCellData();
        }
    });

});

function addCellData() {
    jQuery.ajax ({
        url: "getAllData.php",
        success: function (data) {
            $.each(JSON.parse(data), function() {
                if (this.click_num > numOfClicks && numOfClickesResetted == 0)
                    numOfClicks = this.click_num;
                if (this.id > maxId)
                    maxId = this.id;
                if (this.shaded == 1) {
                    console.log(this.id);
                    document.getElementById("cell" + this.id).innerHTML = this.click_num;
                    $('#cell' + this.id).html = this.click_num;
                    $('#cell' + this.id).removeClass("not-shaded");
                    $('#cell' + this.id).addClass("shaded");
                }
            });
        }
    });
}

function addColmn() {
    $('tr').each(function(){
        maxId++;
        $(this).append("<td onclick='changeState(this);' id=" +"cell" + maxId  + " class='not-shaded'></td>");
        addCell(maxId);
    });
    updateTableDescription();
}

function deleteColmn() {
   // var ptr = $("table").find("tr");
    $('tr').each(function () {
       id = $(this).find('td:last').attr('id');
       $('#' + id).remove();
       deleteCell(id);
       if ($(this).children('td').length == 0)
           $(this).remove();
    });
    updateTableDescription();

}

function addRow() {
    var numOftd = $('tr:last').children('td').length;
    $('table').append('<tr></tr>');
    for (var i = 0; i < numOftd; i++) {
        maxId++;
        $('table tr:last').append("<td onclick='changeState(this);' id=" +"cell" + maxId  + " class='not-shaded'></td>");
        addCell(maxId);
    }
    updateTableDescription();

}

function deleteRow() {
    $('table tr:last').children('td').each(function () {
        id = $(this).attr('id');
        $('#' + id).remove();
        deleteCell(id);
    });
    $('table tr:last').remove();
    updateTableDescription();
}

function resetNumOfClicks () {
    numOfClicks = 0;
    numOfClickesResetted = 1;
}

function resetTable() {
    $('table').find("tr:gt(0)").remove();
    $("table").find("td:gt(0)").remove();
    $('td').removeClass("shaded").addClass("not-shaded").html("");
    numOfClicks = 0;
    jQuery.ajax({
        url: "resetTable.php",
    });
}

function updateTableDescription() {
    cellsOrder = "";
    $('td').each(function () {
        var id = $(this).attr('id');
        //console.log(id);
        cellsOrder += (id.substring(4, id.length) + ' ' );
        console.log("cells order " + cellsOrder);
    });
    var width = $('tr:first').children('td').length;
    var height = $('table tr').length;
    jQuery.ajax({
        type:"POST",
        url:"updateTableDescription.php",
        data : {
            cellsOrder: cellsOrder,
            width:width,
            height: height
        },
        success:function(res) {
            //alert(res);
        }
    });

}

function changeState(obj) {
    numOfClicks++;
    obj.innerHTML = numOfClicks;

    if (obj.classList.contains("not-shaded")) {
        obj.classList.remove("not-shaded");
        obj.classList.add("shaded");
    }
    else {
        obj.classList.remove("shaded");
        obj.classList.add("not-shaded");
        obj.innerHTML = "";
    }
    updateCell(obj);
}

function addCell(obj) {
    var id = obj; //obj.toString().substring(4, obj.toString().length);
    //alert(obj);
    var shaded = 0;

    jQuery.ajax({
        type: "GET",
        url: "addCell.php",
        data: {
            id: id,
            clickNum: 0,
            shaded: shaded
        },
        cache: false,
        success:function(result)
        {
            console.log(result);
        },
        error:function(exception){console.log('Exception:'+exception);}
    });
}

function deleteCell(obj) {
    var id = obj.toString().substring(4, obj.toString().length);

    jQuery.ajax({
        type: "GET",
        url: "deleteCell.php",
        data:  {
            id: id
        },
        cache: false,
        success:function(result)
        {
            console.log(result);
        },
        error:function(exception){
            console.log('Exception:'+exception);
        }
    });
}

function updateCell(obj) // with jquery
{
    var id = obj.id.toString().substring(4, obj.id.toString().length);
    var shaded;
    if (obj.classList.contains("shaded"))
        shaded = 1;
    else
        shaded = 0;
    jQuery.ajax({
        type: "GET",
        url: "updateCell.php",
        data: {
            id: id,
            clickNum: numOfClicks,
            shaded: shaded
        },
        cache: false,
        success:function(result)
        {
            console.log(result);
        },
        error:function(exception){alert('Exception:'+exception);}
    });
}


function UpdateDb(obj) // without jquery
{
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            //document.getElementById("result").innerHTML=xmlhttp.responseText;
           // alert("done");
        }
    }
    xmlhttp.open("GET","updateCell.php",true);
    xmlhttp.send();
}

