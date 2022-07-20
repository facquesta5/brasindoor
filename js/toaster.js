
/*
* Toaster()
* cor : Background vermelho, amarelo ou verde
* msg : Mensagem que aparecerá no toaster
*/

function toaster(cor, msg) {
    if (cor == 'vermelho') {
        var cor = 'bg-danger';
    }
    if (cor == 'amarelo') {
        var cor = 'bg-warning';
    }
    if (cor == 'verde') {
        var cor = 'bg-success';
    }
    
    var elements = '<div id="liveToast" class="toast position-fixed top-0 start-50 translate-middle-x ';
    elements += cor + '"><div class="toast-body"></div></div>';
    $("body").append(elements);
    var toastLiveExample = document.getElementById('liveToast');
    toast_body = document.getElementsByClassName("toast-body")[0];
    toast_body.textContent = msg;
    var toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}