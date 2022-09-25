
function modif()
{
alert("salut");  
}




var list = document.getElementsByClassName('inputSkill');
alert(list.length);
for(var i = 0 ; i < list.length ; i++)
{
list[i].addEventListener('change', modif)
}