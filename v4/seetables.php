<script>
var xhr = new XMLHttpRequest();
xhr.open("GET", "show_tables.php", true);
xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status ==200){
        var x = xhr.responseText;
        var x = JSON.parse(x);
        for(var i=0 ; i<x.length ; i++){
            var node = document.createElement('a');
            node.setAttribute("id", i);
            node.setAttribute("class", "tb_options");
            node.setAttribute("onclick", "onclickFunction(event)");
            //node.setAttribute("href", "fetch.php");
            var textnode = document.createTextNode(x[i]);
            node.appendChild(textnode);
            document.getElementById("myDropdown").appendChild(node);
        }
    }
}
xhr.send();
    
function onclickFunction(e){
    window.location.href = "fetch.php?table_name=" + e.target.textContent;
}
function myFunction(){
    document.getElementById("myDropdown").classList.toggle("show");
}

</script>