function addSchedule(event){
  let place=document.getElementById('place').value;
  let did=document.getElementById('did').value;
  let sTime=document.getElementById('sTime').value;
  let eTime=document.getElementById('eTime').value;
  let rDate=document.getElementById('rDate').value;
  //Logging the received dta

  console.log(place+" "+typeof place+" " + did +" "+ typeof did+" "+ sTime+ " " +typeof sTime+" " +eTime+" " +typeof eTime+" "+rDate+" " +typeof rDate);
}