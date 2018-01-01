<script>
function insertData(){
  
    var table_name = document.getElementById("table_name").value;
    document.getElementById("demo").innerHTML = table_name;
    
    var rowlen = document.getElementById("t01").rows.length;
    
    var sname = t01.rows[rowlen-1].cells[2].children[0].value;
    var ipadd = t01.rows[rowlen-1].cells[3].children[0].value;
    var macadd = t01.rows[rowlen-1].cells[4].children[0].value;

    //document.getElementById("demo").innerHTML = "Entered the function";
    
    //AJAX code is below
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "db/db_insert.php", true);
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
</script>