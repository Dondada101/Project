function delHos(button){
  let tr = button.closest('tr');
  let th = tr.querySelector('th[data-value]');
  let hid = th.getAttribute('data-value');
  console.log("Hospital id:" +hid);
  fetch('./includes/doctor.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ hid:hid}) 
  })
  .catch(error => console.error('Error', error)); 
}