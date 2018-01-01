<script>
function insertData(){
    var rowlen = document.getElementById("t01").rows.length;
    var celllen = document.getElementById("t01").rows[0].cells.length;
    var tbname = document.getElementById('tablename').innerHTML;
    var headers = new Array();
    headers.push(tbname);
    var sno_l = rowlen -1;
    for(var i =0 ; i< celllen-1 ; i++ ){
        headers.push(t01.rows[rowlen-1].cells[i+1].children[0].value);
    }
    var jsonString = JSON.stringify(headers);
    var xhr = new XMLHttpRequest();
    xhr.open("POST","db/db_insert.php",true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status ==200){
            alert(xhr.responseText)
        }
    }
    xhr.send(jsonString);
    addRow(rowlen);
}
    
function addRow(rowlen){
    
    var table = document.getElementById("t01");
    var rowlen = document.getElementById("t01").rows.length;
    var celllen = document.getElementById("t01").rows[0].cells.length;
    var row = table.insertRow();  
    var tbname = document.getElementById('tablename').innerHTML;
    
    var oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 type='checkbox' id='r"+rowlen+"c0' class='row"+rowlen+"'>";
      
    var oCell = row.insertCell();
    oCell.innerHTML = "<input size=25 id='r"+rowlen+"c1' class='row"+rowlen+"' value='"+rowlen+"'>";
    
    for(var i = 2 ; i < celllen ; i++){
        
        oCell = row.insertCell();
        var tt = document.getElementsByTagName("td");
        var cellidx = tt[i].cellIndex + 1; 
        
        oCell.innerHTML = "<input size=25 type='text' id='r"+rowlen+"c"+i+"' class='row"+rowlen+"'>";
        
    }
    window.location.href = "fetch.php?table_name="+tbname;
}
</script>