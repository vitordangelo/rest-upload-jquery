var $fileupload = $('#fileupload');
var $upload_success = $('#upload-success');


$fileupload.fileupload({
    url: '/upload',
    dataType: 'json',
    formData: {_token: $fileupload.data('token'), userId: $fileupload.data('userId')},
    progressall: function (e, data){
       var progress = parseInt(data.loaded / data.total * 100, 10);
       $('#progress .progress-bar').css('width',progress + '%');
   },
}).on('fileuploadprogressall', function (e, data) {
    $upload_success.removeClass('hide').hide().slideDown('fast');
		setTimeout(function(){
		    location.reload();
		}, 2000);
});
