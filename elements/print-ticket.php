<link rel="import" href="../bower_components/polymer/polymer.html">

<link rel="import" href="../bower_components/paper-dialog/paper-dialog.html">
<link rel="import" href="../bower_components/paper-input/paper-input.html">
<link rel="import" href="../bower_components/paper-button/paper-button.html">
<link rel="import" href="../bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="../bower_components/iron-form/iron-form.html">


<dom-module id="print-ticket">
    <link rel="import" type="css" href="css/print-ticket.css">
    <template>
        <paper-icon-button style="position:absolute;top:15px;right:15px;" on-tap="close" icon="clear"></paper-icon-button>
        <template is="dom-repeat" items="{{printElement}}">
            <div class="table-wrap">
                <table cellspacing="0" border="1">
                    <tr>
                        <td colspan="3" align="center">
                            Challan No:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="center">
                            <img class="bop-logo" src="../images/bop-logo.jpg" width="45px" height="auto">
                            <span class="bank-text"><span>{{item}}</span> Copy</span>
                            <img class="gmc-logo" src="../images/logo.png" width="35px" height="auto">
                        </td>
                    </tr>
                    <tr class="center">
                        <td colspan="3">Govt. Murray College Sialkot</td>

                    </tr>
                    <tr class="center">
                        <td colspan="3">Academic Fee</td>

                    </tr>
                    <tr class="center">
                        <td colspan="3">Intermediate (Session 2015)</td>

                    </tr>
                    <tr>
                        <td>STUDENT NAME:</td>
                        <td class="value" colspan="2">{{data.student_name}}</td>

                    </tr>
                    <tr>
                        <td>FATHER NAME</span></td>
                        <td class="value" colspan="2">{{data.father_name}}</td>

                    </tr>
                    <tr>
                        <td>ROLL NO</td>
                        <td class="value" colspan="2">{{data.roll_no}}</td>

                    </tr>
                    <tr>
                        <td>DEPARTMENT</td>
                        <td class="value" colspan="2">{{data.department}}</td>

                    </tr>
                    <tr>
                        <td>SESSION</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <th>Particulars of Deposit</th>
                        <th>Bank A/C</th>
                        <th>Amount Rs.</th>
                    </tr>
                    <tr height="200px" align="center">
                        <td>Intermediate fee</td>
                        <td>Intermediate fee collection A/C The Bank Of Punjab Circular Road Sialkot<br><b>A/C#</b></td>
                        <td>{{data.total_fee}}</td>
                    </tr>
                    <tr class="center">
                        <td colspan="2">Total</td>
                        <td>{{data.total_fee}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">Amount in words: </td>
                    </tr>
                </table>
                <div class="signature">
                    Authorised Signature<br>
                    College Bank.
                </div>
            </div>
        </template>
    </template>
    <script>
        Polymer({
            is: "print-ticket",
            properties: {
                data: function () {
                    return {};
                },
                printElement: Array
            },
            ready: function () {
                this.printElement = ["Bank","Office","Student"];
            },
            show: function () {
                this.$.print_dialog.show();
            },
            toggle: function () {
                this.$.styel.display = "block";
            },
            close: function () {
                var bodyWrap = _$("body_wrap");
                var floatBtn = _$("floating_ticket");

                floatBtn.style.display = "block";
                bodyWrap.style.display = "block";

                this.style.display = "none";
            },
            print: function (data) {
                this.data = data;
                var bodyWrap = _$("body_wrap");
                var floatBtn = _$("floating_ticket");

                floatBtn.style.display = "none";
                bodyWrap.style.display = "none";

                this.style.display = "block";


            }
        });
    </script>
</dom-module>