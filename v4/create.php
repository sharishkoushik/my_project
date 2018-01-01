<label>Enter table name : </label><input id="table_name" type="text" autofocus><br/>
<p></p>
<label>Enter number of columns : </label><input id="noof_col" type="text" autofocus>
<p id="pp"></p> 
<p id='demo'></p>  
   
<script>
    var wage = document.getElementById("noof_col");
    wage.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
            saveTable(e);
        }
    });

    function saveTable(e){
        //
        //document.getElementById('demo').innerHTML = col;
        var col = e.target.value;
        for (var i = 0; i < col ; i++){
            var p = document.createElement('p');
            p.setAttribute("id", "p"+i);
            document.getElementById("pp").appendChild(p);
            var x = document.createElement('LABEL');
            var t = document.createTextNode('Column Header:'+i);
            x.appendChild(t);
            document.getElementById('p'+i).insertAdjacentHTML("afterbegin", x.innerHTML);
            document.getElementById('p'+i).insertAdjacentHTML("beforeend", ' ');
            var y = document.createElement('input');
            y.setAttribute("id", "col"+i);
            y.setAttribute("type", "text");
            document.getElementById('p'+i).appendChild(y);       
        }
        note.hidden = true; //here "note" is the label id. Another method of accessing it instead of                       using getElementById
    }
    function getVal(){
        
        var col = document.getElementById('noof_col').value;
        var table_name = document.getElementById('table_name').value;
        var headers = new Array();
        headers.push(table_name);
        for (var i = 0 ; i < col; i++){
            var header = document.getElementById('col'+i).value;
            headers.push(header);          
        }

       var jsonString = JSON.stringify(headers);
       var xhr = new XMLHttpRequest();
       xhr.open("POST","db/db_createtable.php",true);
       xhr.setRequestHeader("Content-type", "application/json");
       xhr.onreadystatechange = function() {
           if(xhr.readyState == 4 && xhr.status ==200){
               alert(xhr.responseText)
           }
       }
       xhr.send(jsonString);
       //window.location.href = "main.php";
    }
   
</script>
<button type="button" onclick="getVal()">SAVE</button><br />
<label id='note'>(Serial Number Column is automatically created for you!)</label>
