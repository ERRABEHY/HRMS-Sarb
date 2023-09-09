<?php require_once '../app/views/Inc/header.php'; 
if (!empty($data['error'])) {
    echo"<p class='error'>" . "</p>";
}
?>

<div id="bg"></div>
  
  <h1 class="title">S.A.R.B</h1>

  <form action="" method = "post">
    <div class="form-field">
      <input type="email" name="email" placeholder="Email" required/>
    </div>
    
    <div class="form-field">
      <input type="password" name="passwd" placeholder="Password" required/>
    </div>
    <div class="form-field btnplace">
    </div>
    <div class="form-field btnplace">
      <button class="btn" type="submit" name="submit">Log in</button>
    </div>
  </form>

<script>
  let myError = document.querySelector('.error');
  let myInputs = document.querySelectorAll('.form-field input');
  let myButton = document.querySelector('form .btnplace');

  if (myError != null) 
  {
    myInputs.forEach((input)=>{
      input.style.border = "1px solid red";
    });
   let myPara = document.createElement('p');
   myPara.className = "error";
   myPara.appendChild(document.createTextNode("Invalid email or password."));
   myButton.appendChild(myPara);
  }

</script>
<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
    #bg {
    /* background-image: url(img/background1.jpg); */
    background-image: url(../../../public/img/background1.jpg);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    filter: blur(5px);
    z-index: -1; 
  }
  
    
    body {
    font-family: 'Lato', sans-serif;
    color: #4A4A4A;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
    margin: 0;
    padding: 0;
  }
  
  .title {
    font-size: 36px;
    color: #47AB11;
    margin-bottom: 20px;
    z-index: 1;
    position: relative;
    text-align: center;
  }
  
  form {
    width: 350px;
    position: relative;
  }
    form .form-field::before {
      font-size: 20px;
      position: absolute;
      left: 15px;
      top: 17px;
      color: #888888;
      content: " ";
      display: block;
      background-size: cover;
      background-repeat: no-repeat;
    }
    
    form .form-field:nth-child(1)::before {
      /* background-image: url(img/user-icon.png); */
      background-image: url(../../../public/img/user-icon.png);
      width: 20px;
      height: 20px;
      top: 15px;
    }
    
    form .form-field:nth-child(2)::before {
      /* background-image: url(img/lock-icon.png); */
      background-image: url(../../../public/img/lock-icon.png);
      width: 16px;
      height: 16px;
    }
    
    form .form-field {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      margin-bottom: 1rem;
      position: relative;
    } 
    .error {
      color: red;
      opacity: 0.5;
      position: absolute;
    }
    
    form input {
      font-family: inherit;
      width: 100%;
      outline: none;
      background-color: #fff;
      border-radius: 4px;
      border: none;
      display: block;
      padding: 0.9rem 0.7rem;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
      color: #4A4A4A;
      text-indent: 40px;
    }
    form input::placeholder {
      transition: 0.5s;
    }
    form input:focus::placeholder {
      opacity: 0;
    }
    
    form .btn {
      outline: none;
      border: none;
      cursor: pointer;
      display: inline-block;
      margin: 0 auto;
      padding: 0.9rem 2.5rem;
      text-align: center;
      background-color: #47AB11;
      color: #fff;
      border-radius: 4px;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
      transition: 0.5s;
    }

    form .btn:hover {
      background-color: #fff;
      color: #47AB11;
      box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.16);

    }
    
  </style>
<?php require_once '../app/views/Inc/footer.php'; ?>
