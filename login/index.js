document.onkeydown = function(e) {
    if(event.keyCode == 123) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
       return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
       return false;
    }
  }


 
  
function opennav(){
   
}

var puse_table = document.getElementById('puse_table');


function myfun(){
   if(puse_table.style.display == "none"){
      puse_table.style.display = "block";
      setTimeout(function(){
         puse_table.style.display = "none";
      },13000)
   }else{
      puse_table.style.display = "none";
   }
  
}
let content1 = document.getElementById('content1');
let content2 = document.getElementById('content2');
let btn1 = document.getElementById('btn1');
let btn2 = document.getElementById('btn2');

function btntext(){
   content1.style.transform = "translateX(0)";
   content2.style.transform = "translateX(105%)";
   btn1.style.background = "rgb(31, 5, 18)";
   btn2.style.background = "crimson";
   content1.style.transitionDelay = "0.3s";
   content2.style.transitionDelay = "0.3s";
}
function btnimage(){
   content1.style.transform = "translateX(105%)";
   content2.style.transform = "translateX(0)";
   btn1.style.background = "crimson";
   btn2.style.background = "rgb(31, 5, 18)";
   content1.style.transitionDelay = "0.3s";
   content2.style.transitionDelay = "0.3s";
}

function btnopens(){

   let navber = document.getElementById('navber');
   
   if(navber.style.width == '7rem'){
      navber.style.width = '30rem';
      default_array();
   }else{
      navber.style.width = '7rem';
      default_array_block();
   }   
}
function default_array(){
      
   document.getElementById('items1').style.display = 'block';
   document.getElementById('items2').style.display = 'block';
   document.getElementById('items3').style.display = 'block';
   document.getElementById('items4').style.display = 'block';
   document.getElementById('items5').style.display = 'block';
   document.getElementById('items6').style.display = 'block';
   
    

}
function default_array_block(){
   
   document.getElementById('items1').style.display = 'none';
   document.getElementById('items2').style.display = 'none';
   document.getElementById('items3').style.display = 'none';
   document.getElementById('items4').style.display = 'none';
   document.getElementById('items5').style.display = 'none';
   document.getElementById('items6').style.display = 'none';




}