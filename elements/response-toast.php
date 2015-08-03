
<link rel="import" href="/bower_components/polymer/polymer.html">
<link rel="import" href="/bower_components/paper-toast/paper-toast.html">
<dom-module id="response-toast">
    <template>
        <paper-toast id="res_toast" text$="{{response}}"></paper-toast>
    </template>
    <script>
        Polymer({
            is:"response-toast",
            properties:{
                response:{
                    type:String,
                    value:""
                }
            },
            getInnerToast: function(){
                return this.$.res_toast;
            },

            showToast: function(){
                this.$.res_toast.show();
            }
        });
    </script>
</dom-module>