/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function obtenerExistencia(){
    var xmlhttp;
    
    if(XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
          postMessage('existencias actualizadas');
      }  
    };
    
    xmlhttp.open('GET', 'obtenerExistencia', true);
    xmlhttp.send('');
}

this.addEventListener('message', obtenerExistencia, false);


