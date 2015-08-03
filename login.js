/**
 * Created by itboy on 8/3/2015.
 */

window.onload = function () {
    showNotification();
}


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