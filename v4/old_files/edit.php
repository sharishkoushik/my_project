<script>
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
                var jsonString = JSON.stringify(newheaders);
                var xhr = new XMLHttpRequest();
                xhr.open("POST","db/db_edit.php",true);
                xhr.setRequestHeader("Content-type", "application/json");
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status ==200){
                        alert(xhr.responseText)
                    }
                }
                xhr.send(jsonString);
                t01.rows[rownum].cells[0].children[0].checked = false;
                window.location.href = "fetch.php?table_name="+tbname;
            }
        }
    }    
}
</script>