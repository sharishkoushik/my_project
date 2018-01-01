
<script>
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



</script>