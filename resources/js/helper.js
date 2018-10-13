var helper = 
{
    confirm : (title,text,type,action,buttons = ['Cancelar','Confirmar']) =>
    {
        swal({
            title: title,
            text: text,
            type: type,
            buttons: true,
            showCancelButton: true,
            focusConfirm: true,
            buttons: 
            {
                cancel: 
                {
                    text: buttons[0],
                    value: false,
                    visible: true,
                    closeModal: true,
                },
                confirm: 
                {
                    text: buttons[1],
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
