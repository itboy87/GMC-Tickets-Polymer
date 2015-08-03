<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/30/2015
 * Time: 10:45 PM
 */
?>


<template is="dom-bind" id="tpl">
    <span id="body_wrap">
    <paper-drawer-panel id="paperDrawerPanel">
        <paper-header-panel drawer>
            <drawer-data
                student-name="{{studentname}}"
                father-name="{{fathername}}"
                semester="{{semester}}"
                roll-no="{{rollno}}"
                department="{{department}}">

            </drawer-data>
        </paper-header-panel>
        <paper-header-panel main>
            <paper-toolbar>
                <header-toolbar class="layout horizontal">
                    <paper-icon-button icon="menu" paper-drawer-toggle></paper-icon-button>
                </header-toolbar>
            </paper-toolbar>
            <div class="content-wrapper layout vertical">
                <section class="main-content flex">
                    <ticket-list
                        data="{{ticketsdata}}"
                        student-name="{{studentname}}"
                        father-name="{{fathername}}"
                        semester="{{semester}}"
                        roll-no="{{rollno}}"
                        department="{{department}}">

                    </ticket-list>

                </section>
                <div>
                    <page-footer></page-footer>
                </div>
            </div>
            </iron-pages>
        </paper-header-panel>
    </paper-drawer-panel>
    </span>
    <!-- Dialogs -->
    <add-ticket id="ticketdialog"></add-ticket>

    <!-- Dialogs End -->

    <paper-fab icon="receipt" id="floating_ticket" onclick="{{add_ticket}}" title="Add Client" class="floating_button float_1" tabindex="0"></paper-fab>

</template>

<print-ticket id="printTicket"></print-ticket>

