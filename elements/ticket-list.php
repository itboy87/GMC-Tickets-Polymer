<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 6:50 AM
 */

?>

<link rel="import" href="../bower_components/iron-list/iron-list.html">
<link rel="import" href="../bower_components/paper-material/paper-material.html">
<link rel="import" href="ticket-card.php">
<dom-module id="ticket-list">
    <style>
        :host{
            display: block;
        @apply(--layout-fit);
        @apply(--layout-vertical);
        }
        paper-material{
            padding: 15px;
        }
        #clients_list{
        @apply(--layout-flex);

        }
        ticket-card{
            max-width: 525px;
            min-width: 310px;
            display: inline-block;
            float: left;
        }

    </style>
    <template>

<!--        <template is="dom-repeat" items="{{data}}" index="{{index}}">
            <paper-material elevation="2" class="card">

            </paper-material>
        </template>

-->
        <template is="dom-if" if="{{listFilteredData.length}}">
            <iron-list id="clients_list" items="{{listFilteredData}}" indexAs="{{index}}">
                <template>
                    <ticket-card data="{{item}}" studentid ="{{item.student_id}}"></ticket-card>
                </template>
            </iron-list>
            </template>


        <template is="dom-if" if="{{!listFilteredData.length}}">
            <paper-material elevation="2">
                <div class="norecord tickets_record">No Record Found!</div>
            </paper-material>
        </template>
    </template>

</dom-module>

<script>
    Polymer({
        is:"ticket-list",
        properties:{
            data:{
                type:Array,
                observer:"dataChanged"
            },
            studentName:{
                type:String,
                notify:true
            },
            fatherName:{
                type:String,
                notify:true
            },
            semester:{
                type:Number,
                notify:true
            },
            rollNo:{
                type:Number,
                notify:true
            },
            department:{
                type:String,
                notify:true
            },
            listFilteredData:{
                value:function(){return [];},
                computed:'listFilter(data,studentName,fatherName,department,rollNo,semester)'
            }
        },
        dataChanged: function (newData,oldData) {
            //console.log("new data: ",newData);
        },
        listFilter:function(items,studentName,fatherName,department,rollNo,semester){
            var checkRollNo = true;
            if(items.length <1)
                return [];

            if (studentName.length < 1 && rollNo < 1 && department.length < 1
                && fatherName.length < 1 && semester < 1) {return items;}

            rollNo = parseInt(rollNo);
            if(isNaN(rollNo)){
                checkRollNo = false;
            }
            var checkSemester = true;
            semester = parseInt(semester);
            if(isNaN(semester)){
                checkSemester = false;
            }

            var filtered = [];
            var studentNameMatch = new RegExp(studentName, 'i');
            var fatherNameMatch = new RegExp(fatherName, 'i');
            var departmentMatch = new RegExp(department, 'i');
            //var semesterMatch = new RegExp(semester);

            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                if (departmentMatch.test(item["department"]) && studentNameMatch.test(item.student_name)
                    && fatherNameMatch.test(item.father_name)) {
                    if(checkSemester && semester != item["semester"])
                        continue;
                    if (!checkRollNo) {
                        filtered.push(item);
                    }else{
                        if (rollNo==item.roll_no) {
                            filtered.push(item);
                            break;
                        }
                    }
                }
            }
            return filtered;
        }
    });
</script>