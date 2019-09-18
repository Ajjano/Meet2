document.querySelector('#sub_btn').addEventListener('click', ()=>{
    event.preventDefault();
    let country=document.querySelector('#country').value;
    let html=new XMLHttpRequest();
    html.open('GET', 'addCountry.json.php?country='+country,true );
    html.onreadystatechange=function () {
      if(html.readyState===4 && html.status===200){
          document.querySelector('.result').innerHTML=html.responseText;
      }
    };
    html.send(null);
});