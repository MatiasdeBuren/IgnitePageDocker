function ajax(){
    const http = new XMLHttpRequest();
    const url = "http://localhost/shopping%20cart/pagina.html";

    http.onreadystatechange = function () {
       if ( this.readyState == 4 && this.status==200) {
          console.log(this.responseText) ;
          document.getElementById("response").innerHTML = this.responseText;
       }
    }

    http.open ("GET", url) ;
    http.send ();
 }

 document.getElementById("button").addEventListener("click", function(){
    ajax();
 });