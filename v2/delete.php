
<script>
function deleteData(){
    var rowlen = document.getElementById("t01").rows.length;
    var rownum;
    for(var i =1 ; i <=rowlen-1 ; i ++ ){
        if (t01.rows[i].cells[0].children[0].checked){
            rownum = i;
            
            //AJAX code is below
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "db/db_delete.php", true);
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

function deleteRow(rownum){
      document.getElementById("t01").deleteRow(rownum);
      for(var i  = 1 ; i < document.getElementById("t01").rows.length ; i ++ ){
          document.getElementById('demo').innerHTML = "Row is : "+i;
          t01.rows[i].cells[1].innerHTML = i;
      }
}

</script>