function addSchedule(event){
  event.preventDefault();
  let place=document.getElementById('place').value;
  let did=document.getElementById('did').value;
  let sTime=document.getElementById('sTime').value;
  let eTime=document.getElementById('eTime').value;
  let rDate=document.getElementById('rDate').value;
  //Logging the received dta

  console.log(place," ",typeof place,did," ", typeof did," " ,sTime," " ,typeof sTime," " ,eTime," " ,typeof eTime, " ",rDate," ",typeof rDate);

  fetch('./includes/doctor.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ place:place, did:did ,sTime:sTime,eTime:eTime,rDate:rDate,action:'insert' }) 
  })
  .then(res=>res.text())
  .catch(error => console.error('Error', error)); 
}