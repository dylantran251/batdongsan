import "jquery-toast-plugin"
import "jquery-toast-plugin/dist/jquery.toast.min.css"
window.fireToast = async function (type, heading, message){
    switch (type)
    {
        case 'error':
            await $.toast({
                heading: heading,
                text: message,
                icon: type,
                loader: true,
                loaderBg: '#bb2124',
                textColor: 'white',
                showHideTransition: 'plain',
                position: 'top-right',
            })
            break;
        case 'success':
            await $.toast({
                heading: heading,
                text: message,
                icon: type,
                loader: true,
                loaderBg: '#198754',
                textColor: 'white',
                showHideTransition: 'plain',
                position: 'top-right',
            })
            break;

        case 'info':
            await $.toast({
                heading: heading,
                text: message,
                icon: type,
                loader: true,
                loaderBg: '#5bc0de',
                textColor: 'white',
                showHideTransition: 'plain',
                position: 'top-right',
            })
            break;
    }
}
