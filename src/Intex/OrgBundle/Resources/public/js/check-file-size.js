/*Check file size*/
$('#up_submit').click( function() {
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#form_file')[0].files[0].size;
        if(fsize > 2048576) //do something if file size more than 1 mb (1048576)
        {
           alert((fsize/2097152).toFixed(1) +" Mb\nToo big file!\nFile must be less than 2 Mb");
           return false;
        } else if (fsize == 0){
            alert("Blank file!");
            return false;
        }
        var file_name = $('#form_file')[0].files[0].name;
        var file_type = file_name.split('.').pop().toLowerCase();
        if(file_type != "xml"){
            alert("Only XML files are allowed to upload");
            return false;
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
    return true;
});