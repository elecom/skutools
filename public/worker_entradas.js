/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function obtenerEntradasRecientes(){
    var xmlhttp;
    
    if(XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
          postMessage('entradas nuevas');
      }  
    };
    
    xmlhttp.open('GET', 'obtenerEntradasRecientes', true);
    xmlhttp.send('');
}

this.addEventListener('message', obtenerEntradasRecientes, false);




