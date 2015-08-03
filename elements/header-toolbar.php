

<link rel="import" href="/bower_components/polymer/polymer.html">

<link rel="import" href="/bower_components/iron-icons/iron-icons.html">

<link rel="import" href="/bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="/bower_components/iron-flex-layout/iron-flex-layout.html">
<dom-module id="header-toolbar">
  <style>
    :host{
      display: block;
      width: 100%;
    }
    #header-text {
        color: white;
        font-weight: bold;
        font-size: 20px;
    }
    paper-icon-button{
          font-weight: bold;
          color: white;
      }
  </style>
	<template>
		<div class="flex">
            <content></content>
            <paper-icon-button icon="refresh"></paper-icon-button>
    </div>

    <div id="header-text" class="vertical layout flex center-justified" style="text-align:center;">
      Govt. Murray College Sialkot
    </div>
           
    <div class="horizontal layout flex end-justified">
       <paper-icon-button icon="power-settings-new" on-tap="logout"></paper-icon-button>
    </div>
	</template>
	<script>
		Polymer({
			is:"header-toolbar",
            logout:function(){
                window.location = "logout.php";
            }
		});
	</script>
</dom-module>