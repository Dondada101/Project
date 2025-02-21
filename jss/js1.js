document.addEventListener('DOMContentLoaded', (event) => {
  console.log('DOM fully loaded and parsed');
  
  const dLink = document.getElementById('grd1link');
  console.log('dLink:', dLink);
  
  if (dLink) {
    dLink.addEventListener('click', function(event) {
      event.preventDefault();
      const grids = document.getElementById('grids');
      const appointmentResult = document.getElementById('appointmentResult');
      
      console.log('grids:', grids);
      console.log('appointmentResult:', appointmentResult);

      if (grids && appointmentResult) {
        // Use inline styling to hide grids and show appointmentResult
        grids.style.display = 'none';
        appointmentResult.style.display = 'block';
      } else {
        console.error('grids or appointmentResult element not found');
      }
    });
  } else {
    console.error('Link element not found');
  }
});
document.addEventListener('DOMContentLoaded', (event) => {
  document.querySelectorAll('.toggle-details').forEach(button => {
    button.addEventListener('click', () => {
      const detailsRow = button.closest('tr').nextElementSibling;
      detailsRow.classList.toggle('hidden');
    });
  });
});

function submitCode(){
  let vCode=document.querySelectorAll('.verify')
  let iCode='';
  vCode.forEach(input=>{
    iCode += input.value;
  });
  console.log('Verification code :',iCode);
  fetch('./includes/verify.php',{
    method:'POST',
    headers:{
      'Content-type':'application/x-www-form-urlencoded'
    },
    body:new URLSearchParams({ user_code: iCode })
  })
  .then(res => { 
    if (res.redirected) { 
    // Handle the redirection 
    window.location.href = res.url; 
  } else {
     return res.text(); 
    }
   })
    .then(data => { 
      if (data) { 
        console.log('Server response:', data); 
       alert('Server response: ' + data); 
  } 
}) 
  .catch(error => console.error('Error:', error));
}
let emailVerified=false;
let storedEmail = '';
function submitForm(event){
  event.preventDefault();
  if(emailVerified && document.getElementById('submitBtn').textContent === 'Change Password') { 
    let newPassword = document.getElementById('pw').value; 
    let confirmPassword = document.getElementById('cpw').value; 
    if (newPassword === confirmPassword) {
       fetch('./includes/fpassword.php', {
         method: 'POST', 
         headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, 
         body: new URLSearchParams({ new_password: newPassword, confirm_password: confirmPassword ,email: storedEmail}) 
        }) 
        .then(res => res.text()) 
        .then(data => { 
          console.log('Response received:', data);
           if (data === 'Password Changed') {
             alert('Password successfully changed'); 
            } else { 
              alert('Password change failed'); } 
            })
         .catch(error => console.error('Error', error)); 
        } else { 
          alert('Passwords do not match'); 
        } 
      }else if(!emailVerified){
    let email=document.getElementById('email').value;
    storedEmail = email;
    fetch('./includes/fpassword.php',{
      method:'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({email:email,action: 'verify_email'})
    })
    .then(res=>res.text())
    .then(data=>{
      console.log('Response received:', data);
      if(data ==='Success'){
        document.getElementById('vBlock').classList.remove('hidden');
        document.getElementById('emailField').classList.add('hidden');
        document.getElementById('submitBtn').textContent = 'Verify Code';
        emailVerified = true;
      }else{
        alert("Verification failed");
      }
    })
    .catch(error=>console.error('Error',error));
  }else{
    let vCode1=document.querySelectorAll('.verify')
    let iCode1='';
    vCode1.forEach(input=>{
    iCode1 += input.value;
    });
    console.log('The code is'+iCode1);
    fetch('./includes/fpassword.php',{
      method:'POST',
      headers:{
        'Content-type':'application/x-www-form-urlencoded'
      },
      body:new URLSearchParams({user_code:iCode1 })
    })
    .then(res=>res.text())
    .then(data=>{
      console.log("This is the data"+data)
      if(data==='Verified'){
        document.getElementById('pwField').classList.remove('hidden');
        document.getElementById('cpwField').classList.remove('hidden');
        document.getElementById('vBlock').classList.add('hidden');
        document.getElementById('submitBtn').textContent = 'Change Password';
      }else{
        alert("Verification Failed1");
      }
    })
    .catch(error=>console.error('Error',error));
  }
  if(emailVerified && document.getElementById('submitBtn').textContent === 'Change Password') { 
    let newPassword = document.getElementById('pw').value; 
    let confirmPassword = document.getElementById('cpw').value; 
    if (newPassword === confirmPassword) {
       fetch('./includes/fpassword.php', {
         method: 'POST', 
         headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, 
         body: new URLSearchParams({ new_password: newPassword, confirm_password: confirmPassword ,email: storedEmail}) 
        }) 
        .then(res => res.text()) 
        .then(data => { 
          console.log('Response received:', data);
           if (data === 'Password Changed') {
             alert('Password successfully changed'); 
            } else { 
              alert('Password change failed'); } 
            })
         .catch(error => console.error('Error', error)); 
        } else { 
          alert('Passwords do not match'); 
        } 
      }
}