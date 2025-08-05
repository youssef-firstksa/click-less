<script src="https://cdn.tiny.cloud/1/ftp809snxufbk3curtshxldwxlc4dlep6qmyyetf18n66cq9/tinymce/8/tinymce.min.js"
    referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance',
        content_css: "{{ asset('assets/dashboard/css/rich-editor.css') }}",
        plugins: 'code table lists image',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link | insertfile | image',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'file image',

        file_picker_callback: function (cb, value, meta) {
            if (meta.filetype === 'image') {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function () {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function () {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), { title: file.name });
                    };

                    reader.readAsDataURL(file);
                };

                input.click();
            }
        },
        setup: function (editor) {
            editor.ui.registry.addButton('insertfile', {
                // text: '',
                icon: 'upload',
                onAction: function () {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', '.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip'); // ← غير الصور

                    input.onchange = function () {
                        const file = input.files[0];
                        const reader = new FileReader();

                        reader.onload = function () {
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = editor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            // إدراج كرابط قابل للتحميل
                            editor.insertContent(
                                `<a href="${blobInfo.blobUri()}" target="_blank" download="${file.name}">${file.name}</a>`
                            );
                        };

                        reader.readAsDataURL(file);
                    };

                    input.click();
                }
            });
        },

    });
</script>