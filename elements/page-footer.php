

<link rel="import" href="/bower_components/polymer/polymer.html">

<link rel="import" href="/bower_components/iron-icons/iron-icons.html">

<link rel="import" href="/bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="/bower_components/iron-flex-layout/iron-flex-layout.html">
<dom-module id="page-footer">
  <style>
    :host {
        display: block;
        padding: 10px;
    }
      .copyright{
          color: #00695c;
          font-weight: bold;
      }
      a{
          color: #0077aa;
          font-weight: bold;
      }
      .created{
          color: #0077aa;
      }
  </style>
	<template>
        <div>
            <span class="copyright">GMC<span class="created">@</span>COPYRIGHT 2015</span> <span class="created">Created By </span><a href="http://suhtech.tk">SUHTECH</a>.
        </div>
	</template>
	<script>
		Polymer({
			is:"page-footer"
		});
	</script>
</dom-module>