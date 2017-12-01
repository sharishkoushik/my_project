<script>

function changeData(){
    var rowlen = document.getElementById("t01").rows.length;
    var rownum;
    
    for(var i =1 ; i <= rowlen -1  ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
                     
            var sname=document.getElementById("station_name"+i).innerHTML;
            var ipadd=document.getElementById("ipaddress"+i).innerHTML;
            var macadd=document.getElementById("macaddress"+i).innerHTML;
            
            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db/db_edit.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status ==200){
                    alert(xhr.responseText)
                }
            }
            var data = "sno="+i+"&station_name="+sname+"&ip="+ipadd+"&mac="+macadd;
            xhr.send(data);
            window.location.href='fetch.php'
        }
            //alert("Select a row first");
    }    
}
</script>