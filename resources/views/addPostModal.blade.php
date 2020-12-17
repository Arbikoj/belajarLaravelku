<!DOCTYPE html>
<html>
    <head>
        <title>Modal Component</title>
        <script src="https://unpkg.com/vue"></script>
        <link rel="stylesheet" type="text/css" href="/style.css"/>
        <!-- template for the modal component -->
        <link
            href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
        <link
            href="https://unpkg.com/tailwindcss@next/dist/tailwind.min.css"
            rel="stylesheet">
        <!--Replace with your tailwind.css once created-->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
            integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/x-template" id="modal-template">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-container w-11/12">

                            <div class="modal-header">
                                <slot name="header">
                                    <button class="modal-default-button " @click="$emit('close')">
                                        <i
                                            class="fa fa-times-circle transform hover:scale-110 motion-reduce:transform-none"
                                            aria-hidden="true"></i>
                                    </button>
                                </slot>
                            </div>

                            <div class="modal-body">
                                <slot name="body">

                                    <h2
                                        slot="header"
                                        class="mt-0 text-4xl text-center font-hairline md:leading-loose text-grey md:mt-8 mb-2">Add a Post</h2>
                                    <label class="block mt-2 shadow-2xl">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-input mt-1 block w-full "
                                                placeholder="Judul Artikel">
                                        </div>

                                        {{-- CKEditor --}}

                                        <div class="card-body">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                </slot>

                                    <div class="modal-footer">
                                        <slot name="footer">
                                            default footer
                                            <button class="modal-default-button" @click="$emit('close')">
                                                OK
                                            </button>
                                        </slot>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </script>

                <style>
                    .modal-mask {
                        position: fixed;
                        z-index: 9998;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                        display: table;
                        transition: opacity 0.3s ease;
                    }

                    .modal-wrapper {
                        display: table-cell;
                        vertical-align: middle;
                    }

                    .modal-container {
                        width: 90%;
                        height: 80%;
                        margin: 0 auto;
                        padding: 10px 20px;
                        background-color: #fff;
                        border-radius: 2px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
                        transition: all 0.3s ease;
                        font-family: Helvetica, Arial, sans-serif;
                    }

                    .modal-header h3 {
                        margin-top: 0;
                        color: #42b983;
                    }

                    .modal-body {
                        margin: 10px 0;
                    }

                    .modal-default-button {
                        float: right;
                    }

                    /*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

                    .modal-enter {
                        opacity: 0;
                    }

                    .modal-leave-active {
                        opacity: 0;
                    }

                    .modal-enter .modal-container,
                    .modal-leave-active .modal-container {
                        -webkit-transform: scale(1.1);
                        transform: scale(1.1);
                    }
                </style>
            </head>
            <body>
                <!-- app -->
                <div class="mt-10" id="app">
                    <button
                        id="show-modal"
                        @click="showModal = true"
                        class="ml-8 mb-0 mt-3 transform hover:scale-110 motion-reduce:transform-none modal-open bg-green-500 text-gray-700 hover:bg-green-600 hover:text-white mb-5 px-4 py-2 rounded-full font-bold hover:border-indigo-500">
                        <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>
                        Add Post
                    </button>

                    <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>

                    <script>
                        Vue.use(CKEditor);

                        new Vue({el: '#app'});
                    </script>

                    <script>
                        Vue.use(CKEditor);

                        new Vue({el: '#app'});
                    </script>
                    {{-- <button id="show-modal" @click="showModal = true">Show Modal</button> --}}
                    <!-- use the modal component, pass in the prop -->
                    <modal v-if="showModal" @close="showModal = false">
                        <!-- you can use custom content here to overwrite default content -->

                    </modal>
                </div>
                <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('summary-ckeditor');
                </script>
                <script>
                    // register modal component
                    Vue.component("modal", {template: "#modal-template"});

                    // start app
                    new Vue({
                        el: "#app",
                        data: {
                            showModal: false
                        }
                    });
                </script>
                {{-- ckeditor script --}}
                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                <script type="text/javascript">
                    CKEDITOR.replace('wysiwyg-editor', {
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                </script>

                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.ckeditor').ckeditor();
                    });
                </script>

                {{-- vuejs ckeditor --}}

                <script
                    src="../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
                <script src="../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js"></script>

                <template>
                    <div id="app">
                        <ckeditor :editor="editor" ...="..."></ckeditor>
                    </div>
                </template>
                <script>
                    Vue.use(CKEditor);
                </script>
                <script>
                    export default {
                        name: 'app',
                        components: {
                            // Use the <ckeditor> component in this view.
                            ckeditor: CKEditor.component
                        },
                        data() {
                            return {
                                editor: ClassicEditor,

                                // ...
                            };
                        }
                    }
                </script>
                <script>
                    import CKEditor from 'ckeditor4-vue';
                    Vue.use(CKEditor);
                </script>
                <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            </body>
        </html>
