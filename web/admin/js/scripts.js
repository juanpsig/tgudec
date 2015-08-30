function es_numero(txt){
    var patron=/^(?:\+|-)?\d+$/; 
    if(txt.match(patron)){
        return true;
    }else{
        return false;
    }
}

function es_mail(txt){
    patron=/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/; 
    if(txt.match(patron)){
        return true;
    }else{
        return false;
    }
}

function retornarSoloNumeros(string){
    return string.replace(/[^\d]/g, '');
}