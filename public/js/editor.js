ClassicEditor
    .create( document.querySelector( '#editor' ), {
        language : 'tr',
        // plugin : [
        //     Autosave,
        // ],
        // autosave : {
        //     save(editor) {
        //         return saveData(editor.getData());
        //     }
        // }
    } )
    .catch( error => {
        console.error( error );
    } );
// function saveData( data ) {
//     return new Promise(resolve => {
//         setTimeout(() => {
//             console.log('Saved', data);
//
//             resolve();
//         }, HTTP_SERVER_LAG);
//     });
// }