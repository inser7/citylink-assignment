<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container" :style="style">
                <div class="modal-header" v-if="!disableHeader">
                    <div class="pull-left">
                        <slot name="header">
                            default header
                        </slot>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-primary" v-on:click="$emit('close')">
                            <span class="fas fa-window-close"></span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        default body
                    </slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer">
                        <button class="btn btn-primary" v-on:click="$emit('close')">
                            Close
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "modal",

        props: {
            disableHeader: {
                type: Boolean,
                required: false,
                default: false
            },
            width:{
                type: Number,
                required: false,
                default: 90,
            }
        },

        computed: {
            style () {
                return 'width: ' + this.width +'%';
            }
        },
    }
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9996;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 90%;
  max-height: 90%;
  max-height: 90vh;
  overflow-x: scroll;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header {
  border-bottom: 0;
}

.modal-header h3 {
  margin-top: 0;
  color: #0f67c5;
}

.modal-default-button {
  float: right;
}

/*
 * the following styles are auto-applied to elements with
 * v-transition="modal" when their visiblity is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter, .modal-leave {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>