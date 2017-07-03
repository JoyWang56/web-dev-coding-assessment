// var infotable = document.getElementById("customerinfo");
function addinfo(){    
    var infotable = document.getElementById("customerinfo");   
        var row=infotable.insertRow(1);
        var cell1=row.insertCell(0);
        var cell2=row.insertCell(1);
        var cell3=row.insertCell(2);
        var cell4=row.insertCell(3);
        var cell5=row.insertCell(4);
        var cell6=row.insertCell(5);
        //get value
        cell1.innerHTML=document.forms["newuser"]["nameinput"].value;
        cell2.innerHTML=document.forms["newuser"]["colorinput"].value;
        cell3.innerHTML=document.forms["newuser"]["petinput"].value;
        cell4.innerHTML=document.forms["newuser"]["birthdayinput"].value;
        cell5.innerHTML=document.forms["newuser"]["emailinput"].value;
        cell6.innerHTML=document.forms["newuser"]["phoneinput"].value;
        return false;
}

function sorttable(id){
    var infotable = document.getElementById("customerinfo");
    // console.log(id);
    var switching=true;;
    // console.log(infotable);
    while (switching){
        switching=false;
        var sortrows=infotable.getElementsByTagName("tr");
        var i;
        // console.log(sortrows);
        for (i=1;i<(sortrows.length)-1;i++){
           var switchposition=false;
           var first=sortrows[i].getElementsByTagName("td")[id];
           // console.log(first);
           var second=sortrows[i+1].getElementsByTagName("td")[id];
            //desc direction
            if (first.innerHTML.toLowerCase() < second.innerHTML.toLowerCase()) {
                switchposition= true;
                break;
            }
        }
        if(switchposition){
            sortrows[i].parentNode.insertBefore(sortrows[i+1],sortrows[i]);
            switching=true;
        }
    }

}