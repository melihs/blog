ClassicEditor
    .create( document.querySelector( '#editor' ), {
        language : 'tr',
        removePlugins: ['imageUploadUrl'],
    } )
    .catch( error => {
        console.error( error );
    } );
