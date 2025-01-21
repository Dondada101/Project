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
function submitForm(event){
  event.preventDefault();
  if(!emailVerified){
    let email=document.getElementById('email').value;
    fetch('./includes/fpassword.php',{
      method:'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: new URLSearchParams({email:email})
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
    let newPassword = document.getElementById('pwField').value; 
    let confirmPassword = document.getElementById('cpwField').value; 
    if (newPassword === confirmPassword) {
       fetch('./includes/fpassword.php', {
         method: 'POST', 
         headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, 
         body: new URLSearchParams({ new_password: newPassword, confirm_password: confirmPassword }) 
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