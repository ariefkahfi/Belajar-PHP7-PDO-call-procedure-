<html>
    <head>
        <title>Belajar PDO call , bindVal</title>
        <style>
            a{
                display: block;
                margin-top : 10px;
                text-decoration: none;
            }
            #dialogUpdate{
                display: none;
                background-color: rgba(0,0,0,0.3);
                position: fixed;
                width: 100%;
                height: 100%;
                position: fixed;
                top : 0;
                left : 0;
                padding  : 1%;
            }
            #dialogContent h2{
                margin : 0;
                background-color: white;
                padding : 1%;
            }
            #dialogContent{
                background-color: crimson;
                width: 50%;
                border-radius: 5px;    
                margin : auto;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="./insert.php">
            <table>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        <input type="text" name="nama" id="inputNama" placeholder="Nama anda"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" onclick="return insertData()" value="Submit data"/>
                    </td>
                </tr>
            </table> 
        </form>
        
        <a href="./select.php">Select Data</a>
        
        <button id="updateButton">Update Data</button>
    
        
        <div id="dialogUpdate">
            <div id="dialogContent">
                <h2>Update Dialog</h2>
                <table style="padding : 3%;">
                    <tr>
                        <td>ID</td>
                        <td><input type="number" placeholder="Id Person" id="oldId"/></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="updateNama" id="newNama" placeholder="Nama baru"/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button id="submitUpdate" style="width: 100%;">Submit update</button>     
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
    </body>
    
    <script>
        var tombol = document.getElementById('insertButton');

        var bukaDialog = document.getElementById(
                   'dialogUpdate' 
            );
        
        window.onclick = function (event){
            if(event.target === bukaDialog){
                bukaDialog.style.display = 'none';
            }
        };
        
        var tombolUpdate = document.getElementById('updateButton');
        
        
        
        var submitUpdate = document.getElementById('submitUpdate');
        
        submitUpdate.onclick= function(){
            var modelOldId = document.getElementById('oldId').value;
            var modelnewNama  = document.getElementById('newNama').value;
            if(modelOldId === '' || modelOldId === undefined 
                    || modelnewNama === '' || modelnewNama === undefined){
                alert('Masih ada form yang kosong');
            }else{
              ajaxPromiseUpdateData(modelOldId,modelnewNama);
            }
        };
        
        tombolUpdate.onclick = function (event){
            bukaDialog.style.display = 'block';
        };

       
        function ajaxPromiseUpdateData(oldId,namaBaru){
           
           
           try {
           
            var xhr = new XMLHttpRequest();
           
            var janji = new Promise(function (resolve,reject){
                xhr.open('POST','http://localhost/PDOProcedure/update.php',true);
                
                xhr.onload= function (){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        resolve(xhr.responseText);
                    }
                };
                
                xhr.onerror = function (){
                   reject('Error : ' + xhr.responseText); 
                };
                
                
                xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
//                xhr.send('id='+oldId+'&=nama'+namaBaru);
                
                xhr.send('id='+oldId+'&nama='+namaBaru);
                }).then(function (success){
                    
                },function (error){
                    console.log(error);
                });
           
           } catch (e) {
               console.log('Error catch : ' + e);
           }

           
            
        }
        
        
          function insertData(){
             var modelNama = document.getElementById('inputNama').value;
                
             if(modelNama === '' || modelNama === undefined){
                     alert('Masih ada form kosong');
                     return false;
               } 
          }  
        
        

        
    </script>
</html>

