/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function cargarCatalogoProductos(){
    var xmlhttp;
    
    if(XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
          postMessage('cargado');
      }  
    };
    
    xmlhttp.open('GET', 'cargaDiaria', true);
    xmlhttp.send('');
}

addEventListener('message', cargarCatalogoProductos, false);

