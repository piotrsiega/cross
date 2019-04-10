            tinymce.init({
                selector: 'textarea',
                language: 'pl',
                theme: 'modern',
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
                
                file_browser_callback: function(field_name, url, type, win) {
                win.document.getElementById(field_name).value = 'my browser value';
                images_upload_base_path: 'img/'

                 }

            }); 