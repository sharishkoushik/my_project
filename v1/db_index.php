<html>

   <head>
      <title>Insert Records</title>
   </head>

   <body>
    
    <table id="t01" border="1">
      <tr>
        <th></th>
        <th>SNo</th>
        <th>Station Name</th>
        <th>IP Address</th> 
        <th>MAC Address</th>
      </tr>
      <tr>
        <td><input size=25 type="checkbox"></td>
        <td name="sno">1</td>
        <td><input size=25 type="text" id="station_name1" name="station_name1"></td>
        <td><input size=25 type="text" id="ipaddress1" name="ip1"></td>
        <td><input size=25 type="text" id="macaddress1" name="mac1"></td>
      </tr>
       <p id="demo"></p><!--TODO: Only for debug -->
       <p id="demo1"></p><!--TODO: Only for debug -->
       <p id="demo2"></p><!--TODO: Only for debug -->
       <p id="demo3"></p><!--TODO: Only for debug -->
</table>
    <tr>
        <td width = "250"> </td>
        <td><button name = "add" id = "add" value = "Add" onclick="insertData()">ADD</button></td>
        <td><button name = "delete" id = "delete" value = "Delete" onclick="deleteData()">DELETE</button></td>
        <td><button name = "edit" id = "edit" value = "Edit" onclick="editData()">EDIT</button></td>
    </tr> 
<script>
function insertData(){
    var rowlen = document.getElementById("t01").rows.length;
    
    var sname = t01.rows[rowlen-1].cells[2].children[0].value;
    var ipadd = t01.rows[rowlen-1].cells[3].children[0].value;
    var macadd = t01.rows[rowlen-1].cells[4].children[0].value;

    //document.getElementById("demo").innerHTML = "Entered the function";
    
    //AJAX code is below
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "db_insert.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status ==200){
            alert(xhr.responseText)
        }
    }
    var sno_l = rowlen -1;
    var data = "sno="+sno_l+"&station_name="+sname+"&ip="+ipadd+"&mac="+macadd;
    xhr.send(data);
    addRow(rowlen);
    
}

function deleteData(){
    var rowlen = document.getElementById("t01").rows.length;
    var rownum;
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            rownum = i;
            
            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db_delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status ==200){
                    alert(xhr.responseText)
                }
            }
            var data = "sno="+i;
            xhr.send(data);
            deleteRow(rownum);
        }
        //else{
            //alert("Select a row first");
        //}
    }    
}

function editData(){
    var rowlen = document.getElementById("t01").rows.length;
    var rownum;
    
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            rownum = i;
            
            var sname=document.getElementById("station_name"+i);
            var ipadd=document.getElementById("ipaddress"+i);
            var macadd=document.getElementById("macaddress"+i);
            
            sname.innerHTML = "<input type='text' id='station_name"+i+"' name='station_name"+rowlen+">";
            ipadd.innerHTML = "<input type='text' id='ipaddress"+i+"' name='ip"+rowlen+"'>";
            macadd.innerHTML = "<input type='text' id='macaddress"+i+"' name='mac"+rowlen+"'>";

            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db_edit.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status ==200){
                    alert(xhr.responseText)
                }
            }
            var data = "sno="+i+"&station_name="+sname.value+"&ip="+ipadd.value+"&mac="+macadd.value;
            xhr.send(data);
        }
            //alert("Select a row first");
    }    
}
    
function addRow(rowlen){
    
    var table = document.getElementById("t01");
    var rowlen = document.getElementById("t01").rows.length;
    var row = table.insertRow();  
    var oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 type='checkbox' id="+rowlen+">";
      
    var oCell = row.insertCell();
    oCell.innerHTML = rowlen;
    
    var oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 type='text' id='station_name"+rowlen+"' name='station_name"+rowlen+"'>";
    
    oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 type='text' id='ipaddress"+rowlen+"' name='ip"+rowlen+"'>";
    
    oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 type='text' id='macaddress"+rowlen+"' name='mac"+rowlen+"'>";
    
    //oCell = row.insertCell();
    //oCell.innerHTML = "<input type='text' name='t3'>&nbsp;&nbsp;<input" + 
                      //" type='button' value='Delete' onclick='removeRow(this);'/>";   
}

function deleteRow(rownum){
      document.getElementById("t01").deleteRow(rownum);
      for(var i  = 1 ; i < document.getElementById("t01").rows.length ; i ++ ){
          document.getElementById('demo').innerHTML = "Row is : "+i;
          t01.rows[i].cells[1].innerHTML = i;
      }
}

</script>
</body>
</html>
