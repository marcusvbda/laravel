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
            buttons: 
            {
                cancel: 
                {
                    text: "Cancelar",
                    value: false,
                    visible: true,
                    closeModal: true,
                },
                confirm: 
                {
                    text: "Confirmar",
                    value: true,
                    visible: true,
                    closeModal: true,
                }
            }
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
