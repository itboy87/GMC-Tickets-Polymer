<link rel="import" href="../bower_components/polymer/polymer.html">
<link rel="import" href="../bower_components/iron-flex-layout/iron-flex-layout.html">
<link rel="import" href="../bower_components/paper-material/paper-material.html">
<link rel="import" href="../bower_components/iron-icons/editor-icons.html">

<dom-module id="ticket-card">
    <link rel="import" type="css" href="css/ticket-card.css">
    <template>
        <div class="ticket-wrap">
            <paper-material elevation="2" class="main layout horizontal">
                <section class="info flex">
                    <div class="roll-no">
                        <iron-icon icon="label"></iron-icon>
                        <span style="color: #006064; padding-right: 5px">#</span><span>{{data.roll_no}}</span>
                    </div>
                    <div class="student-name capitalize">
                        <iron-icon icon="face"></iron-icon>
                        <span>{{data.student_name}}</span>
                    </div>
                    <!--<div class="ticket-code">{{data.code}}</div>
                    <div style="color: #658585; font-size: small;"><iron-icon icon="event"></iron-icon>{{computeDate(data.date)}}</div>-->
                    <div class="department capitalize">
                        <iron-icon icon="room"></iron-icon>
                        <span>{{data.department}}</span>
                    </div>
                </section>
                <section class="info">
                    <div>
                        <span class="father-name capitalize"><span class="label">Father: </span><span class="info-value">{{data.father_name}}</span></span>
                    </div>
                    <div>
                        <span class="label">Semester: </span><span class="info-value">{{data.semester}}</span>
                    </div>
                    <div>
                        <span class="label">Total Fee: </span>
                        <span class="info-value">{{data.total_fee}}</span>
                    </div>
                </section>
            </paper-material>
        </div>

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
            }
        });
    </script>
</dom-module>