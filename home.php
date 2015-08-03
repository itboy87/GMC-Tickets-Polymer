<?php
/**
 * Created by PhpStorm.
 * User: itboy
 * Date: 7/30/2015
 * Time: 10:45 PM
 */
?>
<template is="dom-bind" id="tpl">
    <paper-drawer-panel id="paperDrawerPanel">
        <paper-header-panel drawer>
            <drawer-data
                student-name="{{}}"
                father-name="{{}}"
                semester="{{}}"
                roll-no="{{}}"
                department="{{}}">

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
                        student-name="{{}}"
                        father-name="{{}}"
                        semester="{{}}"
                        roll-no="{{}}"
                        department="{{}}"></ticket-list>

                </section>
                <page-footer></page-footer>
            </div>
            </iron-pages>
        </paper-header-panel>
    </paper-drawer-panel>

    <!-- Dialogs -->
    <add-ticket id="ticketdialog"></add-ticket>
    <!-- Dialogs End -->

    <paper-fab icon="receipt" id="floating_ticket" onclick="{{add_ticket}}" title="Add Client" class="floating_button float_1" tabindex="0"></paper-fab>

</template>