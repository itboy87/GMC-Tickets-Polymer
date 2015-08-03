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

<dom-module id="ticket-list">
    <style>
        :host{
            display: block;
        @apply(--layout-fit);
        @apply(--layout-vertical);
        }
        .card{
            min-width: 250px;
            border:1px solid #d8d8d8;
            margin: 7px;
            margin-bottom: 10px;
            display: block;
            background-color:#FFFFFF;
        }
        paper-material{
            padding: 15px;
        }
        #clients_list{
        @apply(--layout-flex);

        }

    </style>
    <template>

<!--        <template is="dom-repeat" items="{{data}}" index="{{index}}">
            <paper-material elevation="2" class="card">

            </paper-material>
        </template>
-->        <iron-list id="clients_list" items="{{data}}" indexAs="{{index}}">
            <template>
                <paper-material elevation="2" class="card">
                    <section class="student-roll-no">
                        {{item.roll_no}}
                    </section>
                </paper-material>
            </template>
        </iron-list>
        <!--
        <template is="dom-if" if="{{data.length}}">
            <iron-list items="{{data}}">
                <template>
                    <paper-material elevation="2">
                        <div>
                            {{item.student_name}}
                        </div>
                    </paper-material>
                </template>
            </iron-list>
        </template>-->

        <!--<template is="dom-if" if="{{!data.length}}">
            <div class="norecord tickets_record">No Record Found!</div>
        </template>-->
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
            }
        },
        dataChanged: function (newData,oldData) {
            console.log("new data: ",newData);
        },
        listFilter:function(items,studentName,fatherName,department,rollNo,semester){
            /*
            var checkId = true;
            if(items.length <1)
                return [];

            if (name.length < 1 && id < 1 && location.length < 1 ) {return items;}

            id = parseInt(id);
            if(isNaN(id)){
                checkId = false;
            }

            var filtered = [];
            var nameMatch = new RegExp(name, 'i');
            var locationMatch = new RegExp(location, 'i');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                if (locationMatch.test(item.address1+', '+item.city) && nameMatch.test(item.full_name)) {
                    if (!checkId) {
                        filtered.push(item);
                    }else{
                        if (id==item.department_id) {
                            filtered.push(item);
                            break;
                        };
                    };

                }
            }
            console.log("Filtered Value: ",filtered);
            return filtered;
            */
        }
    });
</script>