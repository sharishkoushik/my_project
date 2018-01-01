<script>
/*##################### insert.php #################*/
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
    ajaxCalls(headers, "insert");
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

/*##################### edit.php #################*/
function editData(){
    var rowlen = document.getElementById("t01").rows.length;
    var celllen = document.getElementById("t01").rows[0].cells.length;
    var tbname = document.getElementById('tablename').innerHTML;
    edit.innerHTML = "SAVE";
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            var rownum = i;
 
            var newheaders = new Array();
            newheaders.push(tbname);
            for (var j =1 ; j < celllen ; j++){
                t01.rows[i].cells[j].contentEditable = true;
            }
            edit.onclick = function(){
                for (var k=1 ; k < celllen ; k++){
                    newheaders.push(t01.rows[rownum].cells[k].innerHTML)
                    t01.rows[rownum].cells[k].contentEditable = false;
                }
                ajaxCalls(newheaders, "edit");
                t01.rows[rownum].cells[0].children[0].checked = false;
                window.location.href = "fetch.php?table_name="+tbname;
            }
        }
    }    
}

/*##################### delete.php #################*/
function deleteData(){
    var rowlen = document.getElementById("t01").rows.length;
    var tbname = document.getElementById('tablename').innerHTML;
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            var rownum = i;            
            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db/db_delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status ==200){
                    alert(xhr.responseText)
                }
            }
            var data = "tbname="+tbname+"&sno="+i;
            xhr.send(data);
            deleteRow(rownum);
        }
    }    
}

function deleteRow(rownum){
    document.getElementById("t01").deleteRow(rownum);
    var tbname = document.getElementById('tablename').innerHTML;
    for(var i  = 1 ; i < document.getElementById("t01").rows.length ; i ++ ){
        t01.rows[i].cells[1].innerHTML = i;
    }
    window.location.href = "fetch.php?table_name="+tbname;
}
/*####################################################*/
    
function ajaxCalls(colvals, actionfile){
    var jsonString = JSON.stringify(colvals);
    var xhr = new XMLHttpRequest();
    xhr.open("POST","db/db_"+actionfile+".php",true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status ==200){
            alert(xhr.responseText)
        }
    }
    xhr.send(jsonString);
}

</script>