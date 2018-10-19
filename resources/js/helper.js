var helper = 
{
    confirm : (title,text,type,action) =>
    {
        swal({
            title: title,
            text: text,
            type: type,
            showCancelButton: true,
            focusConfirm: true,
            cancelButtonText : "Não",
            confirmButtonText : "Sim",
        })
        .then((result) => 
        {
            if(result.value)
            {
                return action();
            }
        });
    }
};


window.helper = helper;
