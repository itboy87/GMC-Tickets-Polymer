
<link rel="import" href="../bower_components/polymer/polymer.html">

<link rel="import" href="../bower_components/paper-dialog/paper-dialog.html">
<link rel="import" href="../bower_components/paper-input/paper-input.html">
<link rel="import" href="../bower_components/paper-button/paper-button.html">
<link rel="import" href="../bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="../bower_components/iron-form/iron-form.html">

<dom-module id="add-ticket">
    <link rel="import" type="css" href="css/add-ticket.css">
	<template>
	<paper-dialog id="ticket_dialog" modal>
        <section class="top-bar">
            <div style="float: left;">
                <paper-icon-button icon="clear" on-tap="closeDialog" style="z-index:3000;padding: 15px;"></paper-icon-button>
            </div>
            <div>
                <h2 style="padding: 15px;">Ticket Add Form</h2>
            </div>
        </section>
		<form id="ticket_form" is="iron-form" method="get" action="../insert.php" enctype="multipart/form-data">
            <table cellpadding="0" width="600px">
                <tr>
                    <td>
                        <paper-input class="capitalize" label="Student Name" name="student_name" pattern="[a-zA-Z ]*" error-message="letters only!" required floatinglabel ></paper-input>
                    </td>
                    <td>
                        <paper-input class="capitalize" label="Father Name" name="father_name" pattern="[a-zA-Z ]*" error-message="letters only!" floatinglabel ></paper-input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <paper-input type="number" label="Roll No" name="roll_no" min="1" error-message="numbers only!" floatinglabel required></paper-input>
                    </td>
                    <td>
                        <paper-input type="number" label="Semester No" name="semester" min="1" error-message="numbers only!" floatinglabel></paper-input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <paper-input class="capitalize" label="Department" name="department" required floatinglabel></paper-input>
                    </td>
                    <td>
                        <paper-input style="position: relative;bottom: -6px;" type="number" label="Total Fee" name="total_fee" min="0" error-message="numbers only!" floatinglabel required></paper-input>
                    </td>
                </tr>
<!--                <tr>
                    <td>
                        <paper-input type="date" name="session_from" id="session_from" placeholder="Session From"></paper-input>
                    </td>
                    <td>
                        <paper-input type="date" name="session_to" id="session_to" placeholder="Session To"></paper-input>
                    </td>
                </tr>-->
            </table>
            <datalist>

            </datalist>
		</form>
        <div id="form_footer" class="layout horizontal">
            <paper-button raised on-tap="ResetForm" id="resetbtn">Reset</paper-button>
            <span class="flex"></span>
            <paper-button raised on-tap="SubmitForm" id="ticket_addbtn">Add</paper-button>
        </div>
	</paper-dialog>
	</template>
	<script>
        var addButton = null;
    function setFieldError(field,error){
        field.setCustomValidity(error);
        field.reportValidity();
    }
		Polymer({
			is:"add-ticket",
            ready:function(){
                addButton = this.$.ticket_addbtn;
                //Reset Form Will Set Date To Current Date
                this.ResetForm();
                this.$.ticket_form.addEventListener('iron-form-response',this.formResponse);
                this.$.ticket_form.addEventListener('iron-form-error',this.formError);

            },
            formResponse: function (e){
                //$data = $("#ticket_form").serialize();
                //console.log("Data: ",$data);

                //console.log(this,e);
                if(e.detail && e.detail.success == true){
                    refresh();
                    alert("Ticket Submited Successfully!");
                    this.reset();
                }else{
                    alert("Ticket Submit Error: "+ e.detail.error);
                }
                addButton.disabled = false;
            },
            formError: function (e) {
                alert("Error Submitting Form: "+e.detail.error);
                addButton.disabled = false;
            },
			ResetForm:function(){
				this.$.ticket_form.reset();
				//setDefaultDateTime(this.$.datetime);
			},
			SubmitForm:function(e){
                addButton.disabled = true;
                var form = ticket_form;
                if(!form.checkValidity()) {
                    addButton.disabled = false;
                    form.reportValidity();
                }
                else{
                    form.submit();
                }
			},
			CalculateFine:function(e){
                var isValid = true;
				var form = ticket_form;
                var codes = form.code.value.split(",");
                var vehicleType = parseInt(form.vehicle_type.value);
                var fine=0;

                for(var i=0;i<codes.length;i++)
                {
                    var code = parseInt(codes[i]);
                    if(isNaN(code) || !(code >=1 && code <= 24)){
                        isValid = false;
                        break;
                    }
                    //var val = getFine(code,vehicleType);
                    fine += getFine(code,vehicleType);
                }
                if(isValid){
                    setFieldError(form.code,"");
                    form.fine.value=fine;
                }else{
                    form.fine.value = 0;
                    //console.log(e.currentTarget.value);
                    setFieldError(form.code,"Values must 1-24 and seperate multiple values with ','");
                }
			},
            ValidateTicket:function(){
                var length = 0;
                var data = [];
                if(ticketData && ticketData.data){
                    data = ticketData.data;
                    length = data.length;
                }
                var ticket_no = this.$.ticket_form.ticket_no;
                ticket_no_value = ticket_no.value;
                if(ticket_no_value < 1){
                    setFieldError(ticket_no,"Enter Ticket Number.");
                    return false;
                }
                var isExists = false;
                for(var i=0;i<length;i++){
                    if(ticket_no_value == data[i].ticket_no){
                        setFieldError(this.$.ticket_form.ticket_no,"Ticket Already Exists!");
                        isExists = true;
						break;
                    }
                }
                if(!isExists)
                {
                    setFieldError(ticket_no,"");
                }
            },
            toggleDialog:function(){
                this.$.ticket_dialog.toggle();
            },
            closeDialog:function(){
                this.$.ticket_dialog.close();
            }
		});
	</script>
</dom-module>