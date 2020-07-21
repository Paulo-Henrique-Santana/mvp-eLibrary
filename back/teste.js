function removeMensagem(){
    setTimeout(function(){ 
        var msgSucesso = document.getElementsByClassName('msgSucesso');
        var msgErro = document.getElementsByClassName('msgErro');
        while(msgSucesso.length > 0){
            msgSucesso[0].parentNode.removeChild(msgSucesso[0]);
        }  
        while(msgErro.length > 0){
            msgErro[0].parentNode.removeChild(msgErro[0]);
        }  
    }, 10000);
}
document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
      // toda vez que a página carregar, vai limpar a mensagem (se houver) 
      // após 5 segundos
        removeMensagem(); 
    }
};