

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
          text-decoration: none;
      }
      .created{
          padding-left: 20px;
          color: #0077aa;
      }
      .copy{
          color: #1650aa;
          padding: 3px;
      }
  </style>
	<template>
        <div class="layout horizontal">
            <span class="flex"></span>
            <span class="copyright">GMC<span class="copy">&copy;</span>COPYRIGHT 2015</span>
            <span class="created">Created By </span><a class="flex" href="http://suhtech.tk">Sabeeh & Arslan</a>.
        </div>
	</template>
	<script>
		Polymer({
			is:"page-footer"
		});
	</script>
</dom-module>