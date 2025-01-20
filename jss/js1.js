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
  .then(res => { if (res.redirected) { 
    // Handle the redirection 
    window.location.href = response.url; 
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