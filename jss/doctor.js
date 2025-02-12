function delHos(event){
  let hid=document.getElementById('id');
  console.log("Hospital id:" .hid);
  fetch('./includes/doctor.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ hid:hid}) 
  })
  .then(res => res.next())
  .catch(error => console.error('Error', error)); 
}