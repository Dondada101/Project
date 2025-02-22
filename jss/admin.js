const subcategories = {
  ophthalmologists: ['Glaucoma', 'Neuro-ophthalmology', 'Oculoplastics'],
  oncologists: ['Surgical', 'Medical ', 'Radial'],
  neurologists: ['Clinical', 'Vascular ', 'Child '],
  paediatricians: ['Gastroenterology', 'Genetics ', 'Pulmonology ']
};
document.addEventListener('DOMContentLoaded', (event) =>{

  const sLink=document.getElementById('sLink');
  sLink.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('formSpecialization').classList.remove('hidden');
    document.getElementById('formDoctor').classList.add('hidden');
    document.getElementById('formHospitals').classList.add('hidden');
  })
});
document.addEventListener('DOMContentLoaded', (event) =>{

  const sLink=document.getElementById('aLink');
  sLink.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('mc').classList.remove('hidden');
    document.getElementById('mc1').classList.remove('hidden');
    document.getElementById('formDoctor').classList.add('hidden');
    document.getElementById('navBar').style.display='none';
  })
});
document.addEventListener('DOMContentLoaded', (event) =>{

  const sLink=document.getElementById('homeLink');
  sLink.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('mc').classList.add('hidden');
    document.getElementById('mc1').classList.add('hidden');
    document.getElementById('formDoctor').classList.remove('hidden');
    document.getElementById('navBar').style.display='flex';
  })
});
document.addEventListener('DOMContentLoaded', (event) =>{

  const dLink=document.getElementById('dLink');
  dLink.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('formSpecialization').classList.add('hidden');
    document.getElementById('formDoctor').classList.remove('hidden');
    document.getElementById('formHospitals').classList.add('hidden');
  })
});

document.addEventListener('DOMContentLoaded', (event) =>{

  const hLink=document.getElementById('hLink');
  hLink.addEventListener('click',function(event){
    event.preventDefault();
    document.getElementById('formSpecialization').classList.add('hidden');
    document.getElementById('formDoctor').classList.add('hidden');
    document.getElementById('formHospitals').classList.remove('hidden');
  })
});
function dDetails(event){
  event.preventDefault();
  let dname=document.getElementById('dName').value;
  let dEmail=document.getElementById('dEmail').value;
  let dspecialization=document.getElementById('specialization').value;
  let dsspecialization=document.getElementById('sub-specialization').value;
  console.log(dname," ",dEmail," ",dspecialization," ",dsspecialization);

  fetch('./includes/adminOp.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ dName: dname, dEmail: dEmail ,specialization: dspecialization,sspecialization:dsspecialization}) 
  })
  .then(res => res.text()) 
  .catch(error => console.error('Error', error)); 
}
function updateSubcategories() {
  const mainCategory = document.getElementById('specialization').value;
  const subcategorySelect = document.getElementById('sub-specialization');
  
  // Clear existing options
  subcategorySelect.innerHTML = '<option value="">Select a subcategory</option>';

  // Add new options based on the selected main category
  if (mainCategory) {
      subcategories[mainCategory].forEach(subcategory => {
          const option = document.createElement('option');
          option.value = subcategory.toLowerCase();
          option.textContent = subcategory;
          subcategorySelect.appendChild(option);
      });
  }
}

//hospital details js function
function hDetails(event){
  event.preventDefault();
  let hname=document.getElementById('hname').value;
  let hlvl=document.getElementById('hlvl').value;
  console.log(hname," ",hlvl," ");

  fetch('./includes/adminOp1.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ hname:hname, hlvl:hlvl ,action:'insert' }) 
  })
  .then(res => res.text()) 
  .catch(error => console.error('Error', error)); 
}
function delHos(button){
  let tr = button.closest('tr');
  let th = tr.querySelector('th[data-value]');
  let hid = th.getAttribute('data-value');
  console.log("Hospital id:" +hid);
  fetch('./includes/adminOp1.php',{
    method:'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({ hid:hid ,action:'delete'}) 
  })
  .catch(error => console.error('Error', error)); 
}