<link rel="import" href="../bower_components/polymer/polymer.html">
<link rel="import" href="../bower_components/iron-flex-layout/iron-flex-layout.html">
<link rel="import" href="../bower_components/paper-material/paper-material.html">
<link rel="import" href="../bower_components/iron-icons/editor-icons.html">

<dom-module id="ticket-card">
    <link rel="import" type="css" href="css/ticket-card.css">
    <template>

            <paper-material elevation="2" class="main layout vertical">
                <div>
                    <paper-icon-button icon="print" on-tap="print" class="print"></paper-icon-button>
                </div>
                <div class="layout horizontal">
                    <section class="info flex">
                        <div class="roll-no main-value">
                            <iron-icon icon="label"></iron-icon>
                            <span style="color: #006064; padding-right: 5px">#</span><span>{{data.roll_no}}</span>
                        </div>
                        <div class="student-name capitalize main-value">
                            <iron-icon icon="face"></iron-icon>
                            <span>{{data.student_name}}</span>
                        </div>
                        <!--<div class="ticket-code">{{data.code}}</div>
                        <div style="color: #658585; font-size: small;"><iron-icon icon="event"></iron-icon>{{computeDate(data.date)}}</div>-->
                        <div class="department capitalize main-value">
                            <iron-icon icon="home"></iron-icon>
                            <span>{{data.department}}</span>
                        </div>
                    </section>
                    <section class="info info-right">
                        <div class="main-value">
                            <span class="father-name capitalize"><span class="label">Father: </span><span class="info-value">{{data.father_name}}</span></span>
                        </div>
                        <div class="main-value">
                            <span class="label">Semester: </span><span class="info-value">{{data.semester}}</span>
                        </div>
                        <div class="main-value">
                            <span class="label">Total Fee: </span>
                            <span class="info-value">{{data.total_fee}}</span>
                        </div>
                    </section>
                </div>
            </paper-material>

    </template>
    <script>
        Polymer({
            is: "ticket-card",
            properties: {
                data: {
                    value: function () {
                        return {};
                    },
                    observer: "dataChanged"
                },
                showdata: {
                    value: false
                },
                studentid:{
                    value:0
                }
            },
            dataChanged: function (newData, oldData) {
                //console.log("Ticket Card Data:=> ",newData);
            },
            computeDate: function (datetime) {
                var data = datetime.split(" ");
                if (data[0].length > 0) {
                    return data[0];
                } else {
                    return '<i style="background-color: red;">NULL</i>';
                }
            },
            print: function () {
                var printTicket = _$("printTicket");
                printTicket.print(this.data);

                /*var mywindow = window.open('', 'my div', 'height=400,width=600');
                mywindow.document.write('<html><head><title>my div</title>');
                /!*optional stylesheet*!/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
                mywindow.document.write('</head><body >');
                mywindow.document.write(data);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10

                mywindow.print();
                mywindow.close();*/

                return true;
            }
        });
    </script>
</dom-module>