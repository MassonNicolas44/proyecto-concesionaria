let myDropzone = new Dropzone('.dropzone', {
    url:'/',
    maxFilesize:2,
    maxFiles:3,
    acceptedFiles:'image/jpeg, image/png',
    addRemoveLinks:true,
    dictRemoveFile:'Quitar'
  })