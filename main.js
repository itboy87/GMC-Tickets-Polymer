var tp;

function _$($id){
    return document.getElementById($id);
}


// Load the Visualization API and the piechart package.
//google.load('visualization', '1.0', {'packages':['table']});


var ticketData = null;


refresh();

document.addEventListener("WebComponentsReady",function(){
	tp = _$("tpl");
    //Data maybe already fetch but not assigned because elements were not ready

    assignJsonData(ticketData,"ticketsdata");

    tp.add_ticket = function(){
        document.querySelector('#ticketdialog').toggleDialog();
    }

    window.setInterval(refresh,5000);
});

/*
function floatingClientDisplay(value){
    document.querySelector("#floating_ticket").style.display=value;
}
*/

function assignJsonData(data,property){
    //If template still not ready then return false
    if(!tp){
        return false;
    }
    if(!data || (typeof data.success == 'undefined' || !data.success) || (typeof data.data == 'undefined' || data.data.length<0)){
        tp[property] = [];
        if(data === false)
        {
            RecordError(property,"Error retrieving records from database!")
        }
        else
        {
            RecordError(property,"No Record Found!")
        }

    }else{

        tp[property] = data.data;
    }

}
function jsonParse($value)
{
    //if error retrieving then return false
    //if no record then empty array
    //if record found then return array of record
    var res = [];
    try{
        res = JSON.parse($value);
    }catch(a){
        res = false;
    }

    return res;
}
function getTickets(){
    var url = "../get.php";
    var req = new XMLHttpRequest();


    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            ticketData   = jsonParse(req.response);

            assignJsonData(ticketData,"ticketsdata");
        }
    }
    req.open("GET",url,true);
    req.send();
}
/*
window.onload = function () {
    correctProfilePages();
    showNotification();
}
*/

function showNotification(value)
{
    var resp = _$("response");

    if (resp) {
        if(typeof(value) !== 'undefined')
        {
            resp.response = value;
        }
        if(resp.response.length > 0)
            resp.showToast();
    };
}

function RecordError($error)
{
    var $element = '.tickets_record';

    $($element).each(function () {
        this.innerHTML = $error;
    });
}

function refresh()
{
    getTickets();
}