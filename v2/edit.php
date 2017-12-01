<script>
function editData(){
    //document.getElementById('demo').innerHTML = "Entered Edit";
    var rowlen = document.getElementById("t01").rows.length;
    var rownum;
    
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            rownum = i;
            document.getElementById('demo1').innerHTML = "i is : "+i;
            var sname=document.getElementById("station_name"+i);
            var ipadd=document.getElementById("ipaddress"+i);
            var macadd=document.getElementById("macaddress"+i);
            
            sname.innerHTML = "<input type='text' id='station_name"+i+"' name='station_name"+rowlen+"'>";
            ipadd.innerHTML = "<input type='text' id='ipaddress"+i+"' name='ip"+rowlen+"'>";
            macadd.innerHTML = "<input type='text' id='macaddress"+i+"' name='mac"+rowlen+"'>";

            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db/db_edit.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status ==200){
                    alert(xhr.responseText)
                }
            }
            //document.getElementById('demo1').innerHTML = sname.value;
            //document.getElementById('demo2').innerHTML = ipadd.value;
            //document.getElementById('demo3').innerHTML = macadd.value;
            var data = "sno="+i+"&station_name="+sname.value+"&ip="+ipadd.value+"&mac="+macadd.value;
            xhr.send(data);
        }
            //alert("Select a row first");
    }    
}
</script>