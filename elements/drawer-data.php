<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/31/2015
 * Time: 6:45 AM
 */
?>

<link rel="import" href="../bower_components/polymer/polymer.html">
<dom-module id="drawer-data">
    <style>
        :host{
            display: block;
            padding: 10px;
            position: absolute;
            top:0;left:0;right:0;bottom:0;
        }
        .head-image{
            padding: 15px;
            text-align: center;
            background-color:aqua;
            margin: -10px;
            border-bottom: 1px solid #004d40;
        }
        hr{
            margin: 0;
        }
    </style>
    <template>
        <section class="head-image">
            <img src="../images/logo.png">
        </section>
        <section>
            <paper-input id="nameInput" value="{{studentName}}" label="Student Name" error-message="letters only!" pattern="[a-zA-Z ]*" auto-validate floatinglabel></paper-input>
            <paper-input id="father_nameInput" value="{{fatherName}}" label="Father Name" error-message="letters only!" pattern="[a-zA-Z ]*" auto-validate floatinglabel></paper-input>
            <paper-input value="{{semester}}" type="number" min="1" label="Semester" error-message="numbers only!" auto-validate floatinglabel></paper-input>
            <paper-input value="{{rollNo}}" type="number" min="1" label="Roll No" error-message="numbers only!" auto-validate floatinglabel></paper-input>
            <paper-input value="{{department}}" label="Department" floatinglabel></paper-input>
        </section>
    </template>
</dom-module>
<script>
    Polymer({
        is:"drawer-data",
        properties:{
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
        }
    });
</script>
