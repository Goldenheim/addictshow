tinymce.init({
   selector: 'textarea',
   language: 'fr_FR',
   plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste tinycomments tinydrive tinymcespellchecker',
   toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
   toolbar_drawer: 'floating',
   tinycomments_mode: 'embedded',
   tinycomments_author: 'Author name'
});